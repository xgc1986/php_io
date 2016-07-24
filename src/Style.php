<?php

namespace IO;

class Style {

	const BLACK     = "0m";
    const RED       = "1m";
    const GREEN     = "2m";
    const YELLOW    = "3m";
    const BLUE      = "4m";
    const MAGENTA   = "5m";
    const CYAN      = "6m";
    const WHITE     = "7m";

	private $code = "";

	private $htmlCode = ""

	public function __construct($color=self::WHITE, $background=self::BLACK, $bright=0, $underline=0) {

		$this->code = "";
		$type = 2;

		if ($color == self::WHITE) {
			$type = 0;
		}
		if ($bright && $underline) {
			$this->code .= "\033[1;3$color";
			$this->code .= "\033[4;4$background";
		} else if ($bright) {
			$this->code .= "\033[$type;3$color";
			$this->code .= "\033[1;4$background";
		} else if ($underline) {
			$this->code .= "\033[$type;3$color";
			$this->code .= "\033[4;4$background";
		} else {
			$this->code .= "\033[$type;3$color";
			$this->code .= "\033[$type;4$background";
		}
	}

	public function getCode() {
		return $this->code;
	}
}