<?php

namespace phpdotnet\phd;

class Package_MySQL_DocBookTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $format = new Package_MySQL_DocBook();
        $this->assertEquals('DocBook', $format->getFormatName());
        $this->assertFalse($format->isChunked());
        $this->assertEquals('.xml', $format->getExt());
    }

    public function testExt()
    {
        $this->assertNull(Config::ext());

        Config::set_ext('.html');

        $format = new Package_MySQL_DocBook();
        $this->assertEquals('.html', $format->getExt());
    }

    public function testBookToSection()
    {
        $this->containerToSection('book');
    }
    
    public function testChapterToSection()
    {
        $this->containerToSection('chapter');
    }

    public function testSetToSection()
    {
        $this->containerToSection('set');
    }

    public function testAppendixToSection()
    {
        $this->containerToSection('appendix');
    }

    public function testRemoveTitleAbbrev()
    {
        $title = 'MySQL Improved Extension';
        $titleabbrev = 'Mysqli';
        $xml = <<<XML
<book xml:id="book.mysqli">
  <title>{$title}</title>
  <titleabbrev>{$titleabbrev}</titleabbrev>
</book>
XML;
 
        $format = new Package_MySQL_DocBook();
        $parsed = $format->parse($xml);

        $this->assertThat($parsed, $this->stringContains($title));
        $this->assertThat($parsed, $this->stringContains("(<literal>{$titleabbrev}</literal>)"));
        $this->assertFalse(strstr($parsed, 'titleabbrev'));
    }

    public function testFormatRefname()
    {
        $xml = '<refname>mysql_affected_rows</refname>';
        $parsed = $this->parseXML($xml);
        $this->assertEquals('<para><literal>mysql_affected_rows</literal></para>', $parsed);

        $xml = '<refname>mysqli::affected_rows</refname>';
        $parsed = $this->parseXML($xml);
        $this->assertEquals('<para><literal>mysqli::affected_rows</literal></para>', $parsed);
    }

    public function testFormatRefnamediv()
    {
        $xml = <<<XML
<refnamediv>
  <refname>mysqli::affected_rows</refname>
  <refname>mysqli_affected_rows</refname>
  <refpurpose>Gets the number of affected rows in a previous MySQL operation</refpurpose>
</refnamediv>
XML;

        $parsed = $this->parseXML($xml);
        $this->assertThat($parsed, $this->stringContains('<literal>mysqli::affected_rows</literal>'));
        $this->assertThat($parsed, $this->stringContains('<literal>mysqli_affected_rows</literal>'));

        //Incomplete
    }

    protected function parseXML($xml) {
        $format = new Package_MySQL_DocBook();
        return $format->parse($xml);
    }

    protected function containerToSection($element)
    {
        $title = '<title>Test Title</title>';
        $xml = "<{$element}>{$title}</{$element}>";
 
        $format = new Package_MySQL_DocBook();
        $parsed = $format->parse($xml);

        $elementmap = $format->getElementMap();
        $this->assertEquals('format_section', $elementmap[$element]);

        $this->assertStringMatchesFormat('<section>%a</section>', $parsed);
        $this->assertThat($parsed, $this->stringContains($title));
        $this->assertThat($parsed, $this->stringContains($format->getCopyrightInfo()));
        $this->assertFalse(strstr($parsed, $element));
    }

}
