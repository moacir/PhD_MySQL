<?php

namespace phpdotnet\phd;

class Package_MySQL_FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $this->assertNull(Config::mysql_output());

        $factory = new Package_MySQL_Factory();
        $this->assertEquals('MySQL', $factory->getPackageName());
        $this->assertContains('docbook', $factory->getOutputFormats());

        $handlerClass = 'phpdotnet\\phd\\Package_MySQL_Options_Handler';
        $this->assertInstanceOf($handlerClass, $factory->getOptionsHandler());

        $this->assertNotNull(Config::mysql_output());
    }

    public function testCreateFactory() {
        $factory = Format_Factory::createFactory('MySQL');

        $factoryClass = 'phpdotnet\\phd\\Package_MySQL_Factory';
        $this->assertInstanceOf($factoryClass, $factory);
    
        $factory2 = new Package_MySQL_Factory();
        $this->assertEquals($factory, $factory2);
    }

    public function testCreateFormat() {
        $factory = new Package_MySQL_Factory();
        $format = $factory->createFormat('docbook');

        $formatClass = 'phpdotnet\\phd\\Package_MySQL_DocBook';
        $this->assertInstanceOf($formatClass, $format);
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testCreateWrongFormat() {
        $factory = new Package_MySQL_Factory();
        $format = $factory->createFormat('pdf');
    }

}
