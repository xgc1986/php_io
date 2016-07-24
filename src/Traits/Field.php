<?php

namespace IO\Traits;

use IO\Out;
use IO\Terminal;
use IO\Style;

trait Field {

    public static $VAR_STYLE_BG_DEFAULT = "\033[2;40m";
    public static $VAR_STYLE_BG = "\033[2;40m";


    public static $VAR_STYLE_TYPE_DEFAULT = "\033[2;32m";
    public static $VAR_STYLE_TYPE = "\033[2;32m";

    public static $VAR_STYLE_VALUE_DEFAULT = "\033[1;34m";
    public static $VAR_STYLE_VALUE = "\033[1;34m";

    public static $VAR_STYLE_NAME_DEFAULT = "\033[0;37m";
    public static $VAR_STYLE_NAME = "\033[0;37m";

    public static $VAR_STYLE_DBG_DEFAULT = "\033[2;32m";
    public static $VAR_STYLE_DBG = "\033[2;32m";

    public static $INDENTATION = 2;

    public static function setStyle($type, $value, $name, $dbg, $bg) {
        Out::$VAR_STYLE_BG = $bg->getCode();
        Out::$VAR_STYLE_TYPE = $type->getCode();
        Out::$VAR_STYLE_VALUE = $value->getCode();
        Out::$VAR_STYLE_NAME = $name->getCode();
        Out::$VAR_STYLE_DBG = $dbg->getCode();
    }

    public static function resetStyle () {
        Out::$VAR_STYLE_BG = Out::$VAR_STYLE_BG_DEFAULT;
        Out::$VAR_STYLE_TYPE = Out::$VAR_STYLE_TYPE_DEFAULT;
        Out::$VAR_STYLE_VALUE = Out::$VAR_STYLE_VALUE_DEFAULT;
        Out::$VAR_STYLE_NAME = Out::$VAR_STYLE_NAME_DEFAULT;
        Out::$VAR_STYLE_DBG = Out::$VAR_STYLE_DBG_DEFAULT;
    }

    public static function var($key, $value, $indentation = 0) {

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

        echo $VAR_STYLE_BG . $spaces . $VAR_STYLE_NAME . $key . ' : ';

        if ($array || $dicc) {
            if ($dicc) {
                echo $VAR_STYLE_TYPE . "OBJECT";
                $length += 6;
            } else {
                echo $VAR_STYLE_TYPE . "ARRAY";
                $length += 5;
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

                echo $spaces . $VAR_STYLE_DBG . $out . $EOL . $CLEAN . "\n";
            } else {
                echo $spaces . $VAR_STYLE_DBG . $out . $EOL . $CLEAN . "\n";
            }
            foreach ($value as $key => $field) {
                Field::var($key, $field, $indentation + 1);
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

                // TODO value muy largo
                $value = substr($value, 0, $remaining - strlen($value) - 3) . "..." ;
            }
            echo $VAR_STYLE_VALUE . $value . $spaces . $VAR_STYLE_DBG . $out . $EOL . $CLEAN . "\n";
        }

        Out::$fullDebug = $dbg;
    }
}