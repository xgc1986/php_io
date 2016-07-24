<?php

namespace IO\Traits;

use IO\Out;

trait Verbose {

    public static $VERBOSE_CODE = "V";
    public static $VERBOSE_STYLE_DEFAULT = "";
    public static $VERBOSE_STYLE_DEBUG_DEFAULT = "\033[1;37m";
    public static $VERBOSE_STYLE = "";
    public static $VERBOSE_STYLE_DEBUG = "\033[1;37m";

    public static function verbose($text) {
        Out::log($text, Verbose::$VERBOSE_CODE, Verbose::$VERBOSE_STYLE, Verbose::$VERBOSE_STYLE_DEBUG);
    }

    public static function setStyle($style, $styleDebug=null) {
        Verbose::$VERBOSE_STYLE = $style->getCode();

        if ($styleDebug) {
            Verbose::$VERBOSE_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    public static function resetStyle () {
        Verbose::$VERBOSE_STYLE = Verbose::$VERBOSE_STYLE_DEFAULT;
        Verbose::$VERBOSE_STYLE_DEBUG = Verbose::$VERBOSE_STYLE_DEBUG_DEFAULT;
    }
}