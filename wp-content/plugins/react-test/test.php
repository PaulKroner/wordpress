<div id="test">Lädt...</div>
<div id="wp">lädt auch</div>
<div id="ding">lädt auch</div>
<script>
  // JavaScript to fetch the REST API data and display it
  document.addEventListener('DOMContentLoaded', function() {

    const testElement = document.getElementById('test');
    const wp = document.getElementById('wp');
    const ding = document.getElementById('ding');

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

      fetch('<?php echo esc_url(rest_url('react-api/v1/get-data')); ?>')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok: ' + response.statusText);
        }
        return response.json();
      })
      .then(data => {
        // Display the data inside the root element
        if (Array.isArray(data) && data.length > 0) {
          wp.innerHTML = '<ul>' + data.map(post => `<li>${post.post_title}</li>`).join('') + '</ul>';
        } else {
          wp.textContent = 'No posts found.';
        }
      })
      .catch(error => {
        wp.textContent = 'Error fetching data: ' + error.message;
      });

      fetch('<?php echo rest_url('react-api/v1/getdata') ?>')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok: ' + response.statusText);
        }
        return response.json();
      })
      .then(data => {
        // Display the data inside the root element
        if (Array.isArray(data) && data.length > 0) {
          ding.innerHTML = data;
          console.log(data);
        } else {
          ding.textContent = 'No posts found.';
        }
      })
      .catch(error => {
        ding.textContent = 'Error fetching data: ' + error.message;
      });

  });
</script>