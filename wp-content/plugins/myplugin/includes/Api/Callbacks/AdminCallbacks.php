<?php

/**
 * @package MyPlugin
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once($this->plugin_path . '/templates/admin.php');
    }

    public function postTypes()
    {
        return require_once($this->plugin_path . '/templates/post_types.php');
    }

    public function taxonomies()
    {
        return require_once($this->plugin_path . '/templates/taxonomies.php');
    }

    public function widgets()
    {
        return require_once($this->plugin_path . '/templates/widgets.php');
    }

    public function myPluginOptionsGroup($input)
    {
        return $input;
    }

    public function myPluginAdminSection()
    {
        echo 'Check this beautiful section!';
    }

    public function myPluginTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write something here!" />';
    }

    public function myPluginFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write your First Name!" />';
    }
}
