<?php

	class WSL_Taxonomy {

		function __construct() {

			$this->id = 'ezt-custom-taxonomy';
			$this->hierarchical = true;
			$this->public = true;
		    $this->labels = new WSL_Taxonomy_Labels();
		    $this->show_ui = true;
		    $this->show_admin_column = true;
		    $this->query_var = true;
		    $this->has_archive = true;
		    $this->show_in_nav_menus = true;
		    $this->rewrite = array('slug' => '/country_categories' , 'with_front' => true);

		}

		public function sanitize() {

			$this->labels->search_items = $this->labels->search_items != '' ? $this->labels->search_items : __('Search ' , WSL_DOMAIN ) . $this->labels->plural_name;
			$this->labels->all_items = $this->labels->all_items != '' ? $this->labels->all_items : __('All  ' , WSL_DOMAIN ) . $this->labels->plural_name;
			$this->labels->parent_item = $this->labels->parent_item != '' ? $this->labels->parent_item : __('Parent ' , WSL_DOMAIN ) . $this->labels->singular_name;
			$this->labels->parent_item_colon = $this->labels->parent_item_colon != '' ? $this->labels->parent_item_colon : __('Parent type' , WSL_DOMAIN );
			$this->labels->edit_item = $this->labels->edit_item != '' ? $this->labels->edit_item : __('Edit ' , WSL_DOMAIN ) . $this->labels->singular_name;
			$this->labels->update_item = $this->labels->update_item != '' ? $this->labels->update_item : __('Update ' , WSL_DOMAIN ) . $this->labels->singular_name;
			$this->labels->add_new_item = $this->labels->add_new_item != '' ? $this->labels->add_new_item : __('Add new ' , WSL_DOMAIN ) . $this->labels->singular_name;
			$this->labels->new_item_name = $this->labels->new_item_name != '' ? $this->labels->new_item_name : __('Name of the new ' , WSL_DOMAIN ) . $this->labels->singular_name;
			$this->labels->menu_name = $this->labels->menu_name != '' ? $this->labels->menu_name : $this->labels->plural_name;

			return $this;

		}

		public function toArray() {

			$taxToArray = (array)$this;
			$taxToArray['labels'] = (array)$taxToArray['labels'];
			return $taxToArray;
			
		}

		public function create() {

			$tax = $this->sanitize()->toArray();
			register_taxonomy( $this->id , $this->cpts , $tax );

		}

	}

	class WSL_Taxonomy_Builder {

		function __construct() {
			$this->taxonomy = new WSL_Taxonomy();
		}

		public function setId($id) {
			$this->taxonomy->id = $id;
			return $this;
		}

		public function setCPTs($cpts) {
			$this->taxonomy->cpts = $cpts;
			return $this;
		}

		public function setHierarchical($hierarchical) {
			$this->taxonomy->hierarchical = $hierarchical;
			return $this;
		}

		public function setLabels() {
			return new WSL_Taxonomy_Labels_Builder($this->taxonomy);
		}

		public function setShowUI($show_ui) {
			$this->taxonomy->show_ui = $show_ui;
			return $this;
		}

		public function setShowAdminColumn($show_admin_column) {
			$this->taxonomy->show_admin_column = $show_admin_column;
			return $this;
		}

		public function setQueryVar($query_var) {
			$this->taxonomy->query_var = $query_var;
			return $this;
		}

	}

	require_once( WSL_ACHIEVEMENTS_PATH_TAXONOMY . 'TaxonomyArgs.php' );
	require_once( WSL_ACHIEVEMENTS_PATH_TAXONOMY . 'create_tax.php' );