<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gewaltprävention-EDV User-Verwaltung</title>
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
</head>

<body>
  <?php ?>
  <div>User Administration</div>

  <div className="flex min-h-screen flex-col items-center justify-center p-24 bg-ec">
    <div className="relative bg-white h-full rounded-2xl p-12 flex flex-col justify-center items-center gap-8">
      <h1 className="flex justify-center items-center font-extrabold headline">Rechteverwaltung</h1>
      <button
        id="backToDashboard"
        className="absolute top-4 left-4 m-1">
        Back to Dashboard
      </button>

      <section className="flex gap-6 sm:gap-4 flex-col sm:flex-row sm:mr-auto">
        <!-- SelectRowSort
 TableSearchbar -->
      </section>

      <!-- table -->
      <div class="max-w-full">
        <?php
        $userAdministrationTable_path = plugin_dir_path(__FILE__) . '../components/UserAdministrationTable/UserAdministrationTable.php';
        include $userAdministrationTable_path;
        userAdministrationTable();
        ?>
      </div>
    </div>
  </div>

  <script>
    // Ensure the document is fully loaded
    document.addEventListener("DOMContentLoaded", function() {
      console.log("DOM fully loaded and parsed");
      const backButton = document.getElementById('backToDashboard');

      if (backButton) {
        // Add the event listener for the click event
        backButton.addEventListener('click', backToDashboard);
      } else {
        console.error('Button with ID "backToDashboard" not found.');
      }
    });

    function backToDashboard() {
      console.log("Test"); // Check if this logs when you click the button
      // Make sure the PHP code renders correctly on the page
      const dashboardUrl = '<?php echo plugin_dir_url(__FILE__) . "../../pages/dashboard.php"; ?>';
      // console.log(dashboardUrl); // Log the URL to see if it's valid
      // window.location.href = dashboardUrl;
    }
  </script>

</body>

</html>