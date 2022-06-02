<?php

	class WSL_ShortCode {
		
		function __construct() {
		}

		public function init() {
			add_shortcode( 'WSL_user_steam_vinculation' , [ $this , 'WSL_user_steam_vinculation' ] );
		}

		public function WSL_user_steam_vinculation( $atts = array(), $content = null ) {
			return WSL_View::render( 'shortcode/user_steam_vinculation' );
		}

		public static function instance() {
			return new WSL_ShortCode();
		}

	}

	WSL_ShortCode::instance()->init();