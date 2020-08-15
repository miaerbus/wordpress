<?php

/**
 * @package MyPlugin
 */

namespace Includes\Pages;

use \Includes\Api\SettingsApi;
use \Includes\Base\BaseController;
use \Includes\Api\Callbacks\AdminCallbacks;
use \Includes\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
    public $settings;

    public $callbacks;
    
    public $callbacks_mngr;

    public $pages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr  = new ManagerCallbacks();

        $this->setPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => 'My Plugin',
                'menu_title' => 'My Plugin',
                'capability' => 'manage_options',
                'menu_slug' => 'my_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
            ],
        ];
    }

    public function setSettings()
    {
        $args = array(
            $args = array(
                'option_group' => 'my_plugin_settings',
                'option_name' => 'my_plugin',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'my_plugin_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'my_plugin'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array();

        foreach ($this->managers as $key => $value) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array($this->callbacks_mngr, 'checkField'),
                'page' => 'my_plugin',
                'section' => 'my_plugin_admin_index',
                'args' => array(
                    'option_name' => 'my_plugin',
                    'label_for' => $key,
                    'class' => 'ui-toggle',
                )
            );
        }

        $this->settings->setFields($args);
    }
}
