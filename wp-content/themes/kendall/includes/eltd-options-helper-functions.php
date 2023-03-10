<?php

if(!function_exists('kendall_elated_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function kendall_elated_is_responsive_on() {
        return kendall_elated_options()->getOptionValue('responsiveness') !== 'no';
    }
}