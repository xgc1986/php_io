<?php
/**
 * Dummy class
 */

namespace IO\Traits;

use IO\Out;

/**
 * @ignore
 */
trait Dummy {

    public static $STYLE_DEFAULT = "";
    public static $STYLE_DEBUG_DEFAULT = "";
	public static $STYLE = "";
    public static $STYLE_DEBUG = "";

    public static $HTML_STYLE_DEFAULT = "";
    public static $HTML_STYLE_DEBUG_DEFAULT = "";
    public static $HTML_STYLE = "";
    public static $HTML_STYLE_DEBUG = "";

    /**
     * set the style of this output
     * @param $style style of the text
     * @param $style style of the line message
     */
    public static function setStyle($style, $styleDebug=null) {
    	self::$STYLE = $style->getCode();

        if ($styleDebug) {
            self::$STYLE_DEBUG = $style2->getCode();
        }
    }

    /**
     * reset the style of this output
     */
    public static function resetStyle () {
        self::$STYLE = self::$STYLE_DEFAULT;
        self::$STYLE_DEBUG = self::$STYLE_DEBUG_DEFAULT;
    }
}