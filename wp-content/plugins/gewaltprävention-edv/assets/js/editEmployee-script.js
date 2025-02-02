jQuery(document).ready(function ($) {
  // Edit Employee

  $(document).on('click', '.hauptamt-btn', function() {
      const employeeId = $(this).attr('id').split('-')[1];
    
      // Toggle the data-selected attribute
      if ($(this).attr('id').includes('yes')) {
        // If the "Yes" button is clicked
        $(`#yes-${employeeId}`).attr('data-selected', 'true').addClass('bg-blue-500');
        $(`#no-${employeeId}`).attr('data-selected', 'false').removeClass('bg-blue-500');
      } else {
        // If the "No" button is clicked
        $(`#yes-${employeeId}`).attr('data-selected', 'false').removeClass('bg-blue-500');
        $(`#no-${employeeId}`).attr('data-selected', 'true').addClass('bg-blue-500');
      }
    });

  $(document).on('click', '[id^="saveChangesButton-"]', function (event) {
    event.preventDefault();

    // Extract the employee ID from the clicked button's ID
    const employeeId = $(this).attr('id').split('-')[1];
    console.log("Employee ID:", employeeId);

    // Use the extracted employee ID to dynamically target inputs
    let combinedAddress = '';

    function updateCombinedAddress() {
      const street = $(`#street-${employeeId}`).val().trim();
      const housenumber = $(`#housenumber-${employeeId}`).val().trim();
      const zip = $(`#zip-${employeeId}`).val().trim();
      const city = $(`#city-${employeeId}`).val().trim();
      const additional = $(`#additional-${employeeId}`).val().trim();

      // Count how many fields are filled
      const filledFields = [street, housenumber, zip, city].filter(value => value !== "").length;
      if (filledFields > 0 && filledFields < 4) {
        alert("Fehler: Entweder müssen alle Felder Straße, Hausnummer, Wohnort und PLZ gefüllt oder alle müssen leer sein.");
        return;
      }

      // Combine address fields
      if (filledFields === 4) {
        if (additional) {
          combinedAddress = `${street} ${housenumber}, ${zip} ${city}, ${additional}`;
        } else {
          combinedAddress = `${street} ${housenumber}, ${zip} ${city}`;
        }
      }
    }

    // Attach event listeners to dynamically identified inputs
    $(`#street-${employeeId}, #housenumber-${employeeId}, #zip-${employeeId}, #city-${employeeId}, #additional-${employeeId}`)
      .on('input', updateCombinedAddress);

    // Initialize the combined address when the button is clicked
    updateCombinedAddress();


    // Check which hauptamt button is selected using the 'data-selected' attribute
    const isYesSelected = $(`#yes-${employeeId}`).attr('data-selected') === 'true';
    const isNoSelected = $(`#no-${employeeId}`).attr('data-selected') === 'true';

    let hauptamt = null;
    if (isYesSelected) {
      hauptamt = 1;
    } else if (isNoSelected) {
      hauptamt = 0;
    } else {
      alert(hauptamt);
      return; // Stop execution if neither button is selected
    }


    // Prepare the data for the AJAX request
    const data = {
      action: 'edit_employee',
      employee_id: employeeId,
      name: $(`#name-${employeeId}`).val(),
      vorname: $(`#vorname-${employeeId}`).val(),
      email: $(`#email-${employeeId}`).val(),
      postaladress: combinedAddress,
      fz_eingetragen: $(`#fz_eingetragen-${employeeId}`).val(),
      fz_abgelaufen: $(`#fz_abgelaufen-${employeeId}`).val(),
      fz_kontrolliert_first: $(`#fz_kontrolliert_first-${employeeId}`).val(),
      fz_kontrolliert_second: $(`#fz_kontrolliert_second-${employeeId}`).val(),
      fz_kontrolliert_am: $(`#fz_kontrolliert_am-${employeeId}`).val(),
      gs_eingetragen: $(`#gs_eingetragen-${employeeId}`).val(),
      gs_erneuert: $(`#gs_erneuert-${employeeId}`).val(),
      gs_kontrolliert: $(`#gs_kontrolliert-${employeeId}`).val(),
      us_eingetragen: $(`#us_eingetragen-${employeeId}`).val(),
      us_abgelaufen: $(`#us_abgelaufen-${employeeId}`).val(),
      us_kontrolliert: $(`#us_kontrolliert-${employeeId}`).val(),
      sve_eingetragen: $(`#sve_eingetragen-${employeeId}`).val(),
      sve_kontrolliert: $(`#sve_kontrolliert-${employeeId}`).val(),
      hauptamt: hauptamt,
    };

    $.post(dashboardPage_ajax_object.ajax_url, data, function (response) {
      if (response.success) {
        alert('Mitarbeiter erfolgreich geändert!');
      } else if (response.error) {
        alert('Fehler beim Ändern des Mitarbeiters: ' + response.error);
      } else {
        alert('Es ist ein unbekannter Fehler aufgetreten.');
      }
    });

  });
});