<?php

/**
 * @package MyPlugin
 */

namespace Includes\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        $default = array();

        if (!get_option('my_plugin')) {
            update_option('my_plugin', $default);
        }
    }
}
