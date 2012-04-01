<?php

require 'phpdotnet/phd/Autoloader.php';
require 'phpdotnet/phd/functions.php';

use phpdotnet\phd\Config;

restore_error_handler();
spl_autoload_register(array('phpdotnet\\phd\\Autoloader', 'autoload'));

global $olderrrep; //phpunit will not load this var from functions.php
Config::init(array());

$packages = Config::package_dirs();
$packages[] = __DIR__;              //adding test package 
$packages[] = __DIR__ . '/..';      //adding package PhD_MySQL

Config::set_package_dirs($packages);
