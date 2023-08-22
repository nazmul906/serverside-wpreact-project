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
    

}
// Add this code to your plugin file
add_action('rest_api_init', 'register_custom_nonce_api_endpoint');

function register_custom_nonce_api_endpoint() {
    register_rest_route('custom-auth-api/v1', '/nonce', array(
        'methods' => 'GET',
        'callback' => 'generate_custom_nonce',
    ));
}

function generate_custom_nonce() {
    $nonce = wp_create_nonce('custom-auth-api-nonce');
    return rest_ensure_response(array('nonce' => $nonce));
}

