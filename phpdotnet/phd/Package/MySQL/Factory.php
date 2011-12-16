<?php
/**
 * PhD MySQL Package
 *
 * PHP version 5.3+
 *
 * @category PhD
 * @package  PhD_MySQL
 * @author   Moacir de Oliveira <moacir@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php BSD Style
 * @version  SVN: $Id$
 * @link     https://doc.php.net/phd/
 */
namespace phpdotnet\phd;

/**
 * Factory to generate the formats of MySQL Package.
 *
 * @category PhD
 * @package  PhD_MySQL
 * @author   Moacir de Oliveira <moacir@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php BSD Style
 * @link     https://doc.php.net/phd/
 */
class Package_MySQL_Factory extends Format_Factory
{
    /**
     * List of available formats. 
     *
     * @var Array
     */
    private $formats = array(
        'docbook' => 'Package_MySQL_DocBook',
    );

    /**
     * Factory constructor.
     */
    public function __construct()
    {
        parent::setPackageName('MySQL');
        parent::registerOutputFormats($this->formats);
        parent::registerOptionsHandler(new Package_MySQL_Options_Handler());

        //Default output file name
        Config::init(array(
            'mysql_output'  => Config::output_dir() . '/docbook.xml',
        ));
    }
}
