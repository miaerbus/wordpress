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
