<?php
if (function_exists('oxygen_vsb_register_condition')) {
    oxygen_vsb_register_condition('Author Chosen', array('options' => array(), 'custom' => true), array('element'), 'check_if_author_chosen', 'Other');

    function check_if_author_chosen($value, $operator) {

        $author = get_field('partner_author');
        $is_partner = get_field('is_partner', $author);

        if ($author && !$is_partner) {
            return true;
        }

        return false;
    }

    oxygen_vsb_register_condition('Partner Author Chosen', array('options' => array(), 'custom' => true), array('element'), 'check_if_partner_author_chosen', 'Other');

    function check_if_partner_author_chosen($value, $operator) {

        $author = get_field('partner_author');
        $is_partner = get_field('is_partner', $author);

        if ($author && $is_partner === true) {
            return true;
        }

        return false;
    }

    oxygen_vsb_register_condition('No Author Chosen', array('options' => array(), 'custom' => true), array('element'), 'check_if_no_author_chosen', 'Other');

    function check_if_no_author_chosen($value, $operator) {

        $author = get_field('partner_author');

        if (!$author) {
            return true;
        }

        return false;
    }
}

if (function_exists('oxygen_vsb_unregister_condition')) {
    oxygen_vsb_unregister_condition('Author Chosen', 'Partner Author Chosen');
}
