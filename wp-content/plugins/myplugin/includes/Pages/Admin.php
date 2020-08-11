<?php
/**
 * @package MyPlugin
 */

namespace Includes\Pages;

use \Includes\Base\BaseController;
use \Includes\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;

    public $pages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi();

        $this->pages = [
            [
                'page_title' => 'My plugin',
                'menu_title' => 'My plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'my_plugin',
                'callback' => function () {
                    echo '<h1>My plugin</h1>';
                },
                'icon_url' => 'dashicons-store',
                'position' => 110
            ],
            [
                'page_title' => 'Test',
                'menu_title' => 'Test',
                'capability' => 'manage_options',
                'menu_slug' => 'test_plugin',
                'callback' => function () {
                    echo '<h1>External</h1>';
                },
                'icon_url' => 'dashicons-external',
                'position' => 9
            ],
        ];
    }

    public function register()
    {
        $this->settings->addPages( $this->pages )->register();
    }
}
