<?php

class WSL_PluginLink
{

    function __construct()
    {
        $this->id = 'custom-plugin-link';
        $this->title = esc_attr__('Settings', 'easy-steam-account-link');
        $this->parent_slug = 'options-general.php';
    }

    public function add()
    {
        add_filter('plugin_action_links', [$this, 'add_plugin_link'], 10, 2);
    }

    public function add_plugin_link($plugin_actions, $plugin_file)
    {
        $new_actions = array();
        if (WSL_DOMAIN . '/' . WSL_DOMAIN . '.php' === $plugin_file) {
            $new_actions[$this->id] = sprintf(__('<a href="%s">Settings</a>', 'easy-steam-account-link'), esc_url(admin_url($this->parent_slug . '?page=' . $this->id)));
        }
        return array_merge($new_actions, $plugin_actions);
    }
}

class WSL_PluginLinkBuilder
{
    function __construct()
    {
        $this->plugin_link = new WSL_PluginLink;
    }

    public function setID($id)
    {
        $this->plugin_link->id = $id;
        return $this;
    }

    public function setTitle($title)
    {
        $this->plugin_link->title = $title;
        return $this;
    }

    public function setParentSlug($parent_slug)
    {
        $this->plugin_link->parent_slug = $parent_slug;
        return $this;
    }

    public function build()
    {
        return $this->plugin_link;
    }
}

require_once(WSL_ACHIEVEMENTS_PATH_PLUGINLINK . 'set_plugin_links.php');
