<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        // TODO "Hello ${foo}"
        $this->assertEquals('Hello world', "Hello ${foo}");


        // TODO "Hello " . $foo
        $this->assertEquals('Hello world', "Hello " . $foo);

        // TODO Heredoc
        $dbar = <<<EOD
Hello $foo
EOD;
        $this->assertEquals('Hello world', $dbar);

        // TODO Nowdoc
        $bar = <<<'EOT'
Hello $foo
EOT;
        $this->assertEquals('Hello $foo', $bar);
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('....Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        // TODO to be implemented
        $this->assertEquals('Hello', ltrim('          Hello'));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        // TODO to be implemented
        $this->assertEquals('Hello', rtrim('Hello......', '.'));


        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        // TODO to be implemented
        $this->assertEquals('Hello', ucfirst('hello'));


        // lcfirst — Make a string's first character lowercase
        // TODO to be implemented
        $this->assertEquals('hello', lcfirst('Hello'));


        // strip_tags — Strip HTML and PHP tags from a string
        // TODO to be implemented
        $this->assertEquals('Hello. World', strip_tags('<p>Hello.</p><!-- Comment --> <a href="#link">World</a>'));


        // htmlspecialchars — Convert special characters to HTML entities
        // TODO to be implemented
        $this->assertEquals("&lt;a href='hello'&gt;World&lt;/a&gt;", htmlspecialchars("<a href='hello'>World</a>"));


        // addslashes — Quote string with slashes
        // TODO to be implemented
        $this->assertEquals("Hello \'world\'", addslashes("Hello 'world'"));


        // strcmp — Binary safe string comparison
        // TODO to be implemented
        $this->assertEquals(0, strcmp("Hello 'world'", "Hello 'world'"));
        $this->assertEquals(1, strcmp("Hello world", "Hello 'world'"));
        $this->assertEquals(-1, strcmp("Hello 'world'", "Hello world"));


        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        // TODO to be implemented
        $this->assertEquals(0, strncasecmp("Hello World", "Hello world", 11));


        // str_replace — Replace all occurrences of the search string with the replacement string
        // TODO to be implemented
        $this->assertEquals("Hello Max", str_replace("world", "Max", "Hello world"));


        // strpos — Find the position of the first occurrence of a substring in a string
        // TODO to be implemented
        $this->assertEquals(6, strpos("Hello Max", "Max"));


        // strstr — Find the first occurrence of a string
        // TODO to be implemented
        $this->assertEquals("Max to EPAM", strstr("Hello Max to EPAM", "Max"));


        // strrchr — Find the last occurrence of a character in a string
        // TODO to be implemented
        $this->assertEquals("M family", strrchr("Hello Max to EPAM family", "Max"));


        // substr — Return part of a string
        // TODO to be implemented
        $this->assertEquals("EPAM", substr("Hello Max to EPAM family", 13, 4));


        // sprintf — Return a formatted string
        // TODO to be implemented
        $this->assertEquals("30 students has enrolled to this course", sprintf("%d students has enrolled to this %s", 30, 'course'));

    }
}
