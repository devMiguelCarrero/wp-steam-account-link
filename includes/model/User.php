<?php

class WSL_User_Model
{

	function __construct()
	{
	}

	public function findUsersByString($string)
	{
		$users = new WP_User_Query(array(
			'search'         => '*' . esc_attr($string) . '*',
			'search_columns' => array(
				'user_login',
				'user_nicename',
				'display_name',
				'user_email',
				'user_url',
			),
		));
		return $users->get_results();
	}

	public function getUserMeta($user, $meta, $default)
	{
		$result = get_user_meta($user, $meta, true);
		return $result != null ? $result : $default;
	}

	public static function instance()
	{
		return new WSL_User_Model();
	}
}
