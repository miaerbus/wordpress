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

defined('ABSPATH') or die('You cannot access this file, you silly human!');

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php') ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

function activate_my_plugin() {
    Includes\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_my_plugin');

function deactivate_my_plugin() {
    Includes\Base\Deactivate::deactivate();
}
register_activation_hook( __FILE__, 'deactivate_my_plugin' );

if ( class_exists('Includes\\Init') ) {
    Includes\Init::register_services();
}
