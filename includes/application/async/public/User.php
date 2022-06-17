<?php

class WSL_User_Async
{

	public function init()
	{
		add_action('wp_ajax_WSL_get_user_steam_id', [$this, 'get_user_steam_id']);
		add_action('wp_ajax_nopriv_WSL_get_user_steam_id', [$this, 'get_user_steam_id']);
		add_action('wp_ajax_WSL_update_user_info', [$this, 'update_user_info']);
		add_action('wp_ajax_nopriv_WSL_update_user_info', [$this, 'update_user_info']);
		add_action('wp_ajax_WSL_disconnect_user_steam_account', [$this, 'disconnect_user_steam_account']);
		add_action('wp_ajax_nopriv_WSL_disconnect_user_steam_account', [$this, 'disconnect_user_steam_account']);
	}

	public function get_user_steam_id()
	{
		echo json_encode(WSL_User_Helper::instance()->checkUserSteamInfo(esc_attr($_POST['return_url'])));
		exit();
	}

	public function update_user_info()
	{
		$userInfo = htmlspecialchars_decode(stripslashes(sanitize_text_field($_POST['user-info'])));
		$userID = intval($_POST['user-id']);

		if ($userInfo && $userID) {
			//$userInfo = htmlspecialchars_decode(stripslashes($userInfo));
			WSL_User_Model::instance()->updateUserMeta($userID, 'wp-steam-account-summary', json_decode($userInfo));
			echo esc_html('updated');
		}

		exit();
	}

	public function disconnect_user_steam_account()
	{
		WSL_User_Model::instance()->deleteCurrentUserMeta('wp-steam-account-linked');
		echo esc_html__('disconnected', 'easy-steam-account-link');
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
