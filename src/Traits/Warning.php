<?php
/**
 * Trait that prints warnings
 */

namespace IO\Traits;

use IO\Out;

/**
 * Trait that prints warnings
 */
trait Warning {

    /**
     * @ignore
     */
    public static $WARNING_CODE = "W";

    /**
     * @ignore
     */
    public static $WARNING_STYLE_DEFAULT = "\033[0;33m";

    /**
     * @ignore
     */
    public static $WARNING_STYLE_DEBUG_DEFAULT = "\033[1;33m";

    /**
     * @ignore
     */
    public static $WARNING_STYLE = "\033[0;33m";

    /**
     * @ignore
     */
    public static $WARNING_STYLE_DEBUG = "\033[1;33m";

    /**
     * @ignore
     */
    public static $HTML_WARNING_STYLE = "color:orange;font-weight:normal;text-decoration:none;";

    /**
     * @ignore
     */
    public static $HTML_WARNING_STYLE_DEBUG = "color:orange;font-weight:bold;text-decoration:none;";

    /**
     * Prints a warning
     * @param $text text to print
     */
    public static function warning($text) {
        if (Out::$CURRENT_FORMAT === Out::TERM) {
            Out::log($text, Warning::$WARNING_CODE, Warning::$WARNING_STYLE, Warning::$WARNING_STYLE_DEBUG);
        } else {
            Out::log($text, Warning::$WARNING_CODE, Warning::$HTML_WARNING_STYLE, Warning::$HTML_WARNING_STYLE_DEBUG);
        }
    }

    /**
     * set the style of this output
     * @param $style style of the text
     * @param $styleDebug style of the line message
     */
    public static function setStyle($style, $styleDebug=null) {
        Warning::$WARNING_STYLE = $style->getCode();

        if ($styleDebug) {
            Warning::$WARNING_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    /**
     * reset the style of this output
     */
    public static function resetStyle () {
        Warning::$WARNING_STYLE = Warning::$WARNING_STYLE_DEFAULT;
        Warning::$WARNING_STYLE_DEBUG = Warning::$WARNING_STYLE_DEBUG_DEFAULT;
    }
}