<?php

/**
 * Custom Gutenberg functions
 */

function mytheme_gutenberg_default_colors()
{
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name' => 'White',
                'slug' => 'white',
                'color' => '#ffffff',
            ),
            array(
                'name' => 'Black',
                'slug' => 'black',
                'color' => '#000000',
            ),
        )
    );

    add_theme_support(
        'editor-font-sizes',
        array(
            array(
                'name' => 'Normal',
                'slug' => 'normal',
                'size' => 16,
            ),
            array(
                'name' => 'Large',
                'slug' => 'large',
                'size' => 24,
            ),
        )
    );
}
add_action('init', 'mytheme_gutenberg_default_colors');

/**
 * Custom blocks
 */

function mytheme_gutenberg_blocks()
{
    wp_register_script('custom-cta-js', get_template_directory_uri() . '/build/index.js', array('wp-blocks', 'wp-editor', 'wp-components'));

    wp_register_style('custom-cta-css-editor', get_template_directory_uri() . '/mytheme-editor.css', array());

    wp_register_style('custom-cta-css', get_template_directory_uri() . '/mytheme.css', array());

    register_block_type('mytheme/custom-cta', array(
        'editor_script' => 'custom-cta-js',
        'editor_style' => 'custom-cta-css-editor', // loaded only in the editor
        'style' => 'custom-cta-css' // loaded in editor and in the frontend
    ));
}
add_action('init', 'mytheme_gutenberg_blocks');
