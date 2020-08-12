<?php

/**
 * @package MyPlugin
 */

namespace Includes\Pages;

use Includes\Api\SettingsApi;
use Includes\Base\BaseController;
use Includes\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => 'My plugin',
                'menu_title' => 'My plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'my_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
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

    public function setSubpages()
    {
        $this->subpages = [
            [
                'parent_slug' => 'my_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'my_plugin_cpt',
                'callback' => array($this->callbacks, 'postTypes'),
            ],
            [
                'parent_slug' => 'my_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'my_plugin_taxonomies',
                'callback' => array($this->callbacks, 'taxonomies'),
            ],
            [
                'parent_slug' => 'my_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'my_plugin_widgets',
                'callback' => array($this->callbacks, 'widgets'),
            ],
        ];
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'my_plugin_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'myPluginOptionsGroup')
            ),
            array(
                'option_group' => 'my_plugin_options_group',
                'option_name' => 'first_name',
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'my_plugin_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'myPluginAdminSection'),
                'page' => 'my_plugin'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array($this->callbacks, 'myPluginTextExample'),
                'page' => 'my_plugin',
                'section' => 'my_plugin_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                )
            ),
            array(
                'id' => 'first_name',
                'title' => 'First Name',
                'callback' => array($this->callbacks, 'myPluginFirstName'),
                'page' => 'my_plugin',
                'section' => 'my_plugin_admin_index',
                'args' => array(
                    'label_for' => 'first_name',
                    'class' => 'example-class'
                )
            )
        );

        $this->settings->setFields($args);
    }
}
