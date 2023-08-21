<?php
/*
Plugin Name: Custom Auth API
Description: Custom API endpoint for user authentication
Author: Group Project
*/


if( !defined('ABSPATH') ){
    exit;
}

// Registration of endpoint
add_action('rest_api_init', 'register_custom_auth_api_endpoint');

function register_custom_auth_api_endpoint() {
    register_rest_route('custom-auth-api/v1', '/login', array(
        'methods' => 'POST',
        'callback' => 'custom_auth_api_login',
    ));
}

function custom_auth_api_login($request) {
    $username = $request->get_param('username');
    $password = $request->get_param('password');

    
    $user = wp_authenticate($username, $password);

    if (is_wp_error($user)) {
        return array('error' => 'Invalid');
    }

    $token = '6sh#Ekljsh'; 
    return array('token' => $token);
 
}

