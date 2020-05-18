<?php

/*
Plugin Name: Fail2Ban zVPS.uk
Plugin URI:  https://zvps.uk
Description: Changes wp-admin.php failed login attempt repsonse codes to 401
Version:     1.0
Author:      Kevin Andrews
Author URI:  https://zvps.uk
License:     GPL2
License URI: https://zvps.uk
*/


function my_login_failed_401() {
    status_header(401);
}
add_action( 'wp_login_failed', 'my_login_failed_401' );


add_filter( 'authenticate', 'null_user_login_failed_401', 30, 3 );
function null_user_login_failed_401( $user, $username, $password ) {
    if(is_wp_error($user)) {
        status_header(401);
    }
    return $user;
}

add_action( 'plugins_loaded', function() {
    add_filter( 'site_transient_update_plugins', function ( $value ) 
    {
        if( isset( $value->response['wp-fail2ban/wp-fail2ban.php'] ) )
            unset( $value->response['wp-fail2ban/wp-fail2ban.php'] );
        return $value;
    });
});
