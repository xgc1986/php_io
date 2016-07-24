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
        $text = Separator::generateSeparatorLine(Terminal::width());
        Out::log($text, Separator::$SEPARATOR_CODE, Separator::$SEPARATOR_STYLE, Separator::$SEPARATOR_STYLE_DEBUG);
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