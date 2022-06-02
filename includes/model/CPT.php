<?php

	class WSL_CPTHelper {

		function __construct() {

		}

		public function getAllCPTByIdNoFilter($id,$page) {
			
			$args = array(
		        'post_type' => $id,
		        'post_status' => 'publish',
		        'posts_per_page' => $page
			);
			return get_posts($args);

		}

		public function getAllCPTById($id,$page) {
			
			$args = array(
		        'post_type' => $id,
		        'post_status' => 'publish',
		        'posts_per_page' => $page
			);
			$cpt = get_posts($args);

			$cptArr = array();
			foreach ($cpt as $theCPT) {
				$cptArr[$theCPT->ID] = $theCPT->post_title;
			}

			return $cptArr;

		}

		public function getRelatedCPT( $cpt , $id ) {

			$args = array(
		        'post_type' => $cpt,
		        'post__not_in' => array($id),
		        'post_status' => 'publish',
		        'posts_per_page' => -1
			);
			return get_posts($args);

		}

		public function getCPTPostMeta( $id , $meta , $default ) {

			$meta = get_post_meta( $id , $meta , true );
			return $meta != null ? $meta : $default;

		}

		public function getCPTPostField( $id , $field ) {

			$field = get_post_field( $field , $id );
			return $field != null ? $field : '';

		}
 
		public static function instance() {
			return new WSL_CPTHelper;
		}

	}