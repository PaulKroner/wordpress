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

// Sicherheit: Direkten Zugriff verhindern, über relativen Pfad
// if(!defined('ABSPATH')) {
//   exit;
// }

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

//include login.php
// function include_login()
// {
//   $login_path = plugin_dir_path(__FILE__) . 'templates/pages/login.php';

//   if (file_exists($login_path)) {
//     include $login_path;
//   } else {
//     echo '<p>Login file not found.</p>';
//   }
// }
// add_action('wp_footer', 'include_login');


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

function gewaltpraevention_edv_create_pages() {
  // Dashboard-Seite erstellen, falls nicht vorhanden
  if (get_page_by_path('dashboard') == null) {
      wp_insert_post([
          'post_title'    => 'Dashboard',
          'post_name'     => 'dashboard',
          'post_content'  => '[gewaltpraevention_edv_dashboard]', // Ein Shortcode für den Inhalt
          'post_status'   => 'publish',
          'post_type'     => 'page'
      ]);
  }

  // Login-Seite erstellen, falls nicht vorhanden
  if (get_page_by_path('userAdministration') == null) {
      wp_insert_post([
          'post_title'    => 'User-Verwaltung',
          'post_name'     => 'user-verwaltung',
          'post_content'  => '[gewaltpraevention_edv_userAdministration]', // Ein Shortcode für den Inhalt
          'post_status'   => 'publish',
          'post_type'     => 'page'
      ]);
  }
}
register_activation_hook(__FILE__, 'gewaltpraevention_edv_create_pages');

function gewaltpraevention_edv_dashboard_content() {
  // ob_start();
  ?>
  <h1>Dashboard</h1>
  <p>Willkommen im Dashboard!</p>
  <form method="post">
      <button type="submit" name="go_to_userAdministration">Zur User-Administration</button>
  </form>

  <?php
  if (isset($_POST['go_to_userAdministration'])) {
      wp_redirect(site_url('/userAdministration'));
      exit;
  }
  // return ob_get_clean();
}
add_shortcode('gewaltpraevention_edv_dashboard', 'gewaltpraevention_edv_dashboard_content');

function gewaltpraevention_edv_userAdministration_content() {
  // ob_start();
  ?>
  <h1>Login</h1>
  <p>Bitte logge dich ein.</p>
  <form method="post">
      <button type="submit" name="go_to_dashboard">Zum Dashboard</button>
  </form>

  <?php
  if (isset($_POST['go_to_dashboard'])) {
      wp_redirect(site_url('/dashboard'));
      exit;
  }
  // return ob_get_clean();
}
add_shortcode('gewaltpraevention_edv_userAdministration', 'gewaltpraevention_edv_userAdministration_content');
