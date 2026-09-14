<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => getenv('DB_HOST') ?: 'localhost',
	'username' => getenv('DB_USER') ?: 'root',
	'password' => getenv('DB_PASS') !== false ? getenv('DB_PASS') : '',
	'database' => getenv('DB_NAME') ?: 'polman_pelayanan',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE,
	'port'     => (int)(getenv('DB_PORT') ?: 3306)
);

/*
 * --------------------------------------------------------------------
 * Eloquent Setting
 * --------------------------------------------------------------------
 */
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $db['default']['hostname'],
    'port'      => $db['default']['port'],
    'database'  => $db['default']['database'],
    'username'  => $db['default']['username'],
    'password'  => $db['default']['password'],
    'charset'   => $db['default']['char_set'],
    'collation' => $db['default']['dbcollat'],
    'prefix'    => $db['default']['dbprefix'],
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

