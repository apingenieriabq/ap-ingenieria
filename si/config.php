<?php
define('PRUEBAS', 'SI');

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
if (!defined('URL_BASE')) {
  if(PRUEBAS == 'SI'){
    define('URL_BASE', 'https://159.203.126.221/ap/si/');
  }else{
    define('URL_BASE', 'https://si.apingenieria.net/');
  }
}
if (!defined('URL_SI')) {
  if(PRUEBAS == 'SI'){
    define('URL_SI', 'https://159.203.126.221/ap/si/');
  }else{
    define('URL_SI', 'https://si.apingenieria.net/');
  }
}


if (!defined('DIR_VISTAS')) {
    define('DIR_VISTAS', DIR_BASE.'modulos'.DS.'vistas'.DS);
}
if (!defined('DIR_CONTROLADORES')) {
    define('DIR_CONTROLADORES', DIR_BASE.'modulos'.DS.'controladores'.DS);
}
if (!defined('EXT_VISTA')) {
    define('EXT_VISTA', ".html.php");
}
if (!defined('EXT_CONTROLADOR')) {
    define('EXT_CONTROLADOR', ".control.php");
}
if (!defined('DIR_ARCHIVOS')) {
    define('DIR_ARCHIVOS', DIR_BASE.'archivo/');
}
if (!defined('URL_ARCHIVOS')) {
    define('URL_ARCHIVOS', URL_BASE.'archivo/');
}




if (!defined('DIR_PLANTILLAS')) {
    define('DIR_PLANTILLAS', DIR_BASE.'plantilla'.DS);
}
if (!defined('PLANTILLA_ACTIVA')) {
    define('PLANTILLA_ACTIVA', 'basica'.DS);
}
require_once 'vendor'.DS.'autoload.php';
// require_once 'clases/Autoload.php';
spl_autoload_register(function ($nombre_clase) {
    $archivo = 'clases'.DS.'sistema'.DS. $nombre_clase . '.php';
    if(is_file($archivo)){
        require_once $archivo;
    }else{
        $archivo = 'clases'.DS.'util'.DS. $nombre_clase . '.php';
        if(is_file($archivo)){
            require_once $archivo;
        }else{
            $archivo = 'clases'.DS.'conexiones'.DS. $nombre_clase . '.php';
            if(is_file($archivo)){
                require_once $archivo;
            }
        }
    }
});
//Main::start();

if (!defined('DIR_API')) {
    define('DIR_API', '../api/'.__DIR__.DS);
}
if (!defined('URL_API')) {
  if(PRUEBAS == 'SI'){
    define('URL_API', 'https://159.203.126.221/ap/api/');
  }else{
    define('URL_API', 'https://api.apingenieria.net/');
  }
}


$Api = new APISAPI();

$twig = Main::twigConfigPlantilla(DIR_PLANTILLAS);
