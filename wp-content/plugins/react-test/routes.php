<?php

//get employee data for dashboard table
add_action('rest_api_init', function () {
  register_rest_route('dashboard-api', '/getemployeedata', [
      'methods' => 'GET',
      'callback' => 'api_getEmployeeData',
      'permission_callback' => '__return_true', // Entferne dies in der Produktion oder füge Berechtigungen hinzu
  ]);
});
?>