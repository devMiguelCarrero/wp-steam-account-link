<?php

	class WSL_Taxonomy_Labels {

		function __construct() {
			$this->name = __( 'ezt Custom Taxonomy', WSL_DOMAIN );
		    $this->singular_name = __( 'ezt Custom Taxonomy', WSL_DOMAIN );
		    $this->plural_name = __( 'ezt Custom Taxonomies' , WSL_DOMAIN );
		    $this->search_items = '';
		    $this->all_items = '';
		    $this->parent_item = '';
		    $this->parent_item_colon = '';
		    $this->edit_item = '';
		    $this->update_item = '';
		    $this->add_new_item = '';
		    $this->new_item_name = '';
		    $this->menu_name = '';
		}	

	}

	class WSL_Taxonomy_Labels_Builder extends WSL_Taxonomy_Builder {

		function __construct( $taxonomy ) {
			parent::__construct( $taxonomy );
			$this->taxonomy = $taxonomy;
		}

		public function setName($name) {
			$this->taxonomy->labels->name = $name;
			return $this;
		}

		public function setSingular($singular_name) {
			$this->taxonomy->labels->singular_name = $singular_name;
			return $this;
		}

		public function setPlural($plural_name) {
			$this->taxonomy->labels->plural_name = $plural_name;
			return $this;
		}

		public function setSearchItems($search_items) {
			$this->taxonomy->labels->search_items = $search_items;
			return $this;
		}

		public function setAllItems($all_items) {
			$this->taxonomy->labels->all_items = $all_items;
			return $this;
		}

		public function setParentItem($parent_item) {
			$this->taxonomy->labels->parent_item = $parent_item;
			return $this;
		}

		public function setParentItemColon($parent_item_colon) {
			$this->taxonomy->labels->parent_item_colon = $parent_item_colon;
			return $this;
		}

		public function setEditItem($edit_item) {
			$this->taxonomy->labels->edit_item = $edit_item;
			return $this;
		}

		public function setUpdateItem($update_item) {
			$this->taxonomy->labels->update_item = $update_item;
			return $this;
		}

		public function setAddNewItem($add_new_item) {
			$this->taxonomy->labels->add_new_item = $add_new_item;
			return $this;
		}

		public function newItemName($new_item_name) {
			$this->taxonomy->labels->new_item_name = $new_item_name;
			return $this;
		}

		public function setMenuName($menu_name) {
			$this->taxonomy->labels->menu_name = $menu_name;
			return $this;
		}

	}