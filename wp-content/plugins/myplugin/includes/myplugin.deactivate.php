<?php

/**
 * @package MyPlugin
 */

class MyPluginDeactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
