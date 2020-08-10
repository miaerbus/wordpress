<?php
/**
 * @package MyPlugin
 */

namespace Includes\Pages;

class Admin
{
    public function register()
    {
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    public function add_admin_pages()
    {
        add_menu_page('My plugin', 'My plugin', 'manage_options', 'my_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    function admin_index()
    {
        // require template
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
}
