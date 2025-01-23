jQuery(document).ready(function ($) {
  // Delete Employee
  $(document).on('click', '#deleteEmployeeButton', function (event) {
    event.preventDefault();

    // Get the employee ID from the clicked row
    const row = $(this).closest('tr'); // Find the closest row
    const employeeId = row.data('id'); // Assume each row has a `data-id` attribute with the employee ID

    if (!employeeId) {
      alert('Employee ID not found');
      return;
    }

    // Confirmation before deletion
    if (!confirm('Sind Sie sicher, dass Sie diesen Mitarbeiter löschen möchten?')) {
      return;
    }

    const data = {
      action: 'delete_employee', // The WordPress AJAX action hook
      employee_id: employeeId, // Pass the employee ID
    }

    // Send the data using AJAX
    $.post(dashboardPage_ajax_object.ajax_url, data, function (response) {
      console.log(response);  // Log the full response for debugging

      if (response && response.success) {
        alert('Mitarbeiter erfolgreich gelöscht!');
      } else {
        alert('Fehler: ' + (response ? response.message : 'Unbekannter Fehler'));
      }
    });
  });
});
