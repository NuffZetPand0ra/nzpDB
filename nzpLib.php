<?php
class nzpLib{
	protected $config;

	public static function createSettings(){
		$args = func_get_args();
		if(count($args)>0){
			$settings = array();
			foreach($args as $arg){
				if(is_array($arg) || is_object($arg)){
					$settings = array_merge($settings, (array)$arg);
				}
			}
			return (object)$settings;
		}else{
			throw new Exception("You need to supply settings");
		}
	}
	public static function getConfig($class){
		$config_file = 'config/'.$class.'.ini';
		echo "<pre>";var_dump($config_file);echo "</pre>";
		if(file_exists($config_file)){
			return parse_ini_file($config_file, true);
		}else{
			return false;
		}
	}
}