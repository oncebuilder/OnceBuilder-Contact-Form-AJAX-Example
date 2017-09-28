<?php
/*
 * Version: 1.0, 31.05.2012
 * by Adam Wysocki, goldpaid777@gmail.com
 *
 * Copyright (c) 2012 Adam Wysocki
 *
 *	This is simply JS -> PHP connector
 *
*/

// Report simple running errors except notices
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Set headers if u need more functionality CORS
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
//header('Access-Control-Max-Age: 604800');
header('Access-Control-Allow-Headers: x-requested-with');

// Some xampp fixing :/
$_GET['o'] = isset($_GET['o']) ? $_GET['o'] : '';
$_GET['c'] = isset($_GET['c']) ? $_GET['c'] : '';

// Is it required??
if(!preg_match("/^[a-zA-Z0-9_.]+$/i",$_GET['c'])) exit;

// Secure var
$home=true;

// Lets start session handling
session_start();

// Configuration varibles & langs
require_once('../oconfig.php');

// Require core class functions
require_once('class/core.class.php');

// Require connector class but not core again...
if($_GET['c']!='core') require_once('class/'.$_GET['c'].'.class.php');

// Require connector ajax and let it works with connector class
require_once('ajax/'.$_GET['c'].'.php');

/*
	1. Switcher which define incall function by parametr o
	Example:
		once.php?c=once.explorer&o=get_project&id=1
		
	once.php?
		c => connector file class
		o => connector ajax command
		id => other parms can be send same way $_GET or $_POST

	2. Setting data is defined in core.class
	Example:
		$once->set_data(array(
			"project_name" => $once->filter_string($_GET['name'])
		));

	3. After initializing, we can call functions
	Example:
		$once->new_project();
	
	Varibles: data['project_id'], data['project_name'] data['project_path'] are defined in core constructor
*/
?>