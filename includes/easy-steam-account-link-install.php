<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Easy Esports Manager Extender
 * @author  slidmike
 * @package eSports
 */

require_once(WSL_ACHIEVEMENTS_PATH_CONFIG . 'Config.php');
require_once(WSL_ACHIEVEMENTS_PATH_MODEL . 'Model.php');
require_once(WSL_ACHIEVEMENTS_PATH_HELPERS . 'Helpers.php');
require_once(WSL_ACHIEVEMENTS_PATH_ENQUEUE . 'Enqueue.php');
require_once(WSL_ACHIEVEMENTS_PATH_SHORTCODE . 'ShortCode.php');
require_once(WSL_ACHIEVEMENTS_PATH_MENUPAGE . 'MenuPage.php');
require_once(WSL_ACHIEVEMENTS_PATH_PLUGINLINK . 'PluginLink.php');
require_once(WSL_ACHIEVEMENTS_PATH_VIEW . 'View.php');
require_once(WSL_ACHIEVEMENTS_PATH_ASYNC . 'Async.php');
require_once(WSL_ACHIEVEMENTS_PATH_STEAM_AUTH . 'SteamAuth.class.php');

function link_steam_account()
{
	if (isset($_GET['openid_ns']) && isset($_GET['openid_op_endpoint'])) {
		if ($_GET['openid_op_endpoint'] == 'https://steamcommunity.com/openid/login') {
			$auth = new SteamAuth();

			// You can use this to do other checks on the person, such as making an account in a database
			$auth->SetOnLoginCallback(function ($steamid) {
				return true; // returning true will log them in, false will stop the login (you should put an error message in that case)
			});

			// This handler is for when a login fails Ex: canceled, auth failed, exploit attempt, etc
			$auth->SetOnLoginFailedCallback(function () {
				return true;
			});

			// You can use this to do other checks on the person, such as making an modifying a database
			$auth->SetOnLogoutCallback(function ($steamid) {
				return true;
			});

			// Always call Init() on pages you want to check a login from.  Call this AFTER you set handlers!
			$auth->Init();
		}
	}
}

add_action('init', 'link_steam_account');
