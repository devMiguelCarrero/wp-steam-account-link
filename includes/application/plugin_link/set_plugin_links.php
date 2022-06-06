<?php

    class WSL_setPluginLinks {

        public function init() {

            $page = new WSL_PluginLinkBuilder();
            $page->setID('wp-steam-account-link-settings')
                 ->setParentSlug('options-general.php')
                 ->build()
                 ->add();
        }

        public static function instance() {
            return new WSL_setPluginLinks;
        }

    }

    WSL_setPluginLinks::instance()->init();