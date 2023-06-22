<?php
if (function_exists('oxygen_vsb_register_condition')) {
    oxygen_vsb_register_condition('ACF Field Not Empty', array('options' => array(), 'custom' => true), array('element'), 'check_acf_field_not_empty', 'Other');

    function check_acf_field_not_empty($value, $operator) {
        $field_name = 'project_used_products'; 

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
    oxygen_vsb_unregister_condition('ACF Field Not Empty');
}
?>