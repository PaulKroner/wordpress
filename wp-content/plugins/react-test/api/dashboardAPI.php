<?php
// get employee data for dashboard table
function api_getEmployeeData() {
  global $wpdb;

  // Beispielabfrage: Alle Beiträge aus der WordPress-Datenbank abrufen
  $results = $wpdb->get_results("SELECT * FROM employees");

  if (empty($results)) {
      return new WP_Error('no_employees', 'No employees found', ['status' => 404]);
  }

  return rest_ensure_response($results);
}
?>