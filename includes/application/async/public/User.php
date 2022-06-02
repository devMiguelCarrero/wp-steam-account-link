<?php

class WSL_User_Async
{

	public function init()
	{
		add_action('wp_ajax_WSL_get_user_steam_id', [$this, 'get_user_steam_id']);
		add_action('wp_ajax_nopriv_WSL_get_user_steam_id', [$this, 'get_user_steam_id']);
	}

	public function get_user_steam_id()
	{
		echo json_encode(WSL_User_Helper::instance()->checkUserSteamInfo());
		exit();
	}

	public function get_user_steam_info()
	{
		exit();
	}

	public static function instance()
	{
		return new WSL_User_Async();
	}
}

WSL_User_Async::instance()->init();
