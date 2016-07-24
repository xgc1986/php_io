<?php

namespace IO\Traits;

use IO\Out;

trait Error {

    public static $ERROR_CODE = "E";
    public static $ERROR_STYLE_DEFAULT = "\033[0;31m";
    public static $ERROR_STYLE_DEBUG_DEFAULT = "\033[1;31m";
    public static $ERROR_STYLE = "\033[0;31m";
    public static $ERROR_STYLE_DEBUG = "\033[1;31m";

    public static function error($text) {
        Out::log($text, Error::$ERROR_CODE, Error::$ERROR_STYLE, Error::$ERROR_STYLE_DEBUG);
    }

    public static function setStyle($style, $styleDebug=null) {
        Error::$ERROR_STYLE = $style->getCode();

        if ($styleDebug) {
            Error::$ERROR_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    public static function resetStyle () {
        Error::$ERROR_STYLE = Error::$ERROR_STYLE_DEFAULT;
        Error::$ERROR_STYLE_DEBUG = Error::$ERROR_STYLE_DEBUG_DEFAULT;
    }
}