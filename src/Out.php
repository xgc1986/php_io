<?php

namespace IO;

class Out {

    public static function separatorLine($length = 0) {

        if ($length == 0) {
            $length = self::getTermWidth();
        }
        if (!isset(self::$lines[$length])) {
            $line = "";
            for ($i = 0; $i < $length; $i++) {
                $line .= "~";
            }

            self::$lines[$length] = $line;
        }

        self::log(self::$lines[$length], false, self::$LINE_STYLE, self::$LINE_STYLE_DEBUG);
    }

    public static function info($text) {
        self::log($text, "I", self::$INFO_STYLE, self::$INFO_STYLE_DEBUG);
    }

    public static function warning($text) {
        self::log($text, "W", self::$WARNING_STYLE, self::$WARNING_STYLE_DEBUG);
    }

    public static function error($text) {
        self::log($text, "E", self::$ERROR_STYLE, self::$ERROR_STYLE_DEBUG);
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

            $w = self::getTermWidth();

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

    public static function wtf($text) {
        if (self::$styles) {
            $dbg = self::$fullDebug;
            if (self::$fullDebug) {
                self::$fullDebug = false;
            }
            $EOL = self::$EOL;
            self::log("$EOL\n\n$text\n\n", "WTF", self::$WTF_STYLE, self::$WTF_STYLE_DEBUG);
            self::$fullDebug = $dbg;
            if ($dbg) {
                self::log("", false, "", self::$WTF_STYLE_DEBUG);
            }
        } else {
            self::log("$text", "WTF", self::$WTF_STYLE, self::$WTF_STYLE_DEBUG);
        }
    }


    //                                  3 text
    //                                  4 bg
    //
    //                                0 normal
    //                                1 bright
    //                                4 subrayado
    //                                7 invertido
    public static $LINE_STYLE = "\033[1;30m";
    public static $LINE_STYLE_DEBUG = "\033[1;30m";

    public static $INFO_STYLE = "\033[0;34m";
    public static $INFO_STYLE_DEBUG = "\033[1;34m";

    public static $WARNING_STYLE = "\033[0;33m";
    public static $WARNING_STYLE_DEBUG = "\033[1;33m";

    public static $ERROR_STYLE = "\033[0;31m";
    public static $ERROR_STYLE_DEBUG = "\033[1;31m";

    public static $WTF_STYLE = "\033[1;37m\033[1;41m";
    public static $WTF_STYLE_DEBUG = "\033[1;37m\033[1;41m";

    private static $CLEAN = "\x1B[0m";
    private static $EOL = "\x1B[K";

    private static $fullDebug = false;
    private static $styles = true;
    private static $lines = [];
    private static $emptyLines = [];

    private static $level = 2;

    private static $TERM_WIDTH = 0;

    public static function enableStyles() {
        self::$styles = true;
    }

    public static function dissableStyles() {
        self::$styles = false;
    }

    public static function resetLineStyle () {
        self::$LINE_STYLE = "\033[1;30m";
        self::$LINE_STYLE_DEBUG = "\033[1;30m";
    }

    public static function setLineStyle (Style $style, Style $style2=null) {
        self::$LINE_STYLE = $style->getCode();

        if ($style2) {
            self::$LINE_STYLE_DEBUG = $style2->getCode();
        }
    }

    public static function resetInfoStyle () {
        self::$INFO_STYLE = "\033[0;34m";
        self::$INFO_STYLE_DEBUG = "\033[1;34m";
    }

    public static function setInfoStyle (Style $style, Style $style2=null) {
        self::$INFO_STYLE = $style->getCode();

        if ($style2) {
            self::$INFO_STYLE_DEBUG = $style2->getCode();
        }
    }

    public static function resetErrorStyle () {
        self::$ERROR_STYLE = "\033[0;31m";
        self::$ERROR_STYLE_DEBUG = "\033[1;31m";
    }

    public static function setErrorStyle (Style $style, Style $style2=null) {
        self::$ERROR_STYLE = $style->getCode();

        if ($style2) {
            self::$ERROR_STYLE_DEBUG = $style2->getCode();
        }
    }

    public static function resetWtfStyle () {
        self::$WTF_STYLE = "\033[1;37m\033[1;41m";
        self::$WTF_STYLE_DEBUG = "\033[1;37m\033[1;41m";
    }

    public static function setWtfStyle (Style $style, Style $style2=null) {
        self::$WTF_STYLE = $style->getCode();

        if ($style2) {
            self::$WTF_STYLE_DEBUG = $style2->getCode();
        }
    }

    public static function resetWarningStyle () {
        self::$WARNING_STYLE = "\033[0;33m";
        self::$WARNING_STYLE_DEBUG = "\033[1;33m";
    }

    public static function setWarningStyle (Style $style, Style $style2=null) {
        self::$WARNING_STYLE = $style->getCode();

        if ($style2) {
            self::$WARNING_STYLE_DEBUG = $style2->getCode();
        }
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

    private static function getTermWidth() {
        if (!self::$TERM_WIDTH) {
            self::$TERM_WIDTH = exec('tput cols');
        }

        return self::$TERM_WIDTH;
    }
}