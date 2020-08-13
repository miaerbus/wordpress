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
}
