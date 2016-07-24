<?php

namespace IO;

use IO\Traits\Separator;
use IO\Traits\Dummy;
use IO\Traits\Verbose;
use IO\Traits\Info;
use IO\Traits\Error;
use IO\Traits\Warning;
use IO\Traits\Wtf;
use IO\Traits\Field;

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

    const HTML = "HTML";
    const TERM = "TERM";

    public static $CURRENT_FORMAT = Out::TERM;
    public static $CLEAN = "\x1B[0m";
    public static $EOL = "\x1B[K";

    public static $fullDebug = true;
    public static $styles = true;
    public static $lines = [];
    public static $emptyLines = [];

    public static $level = 2;

    public static $TERM_WIDTH = 0;

    public static function format($format) {
        Out::$CURRENT_FORMAT = $format;
    }

    public static function enableStyles() {
        Out::$styles = true;
    }

    public static function dissableStyles() {
        Out::$styles = false;
    }

    public static function setLevel($level) {
        Out::$level = $level + 2;
    }

    public static function dissableDebug() {
        Out::$fullDebug = false;
    }

    public static function enableDebug() {
        Out::$fullDebug = true;
    }

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