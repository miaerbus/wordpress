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

define('PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('PLUGIN_URL', plugin_dir_url( __FILE__ ));

if ( class_exists('Includes\\Init') ) {
    Includes\Init::register_services();
}
