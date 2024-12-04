jQuery(document).ready(function ($) {
  // Add Employee
  $(document).on('click', '#submit-button', function (event) {
    event.preventDefault(); // Prevent default form submission behavior
    console.log("test1111");
    // Collect form data dynamically
    // Collect data from the form inputs
    const data = {
      action: 'insert_employee', // The AJAX action for inserting an employee
      name: $('#name').val(),
      vorname: $('#vorname').val(),
      email: $('#email').val(),
      postaladress: 'test',
      fz_eingetragen: $('#fz_eingetragen').val(),
      fz_abgelaufen: $('#fz_abgelaufen').val(),
      fz_kontrolliert_first: $('#fz_kontrolliert_first').val(),
      fz_kontrolliert_second: $('#fz_kontrolliert_second').val(),
      fz_kontrolliert_am: $('#fz_kontrolliert_am').val(),
      gs_eingetragen: $('#gs_eingetragen').val(),
      gs_erneuert: $('#gs_erneuert').val(),
      gs_kontrolliert: $('#gs_kontrolliert').val(),
      us_eingetragen: $('#us_eingetragen').val(),
      us_abgelaufen: $('#us_abgelaufen').val(),
      us_kontrolliert: $('#us_kontrolliert').val(),
      sve_eingetragen: $('#sve_eingetragen').val(),
      sve_kontrolliert: $('#sve_kontrolliert').val(),
      hauptamt: 1,
    };

    console.log("test2222");
    console.log(data);
    console.log('Data: ' + JSON.stringify(data));  // Log the data for debugging

    // Send the data using AJAX
    $.post(dashboardPage_ajax_object.ajax_url, data, function (response) {
      console.log(response);  // Log the full response for debugging

      if (response && response.success) {
        alert('Employee added successfully!');
      } else {
        // alert('Error: ' + (response ? response.message : 'Unknown error'));
      }
    });

  });
});
