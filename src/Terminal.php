<?php
/**
 * Terminal is a simple implementation of a Terminal.
 * It provides methods to access to the terminal
 */

namespace IO;

/**
 * Terminal is a simple implementation of a Terminal.
 * It provides methods to access to the terminal
 *
 * @author Javier Gonzalez Cuadrado <xgc1986@gmail.com>
 */
class Terminal {

	/**
	 * @ignore
	 */
	private static $TERM_WIDTH = 0;

	/**
	 * width of the terminal in chars
	 *
	 * @author Javier Gonzalez Cuadrado <xgc1986@gmail.com>
	 *
	 * @return integer width of the terminal in chars
 	 */
	public static function width() : int {
        if (!self::$TERM_WIDTH) {
            self::$TERM_WIDTH = exec('tput cols');
        }

        return intval(self::$TERM_WIDTH);
    }
}