<?php

namespace IO;

class Terminal {

	private static $TERM_WIDTH = 0;

	public static function width() {
        if (!self::$TERM_WIDTH) {
            self::$TERM_WIDTH = exec('tput cols');
        }

        return self::$TERM_WIDTH;
    }
}