<?php

namespace IO\Traits;

use IO\Out;

trait Wtf {

    public static $WTF_CODE = "WTF";
    public static $WTF_STYLE_DEFAULT = "\033[1;37m\033[1;41m";
    public static $WTF_STYLE_DEBUG_DEFAULT = "\033[1;37m\033[1;41m";
    public static $WTF_STYLE = "\033[1;37m\033[1;41m";
    public static $WTF_STYLE_DEBUG = "\033[1;37m\033[1;41m";

    public static function wtf($text) {
        if (Out::$styles) {
            $dbg = Out::$fullDebug;
            if ($dbg) {
                Out::$fullDebug = false;
            }
            $EOL = Out::$EOL;
            Out::log("$EOL\n\n$text\n\n", Wtf::$WTF_CODE, Wtf::$WTF_STYLE, Wtf::$WTF_STYLE_DEBUG);
            Out::$fullDebug = $dbg;
            if ($dbg) {
                Out::log("", false, "", Wtf::$WTF_STYLE_DEBUG);
            }
        } else {
            Out::log("$text", "WTF", Wtf::$WTF_STYLE, Wtf::$WTF_STYLE_DEBUG);
        }
    }

    public static function setStyle($style, $styleDebug=null) {
        Wtf::$WTF_STYLE = $style->getCode();

        if ($styleDebug) {
            Wtf::$WTF_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    public static function resetStyle () {
        Wtf::$WTF_STYLE = Wtf::$WTF_STYLE_DEFAULT;
        Wtf::$WTF_STYLE_DEBUG = Wtf::$WTF_STYLE_DEBUG_DEFAULT;
    }
}