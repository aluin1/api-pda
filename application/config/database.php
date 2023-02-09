<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'production';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => getenv('DB_HOST'),
	'username' => getenv('DB_USERNAME'),
	'password' => getenv('DB_PASSWORD'),
	'database' => getenv('DB_DATABASE'),
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

// DB_HOST=localhost
// DB_DATABASE=STA_attendance
// DB_USERNAME=sa
// DB_PASSWORD=Budi01man
// PORT=
// BASE_URL=http://localhost/attendance_backend/Restserver

$db['sqlserver'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'sa',
	'password' => 'Budi01man',
	'database' => 'STA_attendance',

	'dbdriver' => 'sqlsrv',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);



$db['production'] = array(
	'dsn'	=> '',
	'hostname' => '10.3.30.59',
	'port' => 1433,
	'username' => 'sqldevadmin',
	'password' => 'pepcdevadmin',
	'database' => 'DB_DigitalAttendanceSystem',
	'dbdriver' => 'sqlsrv',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
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
	'autoinit' => TRUE,
);

//$db['production'] = array(
//	'dsn'	=> '',
//	'hostname' => '10.13.1.56',
//	'port' => 1433,
//	'username' => 'das_user',
//	'password' => '##asdoIJODNSj23!!@kks',
//	'database' => 'DigitalAttendanceSystem',
//	'dbdriver' => 'sqlsrv',
//	'dbprefix' => '',
//	'pconnect' => FALSE,
//	'db_debug' => FALSE,
//	'cache_on' => FALSE,
//	'cachedir' => '',
//	'char_set' => 'utf8',
//	'dbcollat' => 'utf8_general_ci',
//	'swap_pre' => '',
//	'encrypt' => FALSE,
//	'compress' => FALSE,
//	'stricton' => FALSE,
//	'failover' => array(),
//	'save_queries' => TRUE,
//	'autoinit' => TRUE,
//);


