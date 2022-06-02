<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Easy Esports Manager Extender
 * @author  slidmike
 * @package eSports
 */

require_once( WSL_ACHIEVEMENTS_PATH_CONFIG . 'Config.php' );
require_once( WSL_ACHIEVEMENTS_PATH_MODEL . 'Model.php' );
require_once( WSL_ACHIEVEMENTS_PATH_HELPERS . 'Helpers.php' );
require_once( WSL_ACHIEVEMENTS_PATH_CPT . 'CPT.php' );
require_once( WSL_ACHIEVEMENTS_PATH_METABOXES . 'Metabox.php' );
require_once( WSL_ACHIEVEMENTS_PATH_TAXONOMY . 'Taxonomy.php' );
require_once( WSL_ACHIEVEMENTS_PATH_ENQUEUE . 'Enqueue.php' );
require_once( WSL_ACHIEVEMENTS_PATH_SHORTCODE . 'ShortCode.php' );
require_once( WSL_ACHIEVEMENTS_PATH_MENUPAGE . 'MenuPage.php' );
require_once( WSL_ACHIEVEMENTS_PATH_VIEW . 'View.php' );
require_once( WSL_ACHIEVEMENTS_PATH_ASYNC . 'Async.php' );
