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

    public function cptSanitize( $input )
    {
        return $input;
    }

    public function textField( $args )
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $placeholder = $args['placeholder'];
        $input = get_option($option_name);
        $value = isset($input[$name]) ? $input[$name] : '';

        echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="' . $value . '" placeholder="' . $placeholder . '">';
    }

    public function checkboxField( $args )
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);
        $checked = isset($checkbox[$name]) ? 'checked' : '';

        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1"' . $checked . '><label for=' . $name . '><div></div></label></div>';
    }
}
