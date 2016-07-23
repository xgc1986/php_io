<?php

use PHPUnit\Framework\TestCase;

class IOTest extends TestCase {

	public function testNoStyle() {
		IO\Out::dissableStyles();
		IO\Out::enableDebug();

		echo PHP_EOL;
		echo "\nNo styles\n";

        IO\Out::separatorLine();
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");

        IO\Out::dissableDebug();
        IO\Out::separatorLine();
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
	}

	public function testDefaults() {
		IO\Out::enableStyles();
		IO\Out::enableDebug();
		echo PHP_EOL;
		echo "\nDefault styles\n";

		IO\Out::separatorLine();
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");

        IO\Out::dissableDebug();
        IO\Out::separatorLine();
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
	}

	public function testCustoms() {
		IO\Out::enableStyles();
		IO\Out::enableDebug();
		echo PHP_EOL;
		echo "\nCustom styles\n";

		IO\Out::setLineStyle(new IO\Style(IO\Style::YELLOW, IO\Style::BLACK), new IO\Style(IO\Style::WHITE, IO\Style::RED, 1));
        IO\Out::setInfoStyle(new IO\Style(IO\Style::WHITE, IO\Style::BLUE), new IO\Style(IO\Style::WHITE, IO\Style::BLUE, 1, 1));
        IO\Out::setWarningStyle(new IO\Style(IO\Style::BLACK, IO\Style::YELLOW), new IO\Style(IO\Style::BLACK, IO\Style::YELLOW, 1, 1));
        IO\Out::setErrorStyle(new IO\Style(IO\Style::WHITE, IO\Style::RED), new IO\Style(IO\Style::WHITE, IO\Style::RED, 1, 1));
        IO\Out::setWtfStyle(new IO\Style(IO\Style::RED, IO\Style::WHITE), new IO\Style(IO\Style::RED, IO\Style::WHITE, 1, 1));

        IO\Out::separatorLine();
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");

        IO\Out::dissableDebug();
        IO\Out::separatorLine();
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
	}

	public function testReset() {
		IO\Out::enableStyles();
		IO\Out::enableDebug();
		echo PHP_EOL;
		echo "\nReset styles\n";

		IO\Out::setLineStyle(new IO\Style(IO\Style::YELLOW, IO\Style::BLACK), new IO\Style(IO\Style::WHITE, IO\Style::RED, 1));
        IO\Out::setInfoStyle(new IO\Style(IO\Style::WHITE, IO\Style::BLUE), new IO\Style(IO\Style::WHITE, IO\Style::BLUE, 1, 1));
        IO\Out::setWarningStyle(new IO\Style(IO\Style::BLACK, IO\Style::YELLOW), new IO\Style(IO\Style::BLACK, IO\Style::YELLOW, 1, 1));
        IO\Out::setErrorStyle(new IO\Style(IO\Style::WHITE, IO\Style::RED), new IO\Style(IO\Style::WHITE, IO\Style::RED, 1, 1));

        IO\Out::resetLineStyle();
        IO\Out::resetInfoStyle();
        IO\Out::resetWarningStyle();
        IO\Out::resetErrorStyle();
        IO\Out::resetWtfStyle();

        IO\Out::separatorLine();
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");

        IO\Out::dissableDebug();
        IO\Out::separatorLine();
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
	}

}