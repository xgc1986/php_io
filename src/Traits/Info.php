<?php

namespace IO\Traits;

use IO\Out;

trait Info {

    public static $INFO_CODE = "I";
    public static $INFO_STYLE_DEFAULT = "\033[0;34m";
    public static $INFO_STYLE_DEBUG_DEFAULT = "\033[1;34m";
    public static $INFO_STYLE = "\033[0;34m";
    public static $INFO_STYLE_DEBUG = "\033[1;34m";

    public static $HTML_INFO_STYLE = "color:blue;font-weight:normal;text-decoration:none;";
    public static $HTML_INFO_STYLE_DEBUG = "color:blue;font-weight:bold;text-decoration:none;";

    public static function info($text) {
        if (Out::$CURRENT_FORMAT === Out::TERM) {
            Out::log($text, Info::$INFO_CODE, Info::$INFO_STYLE, Info::$INFO_STYLE_DEBUG);
        } else {
            Out::log($text, Info::$INFO_CODE, Info::$HTML_INFO_STYLE, Info::$HTML_INFO_STYLE_DEBUG);
        }
    }

    public static function setStyle($style, $styleDebug=null) {
        Info::$INFO_STYLE = $style->getCode();

        if ($styleDebug) {
            Info::$INFO_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    public static function resetStyle () {
        Info::$INFO_STYLE = Info::$INFO_STYLE_DEFAULT;
        Info::$INFO_STYLE_DEBUG = Info::$INFO_STYLE_DEBUG_DEFAULT;
    }
}