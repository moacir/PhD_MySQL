<?php
/**
 * PhD MySQL Package
 *
 * PHP version 5.3+
 *
 * @category PhD
 * @package  PhD_MySQL
 * @author   Moacir de Oliveira <moacir@php.net>
 * @author   Philip Olson <philip@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php BSD Style
 * @version  SVN: $Id$
 * @link     https://doc.php.net/phd/
 */
namespace phpdotnet\phd;

/**
 * MySQL Package options handler.
 *
 * Options Available:
 *      --mysql-output <output.xml> Output file name
 *
 * @category PhD
 * @package  PhD_MySQL
 * @author   Moacir de Oliveira <moacir@php.net>
 * @author   Philip Olson <philip@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php BSD Style
 * @link     https://doc.php.net/phd/
 */
class Package_MySQL_Options_Handler implements Options_Interface
{
    /**
     * Defines the options available in the package.
     * Current options:
     *      --mysql-output <output.xml>: Output file name
     */
    public function optionList()
    {
        return array(
            'output:', // Name of the output file
        );
    }

    /**
     * Handles the --mysql-output option.
     *
     * @param $k String Option name
     * @param $v String Option value
     */
    public function option_output($k, $v)
    {
        if (is_array($v)) {
            trigger_error("Can only render one output file at a time", E_USER_ERROR);
        }

        Config::set_mysql_output(Config::output_dir() . DIRECTORY_SEPARATOR  . $v);
    }
}
