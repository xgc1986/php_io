# IO

Basically I am tired of use `echo`, `print_r` and `var_dump`, echo for instance I cannot see a difference between false, 0, '' and NULL, and also wiith printr_r I forgot where I put these. And var_dump it is very ugly, shows too much information making the output too big and unreadable. And that is because I have created this library, it prints different types of messages depending what are you printing

## Installation

```bash
$ composer require xgc1986/io
```

## Usage

```php
use Out;
use Style;

Out::info("A info message");
Out::verbose("A verbose message");
Out::warning("A warning message");
Out::error("A error message");
Out::wtf("A wtf message");
Out::separator(); // just prints an horizontal line

// Also prints objects and arrays
Out::var("object", [
    [
        "true" => true,
        "false" => false,
        "0" => 0,
        "NULL" => NULL,
        "String" => "Some text",
        "EmpyString" => "",
        "LongString" => "123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890"
    ],
    [
        "true" => true,
        "false" => false,
        "0" => 0,
        "NULL" => NULL,
        "String" => "Some text",
        "EmpyString" => "",
        "LongString" => "123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890"
    ]
]);

// And yuo can set the style of each type of output
IO\Traits\Info::setStyle(
	new Style(Style::BLACK, Style::WHITE)
	new Style(Style::WHITE, Style::BLACK, 1, 1)
);

// Now if you print an info message, it will have a black text on white background and the line reference will be printed
// with white text on black background, also will be bright and underlined

// to reset the style of info (the same with the other types)
IO\Traits\Info::resetStyle();

// finally if you don't want the styles, and simply print a raw output to put the putput in to a file for example, then:
Out::dissableStyles();


// And if for some reason you don't want to know where is printed
Out::dissableDebug();

TODO
[ ] - print in html format
```