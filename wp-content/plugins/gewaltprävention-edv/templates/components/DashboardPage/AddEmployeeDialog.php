<?php
// Function to display the button and include the dialog
function addEmployeeDialog()
{
  // Include the dialog.php file to access the dialog function
  include_once(plugin_dir_path(__FILE__) . '../ui/dialog.php');
?>
  <div>
    <?php
    // Include and render the button
    $button_path = plugin_dir_path(__FILE__) . '../ui/button.php';
    include $button_path;
    button("open-addEmployee", 'Mitarbeiter hinzufügen', 'text', 'showDialog()'); // Use the global `showDialog()` function
    ?>

    <!-- Dialog container -->
    <div>
      <?php
      dialog(); // Render the dialog here
      ?>
    </div>
  </div>
<?php
}
?>
