<?php

    class WSL_SetMenuPages {

        public function init() {

            $page = new WSL_MenuPageBuilder();
            $page->setID('wp-steam-account-link-settings')
                 ->setSubMenu(true)
                 ->setParentSlug('options-general.php')
                 ->setPageTitle( esc_attr__( 'Steam Account' , WSL_DOMAIN ) )
                 ->setMenuTitle( esc_attr__( 'Steam Account' , WSL_DOMAIN ) )
                 ->setMenuSlug( WSL_DOMAIN . '-settings' )
                 ->setCallback( 'single_react_view' )
                 ->setPosition( 20 )
                 ->build()
                 ->add();
        }

    }

    add_action( 'admin_menu' , [ 'WSL_SetMenuPages' , 'init' ] );