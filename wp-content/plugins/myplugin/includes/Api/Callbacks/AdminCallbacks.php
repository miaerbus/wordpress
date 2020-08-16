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

    public function gallery()
    {
        return require_once($this->plugin_path . '/templates/gallery.php');
    }

    public function testimonial()
    {
        return require_once($this->plugin_path . '/templates/testimonial.php');
    }

    public function templates()
    {
        return require_once($this->plugin_path . '/templates/templates.php');
    }

    public function login()
    {
        return require_once($this->plugin_path . '/templates/login.php');
    }

    public function membership()
    {
        return require_once($this->plugin_path . '/templates/membership.php');
    }

    public function chat()
    {
        return require_once($this->plugin_path . '/templates/chat.php');
    }
}
