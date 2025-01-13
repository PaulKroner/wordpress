<?php
  // REST-API-Endpunkt registrieren
add_action('rest_api_init', function () {
  register_rest_route('react-api/v1', '/getdata', [
      'methods' => 'GET',
      'callback' => 'api_getdata',
      'permission_callback' => '__return_true', // Entferne dies in der Produktion oder füge Berechtigungen hinzu
  ]);
});

// Callback-Funktion für den Endpunkt
function api_getdata() {
  global $wpdb;

  // Beispielabfrage: Alle Beiträge aus der WordPress-Datenbank abrufen
  $results = $wpdb->get_results("SELECT * FROM users");

  if (empty($results)) {
      return new WP_Error('no_users', 'No users found', ['status' => 404]);
  }

  return rest_ensure_response($results);
}

// add_action('rest_api_init', function () {
//   register_rest_route('react-api/v1', '/get-users', [
//       'methods' => 'GET',
//       'callback' => 'react_api_get_users',
//       'permission_callback' => '__return_true', // Entferne dies in der Produktion oder füge Berechtigungen hinzu
//   ]);
// });

// // Callback-Funktion für den Endpunkt
// function react_api_get_users() {
//   global $wpdb;

//   // Beispielabfrage: Alle Beiträge aus der WordPress-Datenbank abrufen
//   $results = $wpdb->get_results("SELECT * FROM users");

//   if (empty($results)) {
//       return new WP_Error('no_users', 'No users found', ['status' => 404]);
//   }

//   return rest_ensure_response($results);
// }
?>