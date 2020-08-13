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
        return (isset($input) ? true : false);
    }

    public function adminSectionManager($input)
    {
        echo 'Manage the Sections and Features of this plugin!';
    }

    public function checkField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $checkbox = get_option($name);
        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $name . '" value="0"' . ($checkbox ? 'checked' : '') . '><label for=' . $name . '><div></div></label></div>';
    }
}
