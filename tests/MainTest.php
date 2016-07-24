<?php

use PHPUnit\Framework\TestCase;

class IOTest extends TestCase {

    public function testNoStyle() {

        IO\Out::dissableStyles();
        IO\Out::enableDebug();

        echo PHP_EOL;
        echo "\nNo styles\n";

        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));

        IO\Out::dissableDebug();
        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));
    }

    public function testDefaults() {
        IO\Out::enableStyles();
        IO\Out::enableDebug();
        echo PHP_EOL;
        echo "\nDefault styles\n";

        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));

        IO\Out::dissableDebug();
        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));
    }

    public function testCustoms() {
        IO\Out::enableStyles();
        IO\Out::enableDebug();
        echo PHP_EOL;
        echo "\nCustom styles\n";

        IO\Traits\Separator::setStyle(new IO\Style(IO\Style::YELLOW, IO\Style::BLACK), new IO\Style(IO\Style::WHITE, IO\Style::RED, 1));
        IO\Traits\Verbose::setStyle(new IO\Style(IO\Style::BLACK, IO\Style::BLACK, 1), new IO\Style(IO\Style::BLACK, IO\Style::BLACK, 1));
        IO\Traits\Info::setStyle(new IO\Style(IO\Style::WHITE, IO\Style::BLUE), new IO\Style(IO\Style::WHITE, IO\Style::BLUE, 1, 1));
        IO\Traits\Warning::setStyle(new IO\Style(IO\Style::BLACK, IO\Style::YELLOW), new IO\Style(IO\Style::BLACK, IO\Style::YELLOW, 1, 1));
        IO\Traits\Error::setStyle(new IO\Style(IO\Style::WHITE, IO\Style::RED), new IO\Style(IO\Style::WHITE, IO\Style::RED, 1, 1));
        IO\Traits\Wtf::setStyle(new IO\Style(IO\Style::RED, IO\Style::WHITE), new IO\Style(IO\Style::RED, IO\Style::WHITE, 1, 1));
        IO\Traits\Field::setStyle(
            new IO\Style(IO\Style::WHITE, IO\Style::RED, 1),
            new IO\Style(IO\Style::WHITE, IO\Style::RED, 1),
            new IO\Style(IO\Style::WHITE, IO\Style::RED, 1),
            new IO\Style(IO\Style::WHITE, IO\Style::RED, 1),
            new IO\Style(IO\Style::WHITE, IO\Style::RED, 1)
        );

        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));

        IO\Out::dissableDebug();
        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));
    }

    public function testReset() {
        IO\Out::enableStyles();
        IO\Out::enableDebug();
        echo PHP_EOL;
        echo "\nReset styles\n";

        IO\Traits\Separator::setStyle(new IO\Style(IO\Style::YELLOW, IO\Style::BLACK), new IO\Style(IO\Style::WHITE, IO\Style::RED, 1));
        IO\Traits\Verbose::setStyle(new IO\Style(IO\Style::BLACK, IO\Style::BLACK, 1), new IO\Style(IO\Style::BLACK, IO\Style::BLACK, 1));
        IO\Traits\Info::setStyle(new IO\Style(IO\Style::WHITE, IO\Style::BLUE), new IO\Style(IO\Style::WHITE, IO\Style::BLUE, 1, 1));
        IO\Traits\Warning::setStyle(new IO\Style(IO\Style::BLACK, IO\Style::YELLOW), new IO\Style(IO\Style::BLACK, IO\Style::YELLOW, 1, 1));
        IO\Traits\Error::setStyle(new IO\Style(IO\Style::WHITE, IO\Style::RED), new IO\Style(IO\Style::WHITE, IO\Style::RED, 1, 1));
        IO\Traits\Wtf::setStyle(new IO\Style(IO\Style::RED, IO\Style::WHITE), new IO\Style(IO\Style::RED, IO\Style::WHITE, 1, 1));
        IO\Traits\Field::setStyle(
            new IO\Style(IO\Style::WHITE, IO\Style::GREEN),
            new IO\Style(IO\Style::WHITE, IO\Style::GREEN),
            new IO\Style(IO\Style::WHITE, IO\Style::GREEN),
            new IO\Style(IO\Style::WHITE, IO\Style::GREEN),
            new IO\Style(IO\Style::WHITE, IO\Style::GREEN)
        );

        IO\Traits\Separator::resetStyle();
        IO\Traits\Verbose::resetStyle();
        IO\Traits\Info::resetStyle();
        IO\Traits\Warning::resetStyle();
        IO\Traits\Error::resetStyle();
        IO\Traits\Wtf::resetStyle();
        IO\Traits\Field::resetStyle();

        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));

        IO\Out::dissableDebug();
        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?\n2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));
    }

    public function testSpecial() {
        echo PHP_EOL;
        $this->print(true);
    }

    public function print($value=false) {
        if ($value) {
            IO\Traits\Verbose::setStyle(new IO\Style(IO\Style::WHITE, IO\Style::RED, 1), new IO\Style(IO\Style::WHITE, IO\Style::RED, 1));
            IO\Traits\Field::setStyle(
                new IO\Style(IO\Style::WHITE, IO\Style::RED, 1),
                new IO\Style(IO\Style::WHITE, IO\Style::RED, 1),
                new IO\Style(IO\Style::WHITE, IO\Style::RED, 1),
                new IO\Style(IO\Style::WHITE, IO\Style::RED, 1),
                new IO\Style(IO\Style::WHITE, IO\Style::RED, 1)
            );

            IO\Out::$level = IO\Out::$level + 1;
            IO\Out::dissableDebug();
            IO\Out::verbose("");
            IO\Out::enableDebug();
            IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}') , 1);
            IO\Out::dissableDebug();
            IO\Out::verbose("");
            IO\Out::$level = IO\Out::$level - 1;
        }
    }

    public function testHtml() {
        IO\Out::enableDebug();
        echo PHP_EOL;
        IO\Out::format(IO\Out::HTML);

        IO\Out::enableStyles();
        IO\Out::enableDebug();
        echo PHP_EOL;
        echo "\nHtml styles\n";

        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?<br>2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));

        IO\Out::dissableDebug();
        IO\Out::separator();
        IO\Out::verbose("Verbose");
        IO\Out::verbose("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::info("Info");
        IO\Out::info("This message have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::warning("Warning");
        IO\Out::warning("This warning have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::error("Error");
        IO\Out::error("This error have a lot of characters because I need a very long text to test this, because is important the it will have more characters than the screen width, but I think that I have written enough characters");
        IO\Out::wtf("WTF");
        IO\Out::wtf("How many lines has this wtf?<br>2");
        IO\Out::pvar("boolean", true);
        IO\Out::pvar("boolean", false);
        IO\Out::pvar("null var", NULL);
        IO\Out::pvar("integer", 1);
        IO\Out::pvar("integer", 0);
        IO\Out::pvar("empty string", "");
        IO\Out::pvar("string", "I am a string");
        IO\Out::pvar("string", "1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890");
        IO\Out::pvar("object", json_decode('{"glossary":{"title":"example glossary","GlossDiv":{"title":"S","GlossList":{"GlossEntry":{"ID":"SGML","SortAs":"SGML","GlossTerm":"Standard Generalized Markup Language","Acronym":"SGML","Abbrev":"ISO 8879:1986","GlossDef":{"para":"A meta-markup language, used to create markup languages such as DocBook.","GlossSeeAlso":["GML","XML"]},"GlossSee":"markup"}}}}}'));

    }
}