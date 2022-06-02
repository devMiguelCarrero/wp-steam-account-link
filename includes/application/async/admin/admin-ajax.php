<?php

	class WSL_Admin_ajax {

        public function init() {
            add_action( 'wp_ajax_WSL_custom_action' , [ $this , 'custom_action' ] );
        }

        public function custom_action() {
            echo json_encode([ esc_attr__('i\'m just a custom action that only works for admin users but can\'t do anyting by itself', WSL_DOMAIN)]);
            exit();
        }

        public static function instance() {

			$ajax = new WSL_Admin_ajax();
			$ajax->init();

		}

	}

	add_action( 'init' , [ 'WSL_Admin_ajax' , 'instance' ] );