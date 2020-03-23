<?php

/**
 * @package MyPlugin
 */

/*
 * Plugin Name: My Plugin
 * Plugin URI: http://github.com/miaerbus
 * Description: My first attempt at building custom plugin.
 * Version: 1.0.0
 * Author: Mia Erbus
 * Author URI: http://miaerbus.com
 * License: GPLv2 or later
 * Text domain: myplugin
 */

// option 1
// if (!defined('ABSPATH')) {
//     die;
// }

// option 2
// if (!function_exists('add_action')) {
//     echo 'You cannot access this file, you silly human!';
//     exit;
// }

// option 3
defined('ABSPATH') or die('You cannot access this file, you silly human!');

class MyPlugin
{
    public $plugin;

    function __construct()
    {
        $this->plugin = plugin_basename(__FILE__);
    }

    function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        // $this->create_post_type();
        add_action('admin_menu', array($this, 'add_admin_pages'));

        echo $this->plugin;
        add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    public function settings_link($links)
    {
        // add custom settings link
        $settings_link = '<a href="admin.php?page=my_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    public function add_admin_pages()
    {
        add_menu_page('My plugin', 'My plugin', 'manage_options', 'my_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    function admin_index()
    {
        // require template
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }

    protected function create_post_type()
    {
        add_action('init', array($this, 'custom_post_type'));
    }

    function custom_post_type()
    {
        $args = array(
            'labels' => array(
                'name' => 'Books',
                'singular_name' => 'Book'
            ),
            'menu_icon' => 'dashicons-book',
            'public' => true
        );
        register_post_type('book', $args);
    }

    function enqueue()
    {
        // enqueue all the scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__),);
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }

    function activate()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/myplugin.activate.php';
        MyPluginActivate::activate();
    }
}

if (class_exists('MyPlugin')) {
    $myPlugin = new MyPlugin('MyPlugin initialized!');
    $myPlugin->register();
}


// activation
// register_deactivation_hook(__FILE__, array('MyPluginActivate', 'activate'));

// deactivation
require_once plugin_dir_path(__FILE__) . 'includes/myplugin.deactivate.php';
register_deactivation_hook(__FILE__, array('MyPluginDeactivate', 'deactivate'));
