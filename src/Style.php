<?php
/**
 * Style just helps to create prompt code for styling texts
 */

namespace IO;

/**
 * Style just helps to create prompt code for styling texts
 *
 * @author Javier Gonzalez Cuadrado <xgc1986@gmail.com>
 */
class Style {

    const BLACK     = "0m";
    const RED       = "1m";
    const GREEN     = "2m";
    const YELLOW    = "3m";
    const BLUE      = "4m";
    const MAGENTA   = "5m";
    const CYAN      = "6m";
    const WHITE     = "7m";

    /**
     * @ignore
     */
    private $code = "";

    /**
     * @ignore
     */
    private $htmlCode = "";

    /**
     * Constructor
     * @param $color text's color
     * @param $background background's color
     * @param $bright set text to be brighter
     * @param $underline if you want underlined text
     */
    public function __construct($color=self::WHITE, $background=null, $bright=0, $underline=0) {

        $this->code = "";
        $type = 2;

        if ($color == self::WHITE) {
            $type = 0;
        }
        if ($bright && $underline) {
            if ($background) {
                $this->code .= "\033[1;3$color";
                $this->code .= "\033[4;4$background";
            } else {
                $this->code .= "\033[1;3$color";
                $this->code .= "\033[4;3$color";
            }
        } else if ($bright) {
            if ($background) {
                $this->code .= "\033[$type;3$color";
                $this->code .= "\033[1;4$background";
            } else {
                $this->code .= "\033[1;3$color";
            }
        } else if ($underline) {
            if ($background) {
                $this->code .= "\033[$type;3$color";
                $this->code .= "\033[4;4$background";
            } else {
                $this->code .= "\033[4;3$color";
            }
        } else {
            $this->code .= "\033[$type;3$color";
            if ($background) {
                $this->code .= "\033[$type;4$background";
            }
        }
    }

    /**
     * Get the prompt code
     * @return string prompt code of the style
     * @example src/Style.php
     */
    public function getCode() : \String {
        return $this->code;
    }
}