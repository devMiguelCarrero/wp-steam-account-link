<?php

    class WSL_SetMenuPages {

        public function init() {

            $page = new WSL_MenuPageBuilder();
            $page->setID('fix-games')
                 ->setPageTitle( esc_attr__( 'Fix Team Games' , WSL_DOMAIN ) )
                 ->setMenuTitle( esc_attr__( 'Fix Team Games' , WSL_DOMAIN ) )
                 ->setMenuSlug( WSL_DOMAIN . '-fix-team-games' )
                 ->setCallback( 'single_react_view' )
                 ->setIconURL( 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" width="32" height="32" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" preserveAspectRatio="none" viewbox="0 0 32 32"><path class="st0" d="M16,10c0-2.209,1.791-4,4-4s4,1.791,4,4s-1.791,4-4,4S16,12.209,16,10z M22,14l-2,2l-2-2c-4,0-4,7-4,7h12  C26,15,22,14,22,14z M12,12c2.209,0,4-1.791,4-4s-1.791-4-4-4S8,5.791,8,8S9.791,12,12,12z M16.17,13.43C15.12,12.28,14,12,14,12  l-2,2l-2-2c-4,0-4,7-4,7h7.14C13.46,16.82,14.32,14.4,16.17,13.43z M16,28l5-6H11L16,28z" style="fill-rule:evenodd;clip-rule:evenodd;;"></path></svg>') )
                 ->setPosition( 20 )
                 ->build()
                 ->add();
                
                
            $page = new WSL_MenuPageBuilder();
            $page->setID('end-tournaments')
                ->setPageTitle( esc_attr__( 'End active tournaments' , WSL_DOMAIN ) )
                ->setMenuTitle( esc_attr__( 'End active tournaments' , WSL_DOMAIN ) )
                ->setMenuSlug( WSL_DOMAIN . '-end-active-tournaments' )
                ->setCallback( 'single_react_view' )
                ->setIconURL( 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" width="32" height="32" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" preserveAspectRatio="none" viewbox="0 0 32 32"><path fill="red" d="M27.041,3H12.958L3,12.958v14.084L12.958,37h14.083L37,27.042V12.958L27.041,3z M10.063,15C8.906,15,9,16.09,9,16.774    c0,0.777,0.385,1.419,1.672,1.772C12.763,19.12,13,21.102,13,22.469C13,24.615,12,26,9.969,26C7,26,7,23,7,23h2c0,0,0,1,0.969,1    C11,24,11,22.561,11,22.058c0-0.97-0.401-1.277-1.504-1.738C7.75,19.589,7,18.395,7,16.567C7,14.375,8,13,10,13c3,0,3,3,3,3h-2    C11,16,11.063,15,10.063,15z M19,15h-2v11h-2V15h-2v-2h6V15z M27,22.5c0,1.933-1.566,3.5-3.5,3.5S20,24.433,20,22.5v-6    c0-1.933,1.566-3.5,3.5-3.5s3.5,1.567,3.5,3.5V22.5z M31,21c-1,0-1,0-1,0v5h-2V13c0,0,1,0,3,0s3,1.38,3,4S33,21,31,21z M23.5,15    c-0.828,0-1.5,0.672-1.5,1.5v6c0,0.828,0.672,1.5,1.5,1.5s1.5-0.672,1.5-1.5v-6C25,15.672,24.328,15,23.5,15z M31,15c-1,0-1,0-1,0    v4c0,0,0,0,1,0s1-2,1-2S32,15,31,15z"></path></svg>') )
                ->setPosition( 20 )
                ->build()
                ->add();
        }

    }

    add_action( 'admin_menu' , [ 'WSL_SetMenuPages' , 'init' ] );