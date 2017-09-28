<?php
/*
 * Version: 1.0, 31.05.2012
 * by Adam Wysocki, goldpaid777@gmail.com
 *
 * Copyright (c) 2012 Adam Wysocki
 *
 *	This is core connector class
 *
*/

set_time_limit(60);

// This is OnceBuilder core it should be loaded before HTML output
class core{
	public $config;
	public $data;
	public $once;
	public $pdo;
	public $settings;
	public $error;
	public $errors;

	// Initialize varibles and files that cant be oversaved
	function __construct($_CONFIG){
		// Global roots data
		$this->data = $_CONFIG;
		
		$this->data['root_path']=str_replace('\once\class', '', __DIR__);
		$this->data['root_path']=str_replace('/once/class', '', __DIR__);
		$this->data['root_path']=str_replace('\\', '/', $this->data['root_path']);
		$this->data['root_path']=$this->data['root_path']==''?'..':$this->data['root_path'];
		$this->data['root_path']='..';
	}

	// Set error
	function setError($obj){
		$this->error++;
		$this->errors[]=$obj;
	}
	// Response
	function onceResponse(){
		$obj=array();
		if(isset($this->item)) $obj['item']=$this->item;
		if(isset($this->items)) $obj['items']=$this->items;
		if(isset($this->error)) $obj['error']=$this->error;
		if(isset($this->errors)) $obj['errors']=$this->errors;
		
		// Return depends on type
		if($this->data['ajax']){
			// Print JSON object
			echo json_encode($obj);
		}else{
			// Return Array object
			return $obj;
		}
	}
	
	
	
	// FUNCTIONS BELOVE CAN BE DEPRECATED  in future
	

	// Set & get data
	function set_data($t){
		/*
			Set data with array into function args
			Example:
			$this->set_data(array(
				"project_name" => $this->filter_string($_GET['name'])
			));
		*/

		foreach($t as $key => $value){
			$this->data[$key]=$value;
		}
	}
	function get_data($t){
		return $this->data[$t];
	}
	
	# SOME FUNCTIONS -------------------
	function filter_string($pole,$un=false){
		$pole=trim($pole); // uwam zbędne spacje
		if (get_magic_quotes_gpc())
		//$nazwa = htmlspecialchars($nazwa, ENT_QUOTES);
		$pole = stripslashes($pole); // usuwam ukośniki'
		if($un==false){
			$pole = str_replace(
				array("&"    , '"'     , "<"   , ">"   , "\0", "\\"  , "'"),   // z
				array("&amp;", "&quot;", "&lt;", "&gt;", ""  , "\\\\", "\'" ), // na
				$pole
			);
		}else{
			$pole = str_replace(
				array("&amp;", "&quot;", "&lt;", "&gt;", ""  , "\\\\", "\'" ),   // z
				array("&"    , '"'     , "<"   , ">"   , "\0", "\\"  , "'"), // na
				$pole
			);
		}
		return $pole;
	}
	
	// Creating csrf_token
	function once_csrf_token(){
		// Generate token && return
		$_SESSION['csrf_token'] = md5($this->data['api_key'].''.$this->data['time']);

		return $_SESSION['csrf_token'];
	}
	// Checking csrf_token
	function once_csrf_token_check($token){
		if($token==$_SESSION['csrf_token']){
			return true;
		}else{
			return true;
		}
	}
}
?>
