
if (function_exists('oxygen_vsb_register_condition')) {
    oxygen_vsb_register_condition('Hide empty coordinates', array('options' => array(), 'custom' => true), array('=='), 'check_coordinates', 'Other');

    function check_coordinates($value, $operator) {
        $args = [
            'post_type' => 'projects',
            'meta_query' => [
                [
                    'key' => 'services',
                    'value' => get_the_ID(),
                    'compare' => 'LIKE'
                ]
            ]
        ];

        $query = new WP_Query($args);

        $markersString = '';
        foreach ($query->posts as $project) {
            $markersString .= '{position: {lat: ' . get_field('position_lat', $project->ID) . ', lng: ' . get_field('position_lng', $project->ID) . '}, title: "' . $project->post_title . '", icon: "' . $pinPath . '"},';
        }

        // If $markersString is empty, return false
        if (empty($markersString)) {
            return false;
        }

        return true;
    }
}

if (function_exists('oxygen_vsb_unregister_condition')) {
    oxygen_vsb_unregister_condition('Hide empty coordinates');
}