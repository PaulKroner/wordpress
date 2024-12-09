jQuery(document).ready(function ($) {
  // Delete Employee
  $(document).on('click', '#deleteEmployeeButton', function (event) {
    event.preventDefault();

    console.log("hier");

    // Get the employee ID from the clicked row
    const row = $(this).closest('tr'); // Find the closest row
    const employeeId = row.data('id'); // Assume each row has a `data-id` attribute with the employee ID

    if (!employeeId) {
      alert('Employee ID not found');
      return;
    }

    // Confirmation before deletion
    if (!confirm('Are you sure you want to delete this employee?')) {
      return;
    }

    // AJAX request to delete the employee
    $.ajax({
      url: dashboardPage_ajax_object.ajax_url, // WordPress-provided global variable for AJAX URL
      type: 'POST',
      data: {
        action: 'delete_employee', // The WordPress AJAX action hook
        employee_id: employeeId, // Pass the employee ID
      },
      success: function (response) {
        if (response.success) {
          alert('Employee deleted successfully.');
          row.remove(); // Remove the row from the table
        } else {
          alert('Failed to delete employee: ' + response.data);
        }
      },
      error: function () {
        alert('An error occurred while trying to delete the employee.');
      },
    });

    const data = {
      action: 'delete_employee', // The WordPress AJAX action hook
      employee_id: employeeId, // Pass the employee ID
    }

    // Send the data using AJAX
    $.post(dashboardPage_ajax_object.ajax_url, data, function (response) {
      console.log(response);  // Log the full response for debugging

      if (response && response.success) {
        alert('Employee deleted successfully!');
      } else {
        // alert('Error: ' + (response ? response.message : 'Unknown error'));
      }
    });
  });
});
