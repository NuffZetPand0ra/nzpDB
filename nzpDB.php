<?php
class nzpDB{
	protected $con;
	private $config;

	function __construct($settings = array()){
		$this->config = nzpLib::getConfig("nzpDB");
		$defaults = array(
			"host"=>"localhost",
			"user"=>"root",
			"password"=>"",
			"database"=>""
		);
		$settings = nzpLib::createSettings($defaults, $settings);
		if(is_null($this->con) && $this->con = mysql_connect($settings->host, $settings->user, $settings->password, true)){
			if(!$this->setDatabase($settings->database)){
				throw new Exception("Couldn't establish database connection.");
			}
			return true;
		}
		return false;
	}
	function setDatabase($database){
		return mysql_select_db($database, $this->con);
	}
	function query($query){
		return mysql_query($query, $this->con);
	}
}
