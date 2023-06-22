<?php
if (function_exists('oxygen_vsb_register_condition')) {
    oxygen_vsb_register_condition('Review Not Empty', array('options' => array(), 'custom' => true), array('element'), 'check_review_not_empty', 'Other');

    function check_review_not_empty($value, $operator) {
        $field_names = array('project_customer_name', 'project_review', 'project_logo_of_customer_company');

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
?>
