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
    }
}