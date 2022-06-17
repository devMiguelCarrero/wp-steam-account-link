<?php

class WSL_Sanitize
{
	public function sanitizeAlPhaNumeric($string)
	{
		$sanitized_string = '';
		if (is_scalar($string)) {
			$sanitized_string = $string;
			$sanitized_string = preg_replace("/[^a-zA-Z0-9]+/", "", $sanitized_string);
		}
		return apply_filters([$this, 'sanitizeAPIKey'], $sanitized_string, $string);
	}

	public function sanitizeUserInfo($array) {
		return $array;
	}

	public static function instance()
	{
		return new WSL_Sanitize;
	}
}
