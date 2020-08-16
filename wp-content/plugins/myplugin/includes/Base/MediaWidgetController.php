<?php

/**
 * @package MyPlugin
 */

namespace Includes\Base;

use \Includes\Api\SettingsApi;
use \Includes\Base\BaseController;
use \Includes\Api\Callbacks\AdminCallbacks;

class MediaWidgetController extends BaseController
{
    public $callbacks;

    public $subpages = array();

    public function register()
    {
        if (!$this->activated('media_widget')) {
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
                'page_title' => 'Media Widget',
                'menu_title' => 'Media Widget Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'my_plugin_media_widget',
                'callback' => array($this->callbacks, 'mediaWidget'),
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
