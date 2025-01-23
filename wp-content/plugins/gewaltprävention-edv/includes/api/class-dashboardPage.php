<?php

class DashbaordPage_Ajax
{
  public function __construct()
  {
    add_action('wp_ajax_insert_employee', [$this, 'insert_employee']);
    add_action('wp_ajax_delete_employee', [$this, 'delete_employee']);
    add_action('wp_ajax_edit_employee', [$this, 'edit_employee']);
  }

  public function insert_employee()
  {
    global $wpdb;

    error_log(print_r($_POST, true)); // Logs the POST data

    $name = sanitize_text_field($_POST['name']);
    $vorname = sanitize_text_field($_POST['vorname']);
    $email = sanitize_email($_POST['email']);
    $postaladress = isset($_POST['postaladress']) && !empty($_POST['postaladress']) ? sanitize_text_field($_POST['postaladress']) : null;
    $fz_eingetragen = isset($_POST['fz_eingetragen']) && !empty($_POST['fz_eingetragen']) ? sanitize_text_field($_POST['fz_eingetragen']) : null;
    $fz_abgelaufen = isset($_POST['fz_abgelaufen']) && !empty($_POST['fz_abgelaufen']) ? sanitize_text_field($_POST['fz_abgelaufen']) : null;
    $fz_kontrolliert_first = isset($_POST['fz_kontrolliert_first']) && !empty($_POST['fz_kontrolliert_first']) ? sanitize_text_field($_POST['fz_kontrolliert_first']) : null;
    $fz_kontrolliert_second = isset($_POST['fz_kontrolliert_second']) && !empty($_POST['fz_kontrolliert_second']) ? sanitize_text_field($_POST['fz_kontrolliert_second']) : null;
    $fz_kontrolliert_am = isset($_POST['fz_kontrolliert_am']) && !empty($_POST['fz_kontrolliert_am']) && strtotime($_POST['fz_kontrolliert_am']) ? sanitize_text_field($_POST['fz_kontrolliert_am']) : null;
    $gs_eingetragen = isset($_POST['gs_eingetragen']) && !empty($_POST['gs_eingetragen']) ? sanitize_text_field($_POST['gs_eingetragen']) : null;
    $gs_erneuert = isset($_POST['gs_erneuert']) && !empty($_POST['gs_erneuert']) ? sanitize_text_field($_POST['gs_erneuert']) : null;
    $gs_kontrolliert = isset($_POST['gs_kontrolliert']) && !empty($_POST['gs_kontrolliert']) ? sanitize_text_field($_POST['gs_kontrolliert']) : null;
    $us_eingetragen = isset($_POST['us_eingetragen']) && !empty($_POST['us_eingetragen']) ? sanitize_text_field($_POST['us_eingetragen']) : null;
    $us_abgelaufen = isset($_POST['us_abgelaufen']) && !empty($_POST['us_abgelaufen']) ? sanitize_text_field($_POST['us_abgelaufen']) : null;
    $us_kontrolliert = isset($_POST['us_kontrolliert']) && !empty($_POST['us_kontrolliert']) ? sanitize_text_field($_POST['us_kontrolliert']) : null;
    $sve_eingetragen = isset($_POST['sve_eingetragen']) && !empty($_POST['sve_eingetragen']) ? sanitize_text_field($_POST['sve_eingetragen']) : null;
    $sve_kontrolliert = isset($_POST['sve_kontrolliert']) && !empty($_POST['sve_kontrolliert']) ? sanitize_text_field($_POST['sve_kontrolliert']) : null;
    $hauptamt = isset($_POST['hauptamt']) && ($_POST['hauptamt'] === '0' || $_POST['hauptamt'] === '1') ? sanitize_text_field($_POST['hauptamt']) : 0;

    // insert the data
    $table_name = 'employees'; // Add prefix for WordPress compatibility
    $result = $wpdb->insert(
      $table_name,
      [
        'name' => $name,
        'vorname' => $vorname,
        'email' => $email,
        'postadresse' => $postaladress,
        'fz_eingetragen' => $fz_eingetragen,
        'fz_abgelaufen' => $fz_abgelaufen,
        'fz_kontrolliert' => $fz_kontrolliert_first . ' ' . $fz_kontrolliert_second,
        'fz_kontrolliert_am' => $fz_kontrolliert_am,
        'gs_eingetragen' => $gs_eingetragen,
        'gs_erneuert' => $gs_erneuert,
        'gs_kontrolliert' => $gs_kontrolliert,
        'us_eingetragen' => $us_eingetragen,
        'us_abgelaufen' => $us_abgelaufen,
        'us_kontrolliert' => $us_kontrolliert,
        'sve_eingetragen' => $sve_eingetragen,
        'sve_kontrolliert' => $sve_kontrolliert,
        'hauptamt' => $hauptamt,
      ],
      [
        '%s', // name
        '%s', // vorname
        '%s', // email
        '%s', // postaladress
        '%s', // fz_eingetragen
        '%s', // fz_abgelaufen
        '%s', // fz_kontrolliert
        '%s', // fz_kontrolliert_am
        '%s', // gs_eingetragen
        '%s', // gs_erneuert
        '%s', // gs_kontrolliert
        '%s', // us_eingetragen
        '%s', // us_abgelaufen
        '%s', // us_kontrolliert
        '%s', // sve_eingetragen
        '%s', // sve_kontrolliert
        '%d'  // hauptamt
      ]
    );

    // Return response
    if ($result) {
      wp_send_json_success(['message' => 'Mitarbeiter erfolgreich hinzugefügt!']);
    } else {
      // You can add more detailed information about the error here
      wp_send_json_error(['message' => 'Fehler beim Hinzuügen des Mitarbeiters.']);
    }
    exit;
  }


