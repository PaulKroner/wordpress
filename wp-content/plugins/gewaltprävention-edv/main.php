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

function test()
{
  echo '<h1 class="bg-green-500">Test2222</h1>';
}

add_action('wp_footer', 'test');


// test function
function render_tailwind_content()
{
  echo '<div class="bg-blue-500 text-white p-4 rounded shadow-lg">
          <h1 class="text-2xl font-bold">Hello, Tailwind!</h1>
          <p>This is styled with Tailwind CSS.</p>
        </div>
        ';
}
add_action('wp_footer', 'render_tailwind_content');
