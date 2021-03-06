<?php

class WSL_SteamOptions_Admin_Async
{
	public function init()
	{
		add_action('wp_ajax_WSL_get_steam_api_key', [$this, 'get_steam_api_key']);
		add_action('wp_ajax_WSL_save_steam_api_key', [$this, 'save_steam_api_key']);
	}

	public function get_steam_api_key()
	{
		echo json_encode((object)['api_key' => esc_html(WSL_Option_Model::instance()->getOption('wp-steam-api-key', ''))]);
		exit();
	}

	public function save_steam_api_key()
	{
		$apikey = WSL_Sanitize::instance()->sanitizeAlPhaNumeric($_POST['apikey']);
		if ($apikey) {
			update_option('wp-steam-api-key', $apikey, true);
			//WSL_Option_Model::instance()->updateOption('wp-steam-api-key', $apikey, true);
			echo json_encode(esc_html($apikey));
			exit();
		}
	}

	public static function instance()
	{
		return new WSL_SteamOptions_Admin_Async();
	}
}

WSL_SteamOptions_Admin_Async::instance()->init();
