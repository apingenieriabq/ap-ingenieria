<?php

require '../config.php';

require DIR_API.'vendor/autoload.php';

require DIR_API.'libs/autoload.php';
require DIR_API.'libs/Motor.php';

define('HOST_MYSQL', '192.185.163.35');
define('BD_NAME_MYSQL', 'apingeni_flat');
define('BD_USER_MYSQL', 'apingeni_flatadm');
define('BD_PASSWORD_MYSQL', 'UcG9AKYPcMjwFm9');

define('HOST_LOG_MYSQL', '192.185.163.35');
define('BD_LOG_NAME_MYSQL', 'apingeni_logs');
define('BD_USER_LOG_MYSQL', 'apingeni_logs');
define('BD_PASSWORD_LOG_MYSQL', 'bs76hy2K3WgNgRu');

// define('HOST_MYSQL', '159.203.126.221');
// define('BD_NAME_MYSQL', 'apingeni_flat');
// define('BD_USER_MYSQL', 'root');
// define('BD_PASSWORD_MYSQL', 'Web2019*');

// define('HOST_LOG_MYSQL', '159.203.126.221');
// define('BD_LOG_NAME_MYSQL', 'apingeni_logs');
// define('BD_USER_LOG_MYSQL', 'root');
// define('BD_PASSWORD_LOG_MYSQL', 'Web2019*');


use Medoo\Medoo;

$BD_AP_PRINCIPAL = new Medoo([
    // required
    'database_type' => 'mysql',
    'database_name' => BD_NAME_MYSQL,
    'server' => HOST_MYSQL,
    'username' => BD_USER_MYSQL,
    'password' => BD_PASSWORD_MYSQL,

    // [optional]
    'charset' => 'utf8',
    'collation' => 'utf8_spanish2_ci',
    'port' => 3306,

    // [optional] Table prefix
    //prefix' => 'PREFIX_',

    // [optional] Enable logging (Logging is disabled by default for better performance)
    'logging' => true,

    // [optional] MySQL socket (shouldn't be used with server and port)
    //'socket' => '/tmp/mysql.sock',

    // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
    ],

    // [optional] Medoo will execute those commands after connected to the database for initialization
    'command' => [
        'SET SQL_MODE=ANSI_QUOTES',
    ],
]);

$BD_AP_LOGS = new Medoo([
    // required
    'database_type' => 'mysql',
    'database_name' => BD_LOG_NAME_MYSQL,
    'server' => HOST_LOG_MYSQL,
    'username' => BD_USER_LOG_MYSQL,
    'password' => BD_PASSWORD_LOG_MYSQL,

    // [optional]
    'charset' => 'utf8',
    'collation' => 'utf8_spanish2_ci',
    'port' => 3306,

    // [optional] Table prefix
    //prefix' => 'PREFIX_',

    // [optional] Enable logging (Logging is disabled by default for better performance)
    'logging' => true,

    // [optional] MySQL socket (shouldn't be used with server and port)
    //'socket' => '/tmp/mysql.sock',

    // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
    ],

    // [optional] Medoo will execute those commands after connected to the database for initialization
    'command' => [
        'SET SQL_MODE=ANSI_QUOTES',
    ],
]);