  function delete_employee()
  {
    // Check for the employee ID
    if (!isset($_POST['employee_id']) || empty($_POST['employee_id'])) {
      wp_send_json_error('Ungültige employee ID.');
    }

    global $wpdb;
    $employee_id = intval($_POST['employee_id']);
    $table_name = 'employees';

    // Delete the employee
    $deleted = $wpdb->delete($table_name, ['id' => $employee_id]);

    if ($deleted) {
      wp_send_json_success();
    } else {
      wp_send_json_error('Löschen des Mitarbeiters fehlgeschlagen. SQL Fehler: ' . $wpdb->last_error);
    }
  }


  function edit_employee()
  {
    global $wpdb;

    // Retrieve and sanitize input data
    $employee_id = intval($_POST['employee_id']);
    $name = sanitize_text_field($_POST['name']);
    $vorname = sanitize_text_field($_POST['vorname']);
    $email = sanitize_email($_POST['email']);
    $postaladress = isset($_POST['postaladress']) && !empty($_POST['postaladress']) ? sanitize_text_field($_POST['postaladress']) : null;
    $fz_eingetragen = isset($_POST['fz_eingetragen']) && !empty($_POST['fz_eingetragen']) ? sanitize_text_field($_POST['fz_eingetragen']) : null;
    $fz_abgelaufen = isset($_POST['fz_abgelaufen']) && !empty($_POST['fz_abgelaufen']) ? sanitize_text_field($_POST['fz_abgelaufen']) : null;
    $fz_kontrolliert_first = isset($_POST['fz_kontrolliert_first']) && !empty($_POST['fz_kontrolliert_first']) ? sanitize_text_field($_POST['fz_kontrolliert_first']) : null;
    $fz_kontrolliert_second = isset($_POST['fz_kontrolliert_second']) && !empty($_POST['fz_kontrolliert_second']) ? sanitize_text_field($_POST['fz_kontrolliert_second']) : null;
    $fz_kontrolliert_am = isset($_POST['fz_kontrolliert_am']) && !empty($_POST['fz_kontrolliert_am']) && strtotime($_POST['fz_kontrolliert_am']) ? sanitize_text_field($_POST['fz_kontrolliert_am']) : null;
    $gs_eingetragen = isset($_POST['gs_eingetragen']) && !empty($_POST['gs_eingetragen']) ? sanitize_text_field($_POST['gs_eingetragen']) : null;
    $gs_erneuert = isset($_POST['gs_erneuert']) && !empty($_POST['gs_erneuert']) ? sanitize_text_field($_POST['gs_erneuert']) : null;
    $gs_kontrolliert = isset($_POST['gs_kontrolliert']) && !empty($_POST['gs_kontrolliert']) ? sanitize_text_field($_POST['gs_kontrolliert']) : null;
    $us_eingetragen = isset($_POST['us_eingetragen']) && !empty($_POST['us_eingetragen']) ? sanitize_text_field($_POST['us_eingetragen']) : null;
    $us_abgelaufen = isset($_POST['us_abgelaufen']) && !empty($_POST['us_abgelaufen']) ? sanitize_text_field($_POST['us_abgelaufen']) : null;
    $us_kontrolliert = isset($_POST['us_kontrolliert']) && !empty($_POST['us_kontrolliert']) ? sanitize_text_field($_POST['us_kontrolliert']) : null;
    $sve_eingetragen = isset($_POST['sve_eingetragen']) && !empty($_POST['sve_eingetragen']) ? sanitize_text_field($_POST['sve_eingetragen']) : null;
    $sve_kontrolliert = isset($_POST['sve_kontrolliert']) && !empty($_POST['sve_kontrolliert']) ? sanitize_text_field($_POST['sve_kontrolliert']) : null;
    $hauptamt = isset($_POST['hauptamt']) && ($_POST['hauptamt'] === '0' || $_POST['hauptamt'] === '1') ? sanitize_text_field($_POST['hauptamt']) : 0;

    $table_name = 'employees';

    $data = array(
      'name' => $name,
      'vorname' => $vorname,
      'email' => $email,
      'postadresse' => $postaladress,
      'fz_eingetragen' => $fz_eingetragen,
      'fz_abgelaufen' => $fz_abgelaufen,
      'fz_kontrolliert' => $fz_kontrolliert_first . ' ' . $fz_kontrolliert_second,
      'fz_kontrolliert_am' => $fz_kontrolliert_am,
      'gs_eingetragen' => $gs_eingetragen,
      'gs_erneuert' => $gs_erneuert,
      'gs_kontrolliert' => $gs_kontrolliert,
      'us_eingetragen' => $us_eingetragen,
      'us_abgelaufen' => $us_abgelaufen,
      'us_kontrolliert' => $us_kontrolliert,
      'sve_eingetragen' => $sve_eingetragen,
      'sve_kontrolliert' => $sve_kontrolliert,
      'hauptamt' => $hauptamt
  );
  $where = array('id' => $employee_id);
  
  $updated = $wpdb->update($table_name, $data, $where);

  if ($updated) {
    wp_send_json_success('Mitarbeiter erfolgreich geändert!');
  } else {
    wp_send_json_error('Ändern des Mitarbeiters fehlgeschlagen. SQL Error: ' . $wpdb->last_error);
  }
  }
}

// Instantiate the class
new DashbaordPage_Ajax();
