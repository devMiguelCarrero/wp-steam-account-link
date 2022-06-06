<?php

class WSL_Option_Model
{

	function __construct()
	{
	}

	public function getOption($key, $default)
	{
		return get_option($key, $default);
	}

	public function updateOption($key, $value, $autoload)
	{
		if ($value != 0) {
			update_option($key, $value, $autoload);
		} else {
			delete_option($key);
		}
	}

	public static function instance()
	{
		return new WSL_Option_Model();
	}
}
