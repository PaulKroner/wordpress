jQuery(document).ready(function ($) {
  // Add Employee

  let hauptamtValue = 0;


  // hier stimmt doch auch was nicht!!!
  $(document).on('click', '.prevent-default-btn', function (event) {
    event.preventDefault();

    // updateCombinedAddress();

    // Determine the value based on the clicked button's ID
    if (this.id === 'yes') {
      hauptamtValue = 1; // "Yes" button represents 1
    } else if (this.id === 'no') {
      hauptamtValue = 0; // "No" button represents 0
    }

    if ($(this).hasClass('bg-blue-500')) {
      $(this).removeClass('bg-blue-500').addClass('bg-white');
      hauptamtValue = null;
    } else {
      // Remove the active class from other buttons
      $('.prevent-default-btn').removeClass('bg-blue-500').addClass('bg-white');
      // Add the active class to the clicked button
      $(this).removeClass('bg-white').addClass('bg-blue-500');
    }
  });

  $(document).on('click', '#submit-button', function (event) {
    event.preventDefault();

    var combinedAddress = '';

    function updateCombinedAddress() {
      var street = document.getElementById('street').value.trim();
      var housenumber = document.getElementById('housenumber').value.trim();
      var zip = document.getElementById('zip').value.trim();
      var city = document.getElementById('city').value.trim();
      var additional = document.getElementById('additional').value.trim();

      // Count how many fields are filled
      // ToDo: return cancelt nicht die gesamte Funktion!!!
      var filledFields = [street, housenumber, zip, city].filter(value => value !== "").length;
      if (filledFields > 0 && filledFields < 4) {
        alert("Error: Either all fields must be filled or all fields must be empty.");
        return;
      }

      // combine
      if (filledFields === 4) {
        if (additional) {
          combinedAddress = street + ' ' + housenumber + ', ' + city + ' ' + zip + ', ' + additional;
        } else {
          combinedAddress = street + ' ' + housenumber + ', ' + city + ' ' + zip;
        }
      }
    }

    // Call the function on input change
    document.querySelectorAll('#street, #housenumber, #zip, #city, #additional').forEach(function (input) {
      input.addEventListener('input', updateCombinedAddress);
    });

    // Initialize the combined address when the page loads
    updateCombinedAddress();

    const data = {
      action: 'insert_employee', // The AJAX action for inserting an employee
      name: $('#name').val(),
      vorname: $('#vorname').val(),
      email: $('#email').val(),
      postaladress: combinedAddress,
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
      hauptamt: hauptamtValue,
    };

    console.log(data);
    console.log('Data: ' + JSON.stringify(data));  // Log the data for debugging

    // Send the data using AJAX
    if (data.name && data.vorname && data.email) {
      $.post(dashboardPage_ajax_object.ajax_url, data, function (response) {
        console.log(response);  // Log the full response for debugging

        if (response && response.success) {
          alert('Employee added successfully!');
        } else {
          // alert('Error: ' + (response ? response.message : 'Unknown error'));
        }
      });
    }

  });
});
