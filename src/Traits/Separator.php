<?php
/**
 * Trait that prints horizontal lines
 */

namespace IO\Traits;

use IO\Out;
use IO\Terminal;

/**
 * Trait that prints horizontal lines
 */
trait Separator {

    /**
     * @ignore
     */
    public static $SEPARATOR_CODE = false;

    /**
     * @ignore
     */
    public static $SEPARATOR_CHAR = "~";

    /**
     * @ignore
     */
    public static $SEPARATOR_STYLE_DEFAULT = "\033[1;30m";

    /**
     * @ignore
     */
    public static $SEPARATOR_STYLE_DEBUG_DEFAULT = "\033[1;30m";

    /**
     * @ignore
     */
    public static $SEPARATOR_STYLE = "\033[1;30m";

    /**
     * @ignore
     */
    public static $SEPARATOR_STYLE_DEBUG = "\033[1;30m";

    /**
     * @ignore
     */
    public static $lines = [];

    /**
     * Prints a seprator
     */
    public static function separator() {

        if (Out::$CURRENT_FORMAT === Out::TERM) {
            if (Out::$fullDebug) {
                $bt = debug_backtrace(false, Out::$level + 2);
                $class = $bt[Out::$level - 1]["class"];
                $function = $bt[Out::$level - 1]["function"];
                $line = $bt[Out::$level - 2]["line"];

                $out = " $class/$function:$line";
                $text = Separator::generateSeparatorLine(Terminal::width() - strlen($out) - 1);
                Out::log($text, Separator::$SEPARATOR_CODE, Separator::$SEPARATOR_STYLE, Separator::$SEPARATOR_STYLE_DEBUG);
            } else {
                $text = Separator::generateSeparatorLine(Terminal::width());
                Out::log($text, Separator::$SEPARATOR_CODE, Separator::$SEPARATOR_STYLE, Separator::$SEPARATOR_STYLE_DEBUG);
            }
        } else {
            Out::log("", Separator::$SEPARATOR_CODE, "", "");
        }
    }

    /**
     * set the style of this output
     * @param $style style of the text
     * @param $styleDebug style of the line message
     */
    public static function setStyle($style, $styleDebug=null) {
        Separator::$SEPARATOR_STYLE = $style->getCode();

        if ($styleDebug) {
            Separator::$SEPARATOR_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    /**
     * reset the style of this output
     */
    public static function resetStyle () {
        Separator::$SEPARATOR_STYLE = Separator::$SEPARATOR_STYLE_DEFAULT;
        Separator::$SEPARATOR_STYLE_DEBUG = Separator::$SEPARATOR_STYLE_DEBUG_DEFAULT;
    }

    /**
     * @ignore
     */
    public static $separatorLines = [];

    /**
     * @ignore
     */
    public static function generateSeparatorLine($width) {
        if (!isset(Separator::$separatorLines[$width])) {
            $line = "";

            for ($i = 0; $i < $width; $i++) {
                $line .= Separator::$SEPARATOR_CHAR;
            }

            $separatorLines[$width] = $line;
        }

        return $separatorLines[$width];
    }
}