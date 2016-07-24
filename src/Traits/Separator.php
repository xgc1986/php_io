<?php

namespace IO\Traits;

use IO\Out;
use IO\Terminal;

trait Separator {

    public static $SEPARATOR_CODE = false;
    public static $SEPARATOR_CHAR = "~";
    public static $SEPARATOR_STYLE_DEFAULT = "\033[1;30m";
    public static $SEPARATOR_STYLE_DEBUG_DEFAULT = "\033[1;30m";
    public static $SEPARATOR_STYLE = "\033[1;30m";
    public static $SEPARATOR_STYLE_DEBUG = "\033[1;30m";

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

    public static function setStyle($style, $styleDebug=null) {
        Separator::$SEPARATOR_STYLE = $style->getCode();

        if ($styleDebug) {
            Separator::$SEPARATOR_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    public static function resetStyle () {
        Separator::$SEPARATOR_STYLE = Separator::$SEPARATOR_STYLE_DEFAULT;
        Separator::$SEPARATOR_STYLE_DEBUG = Separator::$SEPARATOR_STYLE_DEBUG_DEFAULT;
    }

    public static $separatorLines = [];

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