<?php

/*
Plugin Name: React Plugin
Description: A WordPress plugin for a React application.
Version: 1.0
Author: Your Name
*/

// add_action('rest_api_init', function () {
//   remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
//   add_filter('rest_pre_serve_request', function ($value) {
//       header('Access-Control-Allow-Origin: *');
//       header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
//       header('Access-Control-Allow-Credentials: true');
//       return $value;
//   });
// }, 15);


// Include the dashboardTableAPI.php file
require_once plugin_dir_path(__FILE__) . 'routes.php'; // import routes.php
require_once plugin_dir_path(__FILE__) . 'api/dashboardAPI.php';

// REST-API-Endpunkt registrieren
add_action('rest_api_init', function () {
  register_rest_route('react-api/v1', '/get-data', [
      'methods' => ['GET', 'OPTIONS'], // Include OPTIONS
      'callback' => 'react_api_get_data',
      'permission_callback' => '__return_true',
  ]);
});


// Callback-Funktion für den Endpunkt
function react_api_get_data() {
  global $wpdb;

  // Beispielabfrage: Alle Beiträge aus der WordPress-Datenbank abrufen
  $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_status = 'publish'");

  if (empty($results)) {
      return new WP_Error('no_posts', 'No posts found', ['status' => 404]);
  }

  return rest_ensure_response($results);
}


// Include test.php
function include_test()
{
  $test_path = plugin_dir_path(__FILE__) . 'test.php';

  if (file_exists($test_path)) {
    include $test_path;
  } else {
    echo '<p>Test file not found.</p>';
  }
}
add_action('wp_footer', 'include_test');

add_action('rest_api_init', function () {
  register_rest_route('react-api/v1', '/get-users', [
      'methods' => 'GET',
      'callback' => 'react_api_get_users',
      'permission_callback' => '__return_true', // Entferne dies in der Produktion oder füge Berechtigungen hinzu
  ]);
});

// Callback-Funktion für den Endpunkt
function react_api_get_users() {
  global $wpdb;

  // Beispielabfrage: Alle Beiträge aus der WordPress-Datenbank abrufen
  $results = $wpdb->get_results("SELECT * FROM users");

  if (empty($results)) {
      return new WP_Error('no_users', 'No users found', ['status' => 404]);
  }

  return rest_ensure_response($results);
}

// include API files
function include_api_dashboardTableAPI()
{
  $dashboardTableAPI_path = plugin_dir_path(__FILE__) . 'dashboardTableAPI.php';

  if (file_exists($dashboardTableAPI_path)) {
    include $dashboardTableAPI_path;
  } else {
    echo '<p>dashboardTableAPI file not found.</p>';
  }
}
add_action('wp_footer', 'include_api_dashboardTableAPI');