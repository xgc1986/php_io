<?php
/**
 * Trait that prints variables
 */

namespace IO\Traits;

use IO\Out;
use IO\Terminal;
use IO\Style;

/**
 * Trait that prints variables
 */
trait Field {

    /**
     * @ignore
     */
    public static $VAR_STYLE_BG_DEFAULT = "\033[2;40m";

    /**
     * @ignore
     */
    public static $VAR_STYLE_BG = "\033[2;40m";

    /**
     * @ignore
     */
    public static $VAR_STYLE_TYPE_DEFAULT = "\033[2;32m";

    /**
     * @ignore
     */
    public static $VAR_STYLE_TYPE = "\033[2;32m";

    /**
     * @ignore
     */
    public static $HTML_VAR_STYLE_TYPE = "color:green";

    /**
     * @ignore
     */
    public static $VAR_STYLE_VALUE_DEFAULT = "\033[1;34m";

    /**
     * @ignore
     */
    public static $VAR_STYLE_VALUE = "\033[1;34m";

    /**
     * @ignore
     */
    public static $HTML_VAR_STYLE_VALUE = "text-overflow:clip;overflow:hidden;color:blue";

    /**
     * @ignore
     */
    public static $VAR_STYLE_NAME_DEFAULT = "\033[0;37m";

    /**
     * @ignore
     */
    public static $VAR_STYLE_NAME = "\033[0;37m";

    /**
     * @ignore
     */
    public static $HTML_VAR_STYLE_NAME = "color:black";

    /**
     * @ignore
     */
    public static $VAR_STYLE_DBG_DEFAULT = "\033[2;32m";

    /**
     * @ignore
     */
    public static $VAR_STYLE_DBG = "\033[2;32m";

    /**
     * @ignore
     */
    public static $HTML_VAR_STYLE_DBG = "color:black;font-weight:bold;";

    /**
     * @ignore
     */
    public static $INDENTATION = 2;

    /**
     * set the style of this output
     * @param $type style of the type
     * @param $value style of the value
     * @param $name style of the name
     * @param $dbg style of the debug line
     * @param $bg style of the bg
     */
    public static function setStyle($type, $value, $name, $dbg, $bg) {
        Out::$VAR_STYLE_BG = $bg->getCode();
        Out::$VAR_STYLE_TYPE = $type->getCode();
        Out::$VAR_STYLE_VALUE = $value->getCode();
        Out::$VAR_STYLE_NAME = $name->getCode();
        Out::$VAR_STYLE_DBG = $dbg->getCode();
    }

    /**
     * reset the style of this output
     */
    public static function resetStyle () {
        Out::$VAR_STYLE_BG = Out::$VAR_STYLE_BG_DEFAULT;
        Out::$VAR_STYLE_TYPE = Out::$VAR_STYLE_TYPE_DEFAULT;
        Out::$VAR_STYLE_VALUE = Out::$VAR_STYLE_VALUE_DEFAULT;
        Out::$VAR_STYLE_NAME = Out::$VAR_STYLE_NAME_DEFAULT;
        Out::$VAR_STYLE_DBG = Out::$VAR_STYLE_DBG_DEFAULT;
    }

