<?php

namespace phpdotnet\phd;

class Package_MySQL_Options_HandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $handler = new Package_MySQL_Options_Handler();
        $factory = Format_Factory::createFactory('MySQL');

        $this->assertEquals($handler, $factory->getOptionsHandler());
    }

    public function testOptionList() {
        $handler = new Package_MySQL_Options_Handler();
        $this->assertContains('output:', $handler->optionList());
        $this->assertCount(1, $handler->optionList());
    }

    public function testMySQLOutput() {
        $file = 'testfile.xml';
        $handler = new Package_MySQL_Options_Handler();

        $this->assertNull(Config::mysql_output());
        $handler->option_output('', $file);

        $file2 = Config::mysql_output();
        $this->assertEquals($file, basename($file2));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testMySQLOutputError() {
        $handler = new Package_MySQL_Options_Handler();
        $handler->option_output('', array('testfile.xml', 'testfile2.xml'));
    }

}
