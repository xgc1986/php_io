<?php
/**
 * Main class to print to terminal or browser
 */

namespace IO;

use IO\Traits\Separator;
use IO\Traits\Dummy;
use IO\Traits\Verbose;
use IO\Traits\Info;
use IO\Traits\Error;
use IO\Traits\Warning;
use IO\Traits\Wtf;
use IO\Traits\Field;

/**
 * Main class to print to terminal or browser
 */
class Out {

    use
        Field,
        Separator,
        Dummy,
        Verbose,
        Info,
        Warning,
        Error,
        Wtf {
            Dummy::setStyle insteadof Separator, Verbose, Info, Warning, Error, Wtf, Field;
            Dummy::resetStyle insteadof Separator, Verbose, Info, Warning, Error, Wtf, Field;
    }

    /**
     * Prints the text with the styles given
     * @param $text string text to output
     * @param $tag String to show if the styles are dissabled
     * @param $style1 look and feel of the text
     * @param $style2 look and feel of the debbug message
     */
    public static function log($text, $tag, $style1, $style2) {
        if (Out::$CURRENT_FORMAT === Out::TERM) {
            if ($tag) {
                $pre = "[$tag] ";
            } else {
                $pre = "";
            }

            $LS = "";
            $LSD = "";
            $CLEAN = "";
            $EOL = "";

            if (Out::$styles) {
                $pre = "";
                $LS = $style1;
                $LSD = $style2;
                $CLEAN = Out::$CLEAN;
                $EOL = Out::$EOL;
            }

            echo "$LS$pre$text";

            if (Out::$fullDebug) {
                $bt = debug_backtrace(false, Out::$level + 1);
                $class = $bt[Out::$level]["class"];
                $function = $bt[Out::$level]["function"];
                $line = $bt[Out::$level - 1]["line"];

                $w = Terminal::width();

                $out = " $class/$function:$line";
                if (strlen("$pre$text") <= $w ) {
                    $spaces = Out::generateSpaces($w - strlen("$pre$text") - strlen("$out") - 1);
                    echo "$spaces$LSD$out$EOL$CLEAN\n";
                } else {
                    $spaces = Out::generateSpaces($w - strlen("$out") - 1);
                    echo "$EOL$CLEAN\n$spaces$LSD$out$EOL$CLEAN\n";
                }
            } else {
                echo "$EOL$CLEAN\n";
            }
        } else {
            $bt = debug_backtrace(false, Out::$level + 1);
            $class = $bt[Out::$level]["class"];
            $function = $bt[Out::$level]["function"];
            $line = $bt[Out::$level - 1]["line"];
            $out = " $class/$function:$line";

            if (Out::$fullDebug) {
                echo "<div style='clear:both;'><span style='float:left;$style1'>$text</span><span style='float:right;$style2'>$out</span></div>";
            } else {
                echo "<div style='clear:both;'><span style='float:left;$style1'>$text</span></div>";
            }
        }
    }


    //                                  3 text
    //                                  4 bg
    //
    //                                0 normal
    //                                1 bright
    //                                4 subrayado
    //                                7 invertido

    /**
     * const to print in html mode
     */
    const HTML = "HTML";

    /**
     * const to print in prompt mode
     */
    const TERM = "TERM";

    /**
     * @ignore
     */
    public static $CURRENT_FORMAT = Out::TERM;

    /**
     * @ignore
     */
    public static $CLEAN = "\x1B[0m";

    /**
     * @ignore
     */
    public static $EOL = "\x1B[K";

    /**
     * @ignore
     */
    public static $fullDebug = true;

    /**
     * @ignore
     */
    public static $styles = true;

    /**
     * @ignore
     */
    public static $emptyLines = [];

    /**
     * @ignore
     */
    public static $level = 2;

    /**
     * Set the output's format
     * @param $format the foramt you want to use
     */
    public static function format($format) {
        Out::$CURRENT_FORMAT = $format;
    }

    /**
     * Enables coloring in prompt mode
     */
    public static function enableStyles() {
        Out::$styles = true;
    }

    /**
     * dissables coloring in prompt mode
     */
    public static function dissableStyles() {
        Out::$styles = false;
    }

    /**
     * Modify this value if you want to print the lines of the debbug mode correctly
     *
     * @param the numbers of functions is needed to call the log method
     */
    public static function setLevel($level) {
        Out::$level = $level + 2;
    }

    // new
    public static function getLevel( ) {
        return Out::$level - 2;
    }

    /**
     * Stop printing the lines
     */
    public static function dissableDebug() {
        Out::$fullDebug = false;
    }

    /**
     * Enable printing the lines
     */
    public static function enableDebug() {
        Out::$fullDebug = true;
    }

    /**
     * @ignore
     */
    public static function generateSpaces($length = 80) {
        if (!isset(Out::$emptyLines[$length])) {
            $line = "";
            for ($i = 0; $i < $length; $i++) {
                $line .= " ";
            }

            Out::$emptyLines[$length] = $line;
        }

        return Out::$emptyLines[$length];
    }
}