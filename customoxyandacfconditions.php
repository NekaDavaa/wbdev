<?php
//For projects page - review section

if (function_exists('oxygen_vsb_register_condition')) {
    oxygen_vsb_register_condition('Review Not Empty', array('options' => array(), 'custom' => true), array('element'), 'check_review_not_empty', 'Other');

    function check_review_not_empty($value, $operator) {
        $field_names = array('customer_name', 'review', 'logo_of_customer_company');

        if (function_exists('get_field')) {
            foreach ($field_names as $field_name) {
                $field_value = get_field($field_name);

                if (!empty($field_value)) {
                    return true;
                }
            }
        }

        return false;
    }
}

if (function_exists('oxygen_vsb_unregister_condition')) {
    oxygen_vsb_unregister_condition('Review Not Empty');
}

//For projects page - Gallery section

if (function_exists('oxygen_vsb_register_condition')) {
    oxygen_vsb_register_condition('ACF Image Field Not Empty', array('options' => array(), 'custom' => true), array('element'), 'check_acf_image_field_not_empty', 'Other');

    function check_acf_image_field_not_empty($value, $operator) {
        $field_name = 'image_of_the_project';

        if (function_exists('get_field')) {
            $field_value = get_field($field_name);

            if (!empty($field_value)) {
                return true;
            }
        }

        return false;
    }
}

if (function_exists('oxygen_vsb_unregister_condition')) {
    oxygen_vsb_unregister_condition('ACF Image Field Not Empty');
}


//For projects page - Used products section

if (function_exists('oxygen_vsb_register_condition')) {
    oxygen_vsb_register_condition('Hide empty used products content', array('options' => array(), 'custom' => true), array('element'), 'check_acf_field_not_empty', 'Other');
}

if (!function_exists('check_acf_field_not_empty')) {
    function check_acf_field_not_empty($value, $operator) {
        $field_name = 'used_products';

        if (function_exists('get_field')) {
            $field_value = get_field($field_name);

            if (!empty($field_value)) {
                return true;
            }
        }

        return false;
    }
}

if (function_exists('oxygen_vsb_unregister_condition')) {
    oxygen_vsb_unregister_condition('Hide empty used products content');
}
