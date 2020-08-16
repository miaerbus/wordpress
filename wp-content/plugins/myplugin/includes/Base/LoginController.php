<?php

/**
 * @package MyPlugin
 */

namespace Includes\Base;

use \Includes\Api\SettingsApi;
use \Includes\Base\BaseController;
use \Includes\Api\Callbacks\AdminCallbacks;

class LoginController extends BaseController
{
    public $callbacks;

    public $subpages = array();

    public function register()
    {
        if (!$this->activated('login_manager')) {
            return;
        }

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();

        add_action('init', array($this, 'activate'));
    }

    public function setSubpages()
    {
        $this->subpages = [
            [
                'parent_slug' => 'my_plugin',
                'page_title' => 'Login',
                'menu_title' => 'Login Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'my_plugin_login',
                'callback' => array($this->callbacks, 'login'),
            ]
        ];
    }

    public function activate()
    {
        register_post_type('my_products', array(
            'labels' => array(
                'name' => 'Products',
                'singular_name' => 'Product',
            ),
            'public' => true,
            'has_archive' => true
        ));
    }
}
