<?php
/**
 * @package MyPlugin
 */

namespace Includes\Base;

use \Includes\Base\BaseController;

class SettingsLinks extends BaseController
{
    public function register()
    {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    public function settings_link( $links )
    {
        // add custom settings link
        $settings_link = '<a href="admin.php?page=my_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
