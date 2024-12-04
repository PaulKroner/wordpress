jQuery(document).ready(function ($) {

  // Handle the button click for AJAX
  $(document).on('click', '#', function () {
    event.preventDefault(); // Prevent default form submission behavior
    const data = {
      action: 'insert_user', // WordPress AJAX action hook
      email: 'test@mail.de',
      password: 'test',
      role_id: 2,
      name: 'test',
      vorname: 'test',
    };

    // edv_ajax needs to be changed to the right object name
    $.post(edv_ajax_object.ajax_url, data, function (response) {
      if (response.success) {
        alert(response.data.message);
      } else {
        alert('Error: ' + response.data.message);
      }
    });
  });
});
