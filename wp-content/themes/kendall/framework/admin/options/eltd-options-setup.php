<?php

add_action('after_setup_theme', 'kendall_elated_admin_map_init', 1);

function kendall_elated_admin_map_init() {

    do_action('kendall_elated_before_options_map');

    foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/admin/options/*/map.php') as $options_map_load) {
        include_once $options_map_load;
    }


    do_action('kendall_elated_options_map');

    do_action('kendall_elated_after_options_map');

}