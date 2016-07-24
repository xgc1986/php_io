<?php
/**
 * Trait that prints verbosees
 */

namespace IO\Traits;

use IO\Out;

/**
 * Trait that prints verbosees
 */
trait Verbose {

    /**
     * @ignore
     */
    public static $VERBOSE_CODE = "V";

    /**
     * @ignore
     */
    public static $VERBOSE_STYLE_DEFAULT = "";

    /**
     * @ignore
     */
    public static $VERBOSE_STYLE_DEBUG_DEFAULT = "\033[1;37m";

    /**
     * @ignore
     */
    public static $VERBOSE_STYLE = "";

    /**
     * @ignore
     */
    public static $VERBOSE_STYLE_DEBUG = "\033[1;37m";

    /**
     * @ignore
     */
    public static $HTML_VERBOSE_STYLE = "color:black;font-weight:normal;text-decoration:none;";

    /**
     * @ignore
     */
    public static $HTML_VERBOSE_STYLE_DEBUG = "color:black;font-weight:bold;text-decoration:none;";

    /**
     * Prints a verbose
     * @param $text text to print
     */
    public static function verbose($text) {
        if (Out::$CURRENT_FORMAT === Out::TERM) {
            Out::log($text, Verbose::$VERBOSE_CODE, Verbose::$VERBOSE_STYLE, Verbose::$VERBOSE_STYLE_DEBUG);
        } else {
            Out::log($text, Verbose::$VERBOSE_CODE, Verbose::$HTML_VERBOSE_STYLE, Verbose::$HTML_VERBOSE_STYLE_DEBUG);
        }
    }

    /**
     * set the style of this output
     * @param $style style of the text
     * @param $styleDebug style of the line message
     */
    public static function setStyle($style, $styleDebug=null) {
        Verbose::$VERBOSE_STYLE = $style->getCode();

        if ($styleDebug) {
            Verbose::$VERBOSE_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    /**
     * reset the style of this output
     */
    public static function resetStyle () {
        Verbose::$VERBOSE_STYLE = Verbose::$VERBOSE_STYLE_DEFAULT;
        Verbose::$VERBOSE_STYLE_DEBUG = Verbose::$VERBOSE_STYLE_DEBUG_DEFAULT;
    }
}