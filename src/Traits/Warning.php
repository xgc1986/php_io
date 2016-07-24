<?php

namespace IO\Traits;

use IO\Out;

trait Warning {

    public static $WARNING_CODE = "W";
    public static $WARNING_STYLE_DEFAULT = "\033[0;33m";
    public static $WARNING_STYLE_DEBUG_DEFAULT = "\033[1;33m";
    public static $WARNING_STYLE = "\033[0;33m";
    public static $WARNING_STYLE_DEBUG = "\033[1;33m";

    public static function warning($text) {
        Out::log($text, Warning::$WARNING_CODE, Warning::$WARNING_STYLE, Warning::$WARNING_STYLE_DEBUG);
    }

    public static function setStyle($style, $styleDebug=null) {
        Warning::$WARNING_STYLE = $style->getCode();

        if ($styleDebug) {
            Warning::$WARNING_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    public static function resetStyle () {
        Warning::$WARNING_STYLE = Warning::$WARNING_STYLE_DEFAULT;
        Warning::$WARNING_STYLE_DEBUG = Warning::$WARNING_STYLE_DEBUG_DEFAULT;
    }
}