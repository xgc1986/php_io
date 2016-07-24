<?php
/**
 * Trait that prints info
 */

namespace IO\Traits;

use IO\Out;

/**
 * Trait that prints info
 */
trait Info {

    /**
     * @ignore
     */
    public static $INFO_CODE = "I";

    /**
     * @ignore
     */
    public static $INFO_STYLE_DEFAULT = "\033[0;34m";

    /**
     * @ignore
     */
    public static $INFO_STYLE_DEBUG_DEFAULT = "\033[1;34m";

    /**
     * @ignore
     */
    public static $INFO_STYLE = "\033[0;34m";

    /**
     * @ignore
     */
    public static $INFO_STYLE_DEBUG = "\033[1;34m";

    /**
     * @ignore
     */
    public static $HTML_INFO_STYLE = "color:blue;font-weight:normal;text-decoration:none;";

    /**
     * @ignore
     */
    public static $HTML_INFO_STYLE_DEBUG = "color:blue;font-weight:bold;text-decoration:none;";

    /**
     * Prints an info
     * @param $text text to print
     */
    public static function info($text) {
        if (Out::$CURRENT_FORMAT === Out::TERM) {
            Out::log($text, Info::$INFO_CODE, Info::$INFO_STYLE, Info::$INFO_STYLE_DEBUG);
        } else {
            Out::log($text, Info::$INFO_CODE, Info::$HTML_INFO_STYLE, Info::$HTML_INFO_STYLE_DEBUG);
        }
    }

    /**
     * set the style of this output
     * @param $style style of the text
     * @param $styleDebug style of the line message
     */
    public static function setStyle($style, $styleDebug=null) {
        Info::$INFO_STYLE = $style->getCode();

        if ($styleDebug) {
            Info::$INFO_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    /**
     * reset the style of this output
     */
    public static function resetStyle () {
        Info::$INFO_STYLE = Info::$INFO_STYLE_DEFAULT;
        Info::$INFO_STYLE_DEBUG = Info::$INFO_STYLE_DEBUG_DEFAULT;
    }
}