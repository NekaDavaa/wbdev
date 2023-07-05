<?php
//hide empty second email
if (function_exists('oxygen_vsb_register_condition')) {
    oxygen_vsb_register_condition('Second Email Not Empty', array('options' => array(), 'custom' => true), array('=='), 'check_semail_not_empty', 'Other');

    function check_semail_not_empty($value, $operator) {
        $repeater_rows = get_field('physical_stores'); 
		
// 		var_dump($value);
        if (function_exists('get_field')) {
			if (!empty($repeater_rows[$value-1]['physical_store_display_second_email'])) {
				return true;
			}
			return false; // All fields are empty in all repeater rows
        }
    }
}

// Show if Phone is filled
if (function_exists('oxygen_vsb_register_condition')) {
    oxygen_vsb_register_condition('Check if phone is empty', array('options' => array(), 'custom' => true), array('=='), 'check_phone_not_empty', 'Other');

    function check_phone_not_empty($value, $operator) {
        $repeater_rows = get_field('physical_stores'); 
		
        if (function_exists('get_field')) {
			if (!empty($repeater_rows[$value-1]['physical_store_display_phone_number'])) {
				return true;
			}
			return false; // All fields are empty in all repeater rows
        }
    }
}