    /**
     * Prints a variable
     * @param $key variable name
     * @param $value variable value
     * @param $indentation indentation to print (default = 0)
     */
    public static function pvar($key, $value, $indentation = 0) {

        $EOL = "";
        $CLEAN = "";
        $VAR_STYLE_BG = "";
        $VAR_STYLE_TYPE = "";
        $VAR_STYLE_VALUE = "";
        $VAR_STYLE_NAME = "";
        $VAR_STYLE_DBG = "";

        if (Out::$styles) {
            $EOL = Out::$EOL;
            $CLEAN = Out::$CLEAN;
            $VAR_STYLE_BG = Out::$VAR_STYLE_BG;
            $VAR_STYLE_TYPE = Out::$VAR_STYLE_TYPE;
            $VAR_STYLE_VALUE = Out::$VAR_STYLE_VALUE;
            $VAR_STYLE_NAME = Out::$VAR_STYLE_NAME;
            $VAR_STYLE_DBG = Out::$VAR_STYLE_DBG;
        }


        $length = $indentation * Field::$INDENTATION + strlen($key) + 3;

        $dbg = Out::$fullDebug;

        if ($dbg) {
            Out::$fullDebug = false;
        }

        // Print spaces
        $spaces = "";
        for ($i = 0; $i < $indentation * Field::$INDENTATION; $i++) {
            $spaces .= ' ';
        }

        $array = $dicc = false;
        try {
            $array = is_array($value);
            $dicc = get_class($value) === "stdClass";
        }
        catch (\Exception $e) {}
        catch (\Error $e) {}

        if (Out::$CURRENT_FORMAT === Out::TERM) {
            echo $VAR_STYLE_BG . $spaces . $VAR_STYLE_NAME . $key . ' : ';
        } else {
            $ind = $indentation * 25;
            $style = self::$HTML_VAR_STYLE_NAME;
            echo "<div style='clear:both;" . "px;'>";
            echo "<span style='float:left;text-indent:$ind;$style'>$key&nbsp;:&nbsp;</span>";
        }

        if ($array || $dicc) {
            $style = self::$HTML_VAR_STYLE_TYPE;
            if ($dicc) {
                if (Out::$CURRENT_FORMAT === Out::TERM) {
                    echo $VAR_STYLE_TYPE . "OBJECT";
                    $length += 6;
                } else {
                    echo "<span style='float:left;$style'>OBJECT</span>";
                }
            } else {
                if (Out::$CURRENT_FORMAT === Out::TERM) {
                    echo $VAR_STYLE_TYPE . "ARRAY";
                    $length += 5;
                } else {
                    echo "<span style='float:left;$style'>ARRAY</span>";
                }
            }

            $out = "";
            if ($dbg) {
                $width = Terminal::width();

                $bt = debug_backtrace(false, self::$level);
                $class = $bt[self::$level - 1]["class"];
                $function = $bt[self::$level - 1]["function"];
                $line = $bt[self::$level - 2]["line"];

                $out = " $class/$function:$line";

                $length += strlen($out);

                $total = $width - $length - 1;
                $spaces = '';

                for ($i = 0; $i < $total; $i++) {
                    $spaces .= ' ';
                }

                $style = self::$HTML_VAR_STYLE_DBG;
                if (Out::$CURRENT_FORMAT === Out::TERM) {
                    echo $spaces . $VAR_STYLE_DBG . $out . $EOL . $CLEAN . "\n";
                } else {
                    echo "<span style='float:right;$style'>$out</span></div>";
                }
            } else {
                if (Out::$CURRENT_FORMAT === Out::TERM) {
                    echo $spaces . $VAR_STYLE_DBG . $out . $EOL . $CLEAN . "\n";
                } else {
                    echo "</div>";
                }
            }
            foreach ($value as $key => $field) {
                Field::pvar($key, $field, $indentation + 1);
            }
        } else {
            if ($value === false) {
                $value = "false";
            } if ($value === true) {
                $value = "true";
            } else if ($value === NULL) {
                $value = "NULL";
            } else if ($value === "") {
                $value = "''";
            } else if ($value === 0) {
                $value = "0";
            }

            $out = "";
            $width = Terminal::width();
            if ($dbg) {

                $bt = debug_backtrace(false, Out::$level);
                $class = $bt[Out::$level - 1]["class"];
                $function = $bt[Out::$level - 1]["function"];
                $line = $bt[Out::$level - 2]["line"];
                $out = " $class/$function:$line";
            }

            $length += strlen($out);

            $remaining = $width - $length - 1;

            $spaces = "";
            if (strlen($value) <= $remaining) {

                for ($i = 0; $i < $remaining - strlen($value); $i++) {
                    $spaces .= ' ';
                }
            } else {
                $value = substr($value, 0, $remaining - strlen($value) - 3) . "..." ;
            }

            $style = self::$HTML_VAR_STYLE_VALUE;
            $style2 = self::$HTML_VAR_STYLE_DBG;

            if (Out::$CURRENT_FORMAT === Out::TERM) {
                echo $VAR_STYLE_VALUE . $value . $spaces . $VAR_STYLE_DBG . $out . $EOL . $CLEAN . "\n";
            } else {
                echo "<span style='float:left;$style'>$value</span><span style='float:right;$style2'>$out</span></div>";
            }
        }

        Out::$fullDebug = $dbg;
    }
}