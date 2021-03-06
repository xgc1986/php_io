<?php
/**
 * Trait that prints critical errors
 */

namespace IO\Traits;

use IO\Out;

/**
 * Trait that prints critical errors
 */
trait Wtf {

    /**
     * @ignore
     */
    public static $WTF_CODE = "WTF";

    /**
     * @ignore
     */
    public static $WTF_STYLE_DEFAULT = "\033[1;37m\033[1;41m";

    /**
     * @ignore
     */
    public static $WTF_STYLE_DEBUG_DEFAULT = "\033[1;37m\033[1;41m";

    /**
     * @ignore
     */
    public static $WTF_STYLE = "\033[1;37m\033[1;41m";

    /**
     * @ignore
     */
    public static $WTF_STYLE_DEBUG = "\033[1;37m\033[1;41m";

    /**
     * @ignore
     */
    public static $HTML_WTF_STYLE = "background:red;color:white;font-weight:normal;text-decoration:none;";

    /**
     * @ignore
     */
    public static $HTML_WTF_STYLE_DEBUG = "background:red;color:white;font-weight:bold;text-decoration:none;";

    /**
     * Prints an critical error
     * @param $text text to print
     */
    public static function wtf($text) {
        if (Out::$CURRENT_FORMAT === Out::TERM) {
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
        } else {
            Out::log("$text", "WTF", Wtf::$HTML_WTF_STYLE, Wtf::$HTML_WTF_STYLE_DEBUG);
        }
    }

    /**
     * set the style of this output
     * @param $style style of the text
     * @param $styleDebug style of the line message
     */
    public static function setStyle($style, $styleDebug=null) {
        Wtf::$WTF_STYLE = $style->getCode();

        if ($styleDebug) {
            Wtf::$WTF_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    /**
     * reset the style of this output
     */
    public static function resetStyle () {
        Wtf::$WTF_STYLE = Wtf::$WTF_STYLE_DEFAULT;
        Wtf::$WTF_STYLE_DEBUG = Wtf::$WTF_STYLE_DEBUG_DEFAULT;
    }
}