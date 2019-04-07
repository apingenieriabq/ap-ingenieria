<?php

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('max_input_time', 3000);
ini_set('max_execution_time', 3000);
ini_set('memory_limit', '640M');
ini_set('post_max_size', '258M');
date_default_timezone_set('America/Bogota');
set_time_limit(3000);
if (!defined('WS')) {
    define('WS', '/');
}
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('DIR_BASE')) {
    define('DIR_BASE', __DIR__.DS);
}
if (!defined('DIR_PLANTILLAS')) {
    define('DIR_PLANTILLAS', DIR_BASE.'plantilla'.DS);
}
if (!defined('PLANTILLA_ACTIVA')) {
    define('PLANTILLA_ACTIVA', 'basica'.DS);
}
require_once 'vendor'.DS.'autoload.php';
// require_once 'clases/Autoload.php';
require_once 'clases'.DS.'sistema'.DS.'Main.php';
//Main::start();
$twig = Main::twigConfigPlantilla(DIR_PLANTILLAS);
//Autoload::start();
