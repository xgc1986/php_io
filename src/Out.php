<?php

namespace IO;

use IO\Traits\Separator;
use IO\Traits\Dummy;
use IO\Traits\Verbose;
use IO\Traits\Info;
use IO\Traits\Error;
use IO\Traits\Warning;
use IO\Traits\Wtf;
use IO\Traits\Field;

class Out {

    use
        Field,
        Separator,
        Dummy,
        Verbose,
        Info,
        Warning,
        Error,
        Wtf {
            Dummy::setStyle insteadof Separator, Verbose, Info, Warning, Error, Wtf, Field;
            Dummy::resetStyle insteadof Separator, Verbose, Info, Warning, Error, Wtf, Field;
    }

    public static function log($text, $tag, $style1, $style2) {
        if ($tag) {
            $pre = "[$tag] ";
        } else {
            $pre = "";
        }

        $LS = "";
        $LSD = "";
        $CLEAN = "";
        $EOL = "";

        if (self::$styles) {
            $pre = "";
            $LS = $style1;
            $LSD = $style2;
            $CLEAN = self::$CLEAN;
            $EOL = self::$EOL;
        }

        echo "$LS$pre$text";

        if (self::$fullDebug) {
            $bt = debug_backtrace(false, self::$level + 1);
            $class = $bt[self::$level]["class"];
            $function = $bt[self::$level]["function"];
            $line = $bt[self::$level - 1]["line"];

            $w = Terminal::width();

            $out = " $class/$function:$line";
            if (strlen("$pre$text") <= $w ) {
                $spaces = self::generateSpaces($w - strlen("$pre$text") - strlen("$out") - 1);
                echo "$spaces$LSD$out$EOL$CLEAN\n";
            } else {
                $spaces = self::generateSpaces($w - strlen("$out") - 1);
                echo "$EOL$CLEAN\n$spaces$LSD$out$EOL$CLEAN\n";
            }
        } else {
            echo "$EOL$CLEAN\n";
        }
    }


    //                                  3 text
    //                                  4 bg
    //
    //                                0 normal
    //                                1 bright
    //                                4 subrayado
    //                                7 invertido
    public static $CLEAN = "\x1B[0m";
    public static $EOL = "\x1B[K";

    public static $fullDebug = true;
    public static $styles = true;
    public static $lines = [];
    public static $emptyLines = [];

    public static $level = 2;

    public static $TERM_WIDTH = 0;

    public static function enableStyles() {
        self::$styles = true;
    }

    public static function dissableStyles() {
        self::$styles = false;
    }

    public static function setLevel($level) {
        self::$level = $level + 2;
    }

    public static function dissableDebug() {
        self::$fullDebug = false;
    }

    public static function enableDebug() {
        self::$fullDebug = true;
    }

    public static function generateSpaces($length = 80) {
        if (!isset(self::$emptyLines[$length])) {
            $line = "";
            for ($i = 0; $i < $length; $i++) {
                $line .= " ";
            }

            self::$emptyLines[$length] = $line;
        }

        return self::$emptyLines[$length];
    }
}