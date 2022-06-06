<?php

    class WSL_MenuPage {

        function __construct() {
            $this->id = 'custom-menu-page';
            $this->submenu = false;
            $this->parent_slug = 'options-general.php';
            $this->page_title = __( 'Custom Menu Page' , WSL_DOMAIN );
            $this->menu_title = __( 'Custom Menu Page' , WSL_DOMAIN );
            $this->capability = 'manage_options';
            $this->menu_slug = WSL_DOMAIN . '-custom-menu-page';
            $this->callback = 'single_react_view';
            $this->icon_url = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>');
            $this->position = 30;
        }

        public function add() {

            if($this->submenu) {
                add_submenu_page( 
                    $this->parent_slug, 
                    $this->page_title,
                    $this->menu_title,
                    $this->capability,
                    $this->menu_slug,
                    [ $this , $this->callback ],
                    $this->position
                );
            } else {
                add_menu_page( 
                    $this->page_title,
                    $this->menu_title,
                    $this->capability,
                    $this->menu_slug,
                    [ $this , $this->callback ],
                    $this->icon_url,
                    $this->position
                );
            }
        }

        public function single_react_view() {
            WSL_View::get( 'single-react' , [ 'id' => $this->id ] );
        }

    }

    class WSL_MenuPageBuilder {

        function __construct() {
            $this->menu_page = new WSL_MenuPage;
        }

        public function setID($id){
            $this->menu_page->id = $id;
            return $this;
        }

        public function setPageTitle($page_title){
            $this->menu_page->page_title = $page_title;
            return $this;
        }

        public function setMenuTitle($menu_title){
            $this->menu_page->menu_title = $menu_title;
            return $this;
        }

        public function setCapability($capability){
            $this->menu_page->capability = $capability;
            return $this;
        }

        public function setMenuSlug($menu_slug){
            $this->menu_page->menu_slug = $menu_slug;
            return $this;
        }

        public function setCallback($callback){
            $this->menu_page->callback = $callback;
            return $this;
        }

        public function setIconURL($icon_url){
            $this->menu_page->icon_url = $icon_url;
            return $this;
        }

        public function setPosition($position){
            $this->menu_page->position = $position;
            return $this;
        }

        public function setSubMenu($submenu){
            $this->menu_page->submenu = $submenu;
            return $this;
        }

        public function setParentSlug($parent_slug){
            $this->menu_page->parent_slug = $parent_slug;
            return $this;
        }

        public function build() {
            return $this->menu_page;
        }

    }

    require_once WSL_ACHIEVEMENTS_PATH_MENUPAGE . 'set_menu_pages.php';