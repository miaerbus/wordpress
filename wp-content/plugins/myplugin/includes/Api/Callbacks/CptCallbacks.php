<?php

/**
 * @package MyPlugin
 */

namespace Includes\Api\Callbacks;

class CptCallbacks
{
    public function cptSectionManager()
    {
        echo 'Create as Many Custom Post Types as You Want';
    }

    public function cptSanitize($input)
    {
        $output = get_option('my_plugin_cpt');

        if (isset($_POST["remove"])) {
            unset($output[$_POST["remove"]]);
            return $output;
        }

        if (count($output) == 0) {
            $output = array($input['post_type'] => $input);
            return $output;
        }
        foreach ($output as $key => $value) {
            if ($input['post_type'] === $key) {
                $output[$key] = $input;
            } else {
                $output[$input['post_type']] = $input;
            }
        }
        return $output;
    }

    public function textField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $value = '';

        if (isset($_POST["edit_post"])) {
            $input = get_option($option_name);
            $value = $input[$_POST["edit_post"]][$name] ?: false;
        }

        $disabled = ($name == 'post_type' && $value != '') ? 'disabled' : '';

        echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $args['option_name'] . '[' . $name . ']" value="' . $value . '" placeholder="' . $args['placeholder'] . '" ' . $disabled . ' required>';
    }

    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $checked = false;

        if (isset($_POST["edit_post"])) {
            $checkbox = get_option($option_name);
            $checked = isset($checkbox[$_POST["edit_post"]][$name]) ?: false;
        }

        echo '<div class="' . $args['class'] . '"><input type="checkbox" id="' . $name . '" name="' . $args['option_name'] . '[' . $name . ']" value="1" ' . ($checked ? 'checked' : '') . '><label for=' . $name . '><div></div></label></div>';
    }
}
