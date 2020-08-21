<?php

/**
 *  Load Bootstrap and custom CSS
 */
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');
}
add_action('wp_enqueue_scripts', 'load_css');

/**
 *  Load JQuery and Bootstrap JS
 */
function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');

/**
 *  Add extra functionalities to the theme
 */
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

/**
 *  Register the navigation menus
 */
register_nav_menus(
    array(
        'top-bar' => 'Top bar location',
        'mobile-bar' => 'Mobile bar location'
    )
);

/**
 *  Add different image sizes
 */
add_image_size('blog-large', 800, 400, false);
add_image_size('blog-small', 300, 200, true);

/**
 *  Custom sidebar
 */
function my_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
}
add_action('widgets_init', 'my_sidebars');

/**
 *  Custom post type
 */
function my_first_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Cars',
            'singular_name' => 'Car'
        ),
        'hierarchical' => true, // true => page, false => post
        'menu_icon' => 'dashicons-chart-pie',
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        //'rewrite' => array('slug' => 'my-cars'),
    );
    register_post_type('cars', $args);
}
add_action('init', 'my_first_post_type');

/**
 *  Custom taxonomy
 */
function my_first_taxonomy()
{
    $args = array(
        'labels' => array(
            'name' => 'Brands',
            'singular_name' => 'Brand'
        ),
        'public' => true,
        'hierarchical' => true, // true => category, false => tag
    );
    register_taxonomy('brand', array('cars'), $args);
}
add_action('init', 'my_first_taxonomy');


/**
 *  Custom Gutenberg blocks
 */
require get_template_directory() . '/includes/gutenberg.php';
