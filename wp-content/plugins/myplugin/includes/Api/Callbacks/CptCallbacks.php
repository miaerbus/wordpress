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

        if (empty($output)) {
            // first cpt save, as $output is empty single array
            $output = array($input['post_type'] => $input);
        } else {
            foreach ($output as $key => $value) {
                if ($input['post_type'] === $key) {
                    $output[$key] = $input;
                } else {
                    $output[$input['post_type']] = $input;
                }
            }
        }
        return $output;
    }

    public function textField($args)
    {
        $name = $args['label_for'];

        echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $args['option_name'] . '[' . $name . ']" value="" placeholder="' . $args['placeholder'] . '">';
    }

    public function checkboxField($args)
    {
        $name = $args['label_for'];

        echo '<div class="' . $args['class'] . '"><input type="checkbox" id="' . $name . '" name="' . $args['option_name'] . '[' . $name . ']" value="1"><label for=' . $name . '><div></div></label></div>';
    }
}
