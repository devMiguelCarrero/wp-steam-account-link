<?php

    class WSL_Post {

        function __construct() {
            global $post;
            $this->current_post = $post->ID;
        }

        public function get_posts_info() {
            return [
                'current_post' => $this->current_post
            ];
        }

        public static function instance() {
            return new WSL_Post;
        }

    }