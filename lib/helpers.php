<?php

/*
* Write PHP data to a debug.log file to the content folder.
* This requires enabling debug in the wp-config.php file (see example below)
*/
//----------------------------------
// Add this part to wp-config.php
// define('WP_DEBUG', true);
// define('WP_DEBUG_DISPLAY', false);
// define('WP_DEBUG_LOG', true);
// set_time_limit(1800);
//----------------------------------
if ( ! function_exists( 'write_log' ) ) {
    function write_log( $log ) {
        if ( is_array( $log ) || is_object( $log ) ) {
            error_log( print_r( $log, true ) );
        } else {
            error_log( $log );
        }
    }
}