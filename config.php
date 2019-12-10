<?php
// if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
//     $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//     header('HTTP/1.1 301 Moved Permanently');
//     header('Location: ' . $redirect);
//     exit();
// }

define('PRUEBAS', 'SI');

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('max_input_time', 30000);
ini_set('max_execution_time', 30000);
ini_set('memory_limit', '64M');
ini_set('post_max_size', '8M');
date_default_timezone_set('America/Bogota');
set_time_limit(3000);

if (!defined('CLAVE_SECRETA')) {
    define('CLAVE_SECRETA', '4p1ng3n13r14');
}
if (!defined('SESION')) {
    define('SESION', 'USUARIO');
}
if (!defined('SESION_ESTADO')) {
    define('SESION_ESTADO', 'SESION_ESTADO');
}
if (!defined('WS')) {
    define('WS', '/');
}
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('DIR_BASE')) {
    define('DIR_BASE', __DIR__ . DS);
}
if (!defined('URL_BASE')) {
  if(PRUEBAS == 'SI'){
    define('URL_BASE', 'https://159.203.126.221/ap/');
  }else{
    define('URL_BASE', 'https://apingenieria.net/');
  }
}
if (!defined('DIR_SI')) {
    define('DIR_SI', DIR_BASE.'si/');
}
if (!defined('URL_SI')) {
  if(PRUEBAS == 'SI'){
    define('URL_SI', 'https://159.203.126.221/ap/si/');
  }else{
    define('URL_SI', 'https://si.apingenieria.net/');
  }
}

if (!defined('DIR_API')) {
    define('DIR_API', DIR_BASE.'api/');
}
if (!defined('URL_API')) {
  if(PRUEBAS == 'SI'){
    define('URL_API', 'https://159.203.126.221/ap/api/');
  }else{
    define('URL_API', 'https://api.apingenieria.net/');
  }
}

if (!defined('DIR_CONTROLADORES')) {
    define('DIR_CONTROLADORES', DIR_API.'controladores'.DS);
}
if (!defined('DIR_LIBRERIA')) {
    define('DIR_LIBRERIA', DIR_API.'libs'.DS);
}
if (!defined('DIR_TMPLCORREOS')) {
    define('DIR_TMPLCORREOS', DIR_API . 'correos' . DS);
}
if (!defined('DIR_COMPONENTES')) {
    define('DIR_COMPONENTES', DIR_API.'modulos/');
}
if (!defined('DIR_ARCHIVOS')) {
    define('DIR_ARCHIVOS', DIR_BASE.'archivo/');
}
if (!defined('URL_ARCHIVOS')) {
  if(PRUEBAS == 'SI'){
    define('URL_ARCHIVOS', 'http://159.203.126.221/ap/archivo/');
  }else{
    define('URL_ARCHIVOS', 'https://archivo.apingenieria.net/');
  }
}
if (!defined('DIR_PLANTILLAS')) {
    define('DIR_PLANTILLAS', DIR_API . 'uix' . DS);
}
if (!defined('PLANTILLA_ACTIVA')) {
    define('PLANTILLA_ACTIVA', 'basica'.DS);
}

if (!defined('EXT_CONTROLADOR')) {
    define('EXT_CONTROLADOR', ".control.php");
}
if (!defined('EXT_VISTA')) {
    define('EXT_VISTA', ".html.php");
}

if (!defined('DIR_APPS')) {
    define('DIR_APPS', DIR_BASE.'apps/');
}


















