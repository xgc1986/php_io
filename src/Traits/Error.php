<?php

namespace IO\Traits;

use IO\Out;

trait Error {

    public static $ERROR_CODE = "E";
    public static $ERROR_STYLE_DEFAULT = "\033[0;31m";
    public static $ERROR_STYLE_DEBUG_DEFAULT = "\033[1;31m";
    public static $ERROR_STYLE = "\033[0;31m";
    public static $ERROR_STYLE_DEBUG = "\033[1;31m";

    public static $HTML_ERROR_STYLE = "color:red;font-weight:normal;text-decoration:none;";
    public static $HTML_ERROR_STYLE_DEBUG = "color:red;font-weight:bold;text-decoration:none;";

    public static function error($text) {
        if (Out::$CURRENT_FORMAT === Out::TERM) {
            Out::log($text, Error::$ERROR_CODE, Error::$ERROR_STYLE, Error::$ERROR_STYLE_DEBUG);
        } else {
            Out::log($text, Error::$ERROR_CODE, Error::$HTML_ERROR_STYLE, Error::$HTML_ERROR_STYLE_DEBUG);
        }
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