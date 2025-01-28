<?php

/**
 * Plugin Name: Mitarbeiter Plugin
 * Description: Zeigt ein Login-Formular und eine Tabelle mit Mitarbeitern im Frontend.
 * Version: 1.0
 * Author: Dein Name
 */

if (!defined('ABSPATH')) {
  exit;
}
// Registriere die Seiten bei der Aktivierung des Plugins
// function custom_plugin_create_pages()
// {

//   if (!get_page_by_path('login')) {
//     wp_insert_post([
//       'post_title'   => 'Login',
//       'post_name'    => 'login',
//       'post_content' => '[mitarbeiter_login]',
//       'post_status'  => 'publish',
//       'post_type'    => 'page',
//     ]);
//   }

//   if (!get_page_by_path('mitarbeiter-tabelle')) {
//     wp_insert_post([
//       'post_title'   => 'Mitarbeiter-Tabelle',
//       'post_name'    => 'mitarbeiter-tabelle',
//       'post_content' => '[mitarbeiter_tabelle]',
//       'post_status'  => 'publish',
//       'post_type'    => 'page',
//     ]);
//   }
// }
// register_activation_hook(__FILE__, 'custom_plugin_create_pages');

// Login-Seite
require_once plugin_dir_path(__FILE__) . 'pages/login-page.php';

// Tabelle-Seite
require_once plugin_dir_path(__FILE__) . 'pages/tabelle-page.php';

// Registriere Shortcodes für die Frontend-Seiten
function mitarbeiter_plugin_register_shortcodes()
{
  add_shortcode('mitarbeiter_login', 'mitarbeiter_login_page');
  add_shortcode('mitarbeiter_tabelle', 'mitarbeiter_tabelle_page');
}
add_action('init', 'mitarbeiter_plugin_register_shortcodes');

// Weiterleitung, falls der Benutzer nicht eingeloggt ist
function mitarbeiter_redirect_if_not_logged_in()
{
  if (!is_user_logged_in() && is_page('mitarbeiter-tabelle')) {
    wp_redirect(home_url('/login'));
    exit;
  }
}
add_action('template_redirect', 'mitarbeiter_redirect_if_not_logged_in');
