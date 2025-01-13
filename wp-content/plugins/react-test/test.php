<div id="test">Lädt...</div>
<script>
  // JavaScript to fetch the REST API data and display it
  document.addEventListener('DOMContentLoaded', function() {

    const testElement = document.getElementById('test');
    fetch('<?php echo esc_url(rest_url('react-api/v1/get-users')); ?>')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok: ' + response.statusText);
        }
        return response.json();
      })
      .then(data => {
        // Display the data inside the root element
        if (Array.isArray(data) && data.length > 0) {
          testElement.innerHTML = '<ul>' + data.map(user => `<li>${user.name}</li>`).join('') + '</ul>';
        } else {
          testElement.textContent = 'No users found.';
        }
      })
      .catch(error => {
        testElement.textContent = 'Error fetching data: ' + error.message;
      });

  });
</script>