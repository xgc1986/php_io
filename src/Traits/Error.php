<?php
/**
 * Trait that prints errors
 * @author Javier Gonzalez Cuadrado <xgc1986@gmail.com>
 */

namespace IO\Traits;

use IO\Out;

/**
 * Trait that prints errors
 */
trait Error {

    /**
     * @ignore
     */
    public static $ERROR_CODE = "E";

    /**
     * @ignore
     */
    public static $ERROR_STYLE_DEFAULT = "\033[0;31m";

    /**
     * @ignore
     */
    public static $ERROR_STYLE_DEBUG_DEFAULT = "\033[1;31m";

    /**
     * @ignore
     */
    public static $ERROR_STYLE = "\033[0;31m";

    /**
     * @ignore
     */
    public static $ERROR_STYLE_DEBUG = "\033[1;31m";

    /**
     * @ignore
     */
    public static $HTML_ERROR_STYLE = "color:red;font-weight:normal;text-decoration:none;";

    /**
     * @ignore
     */
    public static $HTML_ERROR_STYLE_DEBUG = "color:red;font-weight:bold;text-decoration:none;";

    /**
     * Prints an error
     * @param $text text to print
     */
    public static function error($text) {
        if (Out::$CURRENT_FORMAT === Out::TERM) {
            Out::log($text, Error::$ERROR_CODE, Error::$ERROR_STYLE, Error::$ERROR_STYLE_DEBUG);
        } else {
            Out::log($text, Error::$ERROR_CODE, Error::$HTML_ERROR_STYLE, Error::$HTML_ERROR_STYLE_DEBUG);
        }
    }

    /**
     * set the style of this output
     * @param $style style of the text
     * @param $styleDebug style of the line message
     */
    public static function setStyle($style, $styleDebug=null) {
        Error::$ERROR_STYLE = $style->getCode();

        if ($styleDebug) {
            Error::$ERROR_STYLE_DEBUG = $styleDebug->getCode();
        }
    }

    /**
     * reset the style of this output
     */
    public static function resetStyle () {
        Error::$ERROR_STYLE = Error::$ERROR_STYLE_DEFAULT;
        Error::$ERROR_STYLE_DEBUG = Error::$ERROR_STYLE_DEBUG_DEFAULT;
    }
}