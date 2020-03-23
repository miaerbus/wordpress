<?php

/**
 * Trigger this file on plugin uninstall
 * 
 * @package MyPlugin
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// clear database stored data

// option 1
$books = get_posts(
    array(
        'post_type' => 'book',
        'numberposts' => -1,
    )
);

foreach($books as $book) {
    wp_delete_post($book->ID, true);
}

// option 2 - access the database via SQL
global $wpdb;
$wpdb->query("DELETE FROM {$wpdb->prefix}posts WHERE post_type = 'book'");
$wpdb->query("DELETE FROM {$wpdb->prefix}postmeta WHERE post_id NOT IN (SELECT id FROM {$wpdb->prefix}posts) ");
$wpdb->query("DELETE FROM {$wpdb->prefix}term_relationships WHERE object_id NOT IN (SELECT id FROM {$wpdb->prefix}posts) ");
