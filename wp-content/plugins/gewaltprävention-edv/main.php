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
Version: 1.0
Author URI: https://ecsa.de/
*/

// favicon
function plugin_add_favicon() {
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

function your_plugin_enqueue_styles() {
  wp_enqueue_style( 'your-plugin-styles', plugin_dir_url( __FILE__ ) . 'assets/css/styles.css' );
}

add_action( 'wp_enqueue_scripts', 'your_plugin_enqueue_styles' );
