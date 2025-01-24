<?php

/**
 * @package Gewaltpraevention_EDV
 * @version 1.0
 */
/*
Plugin Name: Gewaltprävention-EDV
http://localhost/wordpress/wp-admin/plugins.php?plugin=hello.php
Description: Test Plugin für die EDV-Lösung des Gewaltpräventionsprojekts
Author: EC Sachsen-Anhalt e.V.
Version: 1.1
Author URI: https://ecsa.de/
*/

// favicon
function plugin_add_favicon()
{
  // URL zum Favicon relativ zum Plugin-Verzeichnis
  $favicon_url = plugins_url('assets/favicon.ico', __FILE__);

  // HTML-Tag für das Favicon
  echo '<link rel="icon" type="image/x-icon" href="' . esc_url($favicon_url) . '">';
}
add_action('wp_head', 'plugin_add_favicon');


// include tailwind.css
function plugin_enqueue_tailwind()
{
  wp_enqueue_script(
    'tailwindcdn', // Handle des Skripts
    'https://cdn.tailwindcss.com', // URL zum Tailwind CDN
    [], // Abhängigkeiten (keine erforderlich)
    null, // Keine Versionsnummer (immer die neueste Version)
    false // Skript nicht im Footer laden (im <head> laden)
  );
}
add_action('wp_enqueue_scripts', 'plugin_enqueue_tailwind');

// Include dashboard.php
function include_dashboard()
{
  $dashboard_path = plugin_dir_path(__FILE__) . 'templates/pages/dashboard.php';

  if (file_exists($dashboard_path)) {
    include $dashboard_path;
  } else {
    echo '<p>Dashboard file not found.</p>';
  }
}
add_action('wp_footer', 'include_dashboard');


function your_plugin_enqueue_styles()
{
  wp_enqueue_style('your-plugin-styles', plugin_dir_url(__FILE__) . 'assets/css/styles.css');
}

add_action('wp_enqueue_scripts', 'your_plugin_enqueue_styles');

// jQuery
function enqueue_jquery()
{
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');

function enqueue_ajax_script()
{
  // Enqueue an empty JavaScript file or one with your custom code
  wp_enqueue_script('ajax-script', get_template_directory_uri() . '/js/ajax-script.js', [], null, true);

  // Localize the script to pass the `ajaxurl` variable
  wp_localize_script('ajax-script', 'ajax', [
    'url' => admin_url('admin-ajax.php')
  ]);
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_script');


// Define constants
define('EDV_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('EDV_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include required backend files
// require_once EDV_PLUGIN_DIR . 'includes/class-edv-ajax.php';
require_once EDV_PLUGIN_DIR . 'includes/api/class-dashboardPage.php';

// Enqueue scripts
add_action('wp_enqueue_scripts', function () {
  //   wp_enqueue_script(
  //     'edv-script',
  //     EDV_PLUGIN_URL . 'assets/edv-script.js',
  //     ['jquery'],
  //     '1.0',
  //     true
  //   );

  //   // Pass AJAX URL to JavaScript
  //   wp_localize_script('edv-script', 'edv_ajax_object', ['ajax_url' => admin_url('admin-ajax.php')]);

  // enqueue addEmployee Script
  wp_enqueue_script(
    'addEmployee-script',
    EDV_PLUGIN_URL . 'assets/js/addEmployee-script.js',
    ['jquery'],
    '1.0',
    true
  );

  wp_enqueue_script(
    'editEmployee-script',
    EDV_PLUGIN_URL . 'assets/js/editEmployee-script.js',
    ['jquery'],
    '1.0',
    true
  );

  // Pass AJAX URL to JavaScript
  wp_localize_script('deleteEmployee-script', 'dashboardPage_ajax_object', ['ajax_url' => admin_url('admin-ajax.php')]);

  wp_enqueue_script(
    'deleteEmployee-script',
    EDV_PLUGIN_URL . 'assets/js/deleteEmployee-script.js',
    ['jquery'],
    '1.0',
    true
  );

  // Pass AJAX URL to JavaScript
  wp_localize_script('deleteEmployee-script', 'dashboardPage_ajax_object', ['ajax_url' => admin_url('admin-ajax.php')]);
});
