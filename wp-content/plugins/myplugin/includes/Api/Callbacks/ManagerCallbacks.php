<?php

/**
 * @package MyPlugin
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        $output = array();
        foreach ($this->managers as $key => $value) {
            $output[$key] = isset($input[$key]) && $input[$key];
        }
        return $output;
    }

    public function adminSectionManager()
    {
        echo 'Manage the Sections and Features of this plugin!';
    }

    public function checkField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);
        
        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1"' . ($checkbox[$name] ? 'checked' : '') . '><label for=' . $name . '><div></div></label></div>';
    }
}
