<?php

class WSL_OptionHelper
{

	function __construct()
	{
	}

	public function getOption($key)
	{

		return get_option($key, 0);
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
		return new WSL_OptionHelper();
	}
}
