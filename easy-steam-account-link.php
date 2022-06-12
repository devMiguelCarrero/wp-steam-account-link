<?php
/*
Plugin Name: Easy Steam Account Link
Plugin URI: https://github.com/devMiguelCarrero/easy-steam-account-link/
Description: Wordpress plugin made to vinculate your subscribbed users with steam. Getting information like name, NickName and games users own
Version: 0.1.1
Author: devMiguelCarrero
Author URI: https://github.com/devMiguelCarrero/
License: GPLv2
Requires at least: 4.0
Text Domain: easy-steam-account-link
Domain Path: /easy-steam-account-link/
*/

/* Copyright 2021
This program is free licensed software; 

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

//error_reporting(E_ALL);
//ini_set("display_errors", 1); 

if (!function_exists('add_action')) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define('WSL_DOMAIN', 'easy-steam-account-link');
define('WSL_VERSION', '0.1.1');
define('WSL_SITE_URL', get_site_url() . '/');
define('WSL_ACHIEVEMENTS_PATH', plugin_dir_path(__FILE__));
define('WSL_PLUGIN_URL', plugin_dir_url(__FILE__));
define('WSL_ACHIEVEMENTS_PATH_INCLUDES', WSL_ACHIEVEMENTS_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_CONFIG', WSL_ACHIEVEMENTS_PATH_INCLUDES . 'config' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_APPLICATION', WSL_ACHIEVEMENTS_PATH_INCLUDES . 'application' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_ENQUEUE', WSL_ACHIEVEMENTS_PATH_APPLICATION . 'enqueue' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_SHORTCODE', WSL_ACHIEVEMENTS_PATH_APPLICATION . 'shortcode' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_VIEW', WSL_ACHIEVEMENTS_PATH_APPLICATION . 'view' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_ASYNC', WSL_ACHIEVEMENTS_PATH_APPLICATION . 'async' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_MODEL', WSL_ACHIEVEMENTS_PATH_INCLUDES . 'model' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_HELPERS', WSL_ACHIEVEMENTS_PATH_INCLUDES . 'helpers' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_MENUPAGE', WSL_ACHIEVEMENTS_PATH_APPLICATION . 'menu_page' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_PLUGINLINK', WSL_ACHIEVEMENTS_PATH_APPLICATION . 'plugin_link' . DIRECTORY_SEPARATOR);
define('WSL_ACHIEVEMENTS_PATH_STEAM_AUTH', WSL_ACHIEVEMENTS_PATH_APPLICATION . 'steam_auth' . DIRECTORY_SEPARATOR);
define('WSL_BUILD_PATH', WSL_ACHIEVEMENTS_PATH . DIRECTORY_SEPARATOR . 'build' . DIRECTORY_SEPARATOR);

require_once WSL_ACHIEVEMENTS_PATH_INCLUDES . 'easy-steam-account-link-install.php';
