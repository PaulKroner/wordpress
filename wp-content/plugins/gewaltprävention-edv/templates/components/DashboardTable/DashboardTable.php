<?php
function dashboardTable($showNachweise)
{
  // Database connection settings
  global $wpdb;

  // Fetch data from the 'employees' table
  $table_name = 'employees'; // Add table prefix for WordPress compatibility
  $employees = $wpdb->get_results("SELECT * FROM $table_name");

  // Define the nachweise structure
  $nachweise = [
    'nachweis1' => [
      'Führungszeugnis gültig ab' => 'fz_eingetragen',
      'Führungszeugnis Ablaufdatum' => 'fz_abgelaufen',
      'Führungszeugnis kontrolliert von' => 'fz_kontrolliert',
      'Führungszeugnis kontrolliert am' => 'fz_kontrolliert_am',
    ],
    'nachweis2' => [
      'Grundlagenschulung gültig ab' => 'gs_eingetragen',
      'Grundlagenschulung erneuert am' => 'gs_erneuert_am',
      'Grundlagenschulung kontrolliert von' => 'gs_kontrolliert',
    ],
    'nachweis3' => [
      'Upgradeschulung gültig ab' => 'us_eingetragen',
      'Upgradeschulung Ablaufdatum' => 'us_abgelaufen',
      'Upgradeschulung kontrolliert von' => 'us_kontrolliert',
    ],
    'nachweis4' => [
      'Selbstverpflichtungserklärung gültig ab' => 'sve_eingetragen',
      'Selbstverpflichtungserklärung kontrolliert von' => 'sve_kontrolliert',
    ],
  ];
?>

  <div class="overflow-x-auto">
    <table id="dashboard-table" class="w-full table-auto">
      <thead>
        <tr class="bg-green-300">
          <th class="border border-slate-300">Name</th>
          <th class="border border-slate-300">Vorname</th>
          <th class="border border-slate-300">E-Mail</th>
          <th class="border border-slate-300">Postadresse</th>
          <?php
          // Render column headers dynamically based on nachweise
          foreach ($nachweise as $key => $columns) {
            if (!empty($showNachweise[$key])) {
              foreach ($columns as $label => $field) {
                echo '<th class="border border-slate-300">' . htmlspecialchars($label) . '</th>';
              }
            }
          }
          ?>
          <th class="border border-slate-300">Hauptamt</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Check if data exists
        if (!empty($employees)) {
          foreach ($employees as $employee) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($employee->name ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($employee->vorname ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($employee->email ?? '') . '</td>';
            echo '<td>' . htmlspecialchars($employee->postadresse ?? '') . '</td>';

            // Render nachweise columns dynamically
            foreach ($nachweise as $key => $columns) {
              if (!empty($showNachweise[$key])) {
                foreach ($columns as $field) {
                  echo '<td>' . htmlspecialchars($employee->$field ?? '') . '</td>';
                }
              }
            }

            echo '<td>' . htmlspecialchars($employee->hauptamt ?? '') . '</td>';
            echo '</tr>';
          }
        } else {
          echo '<tr><td colspan="5">No data found</td></tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('search'); // Get the search input element
      const table = document.getElementById('dashboard-table'); // Get the table

      // Function to filter the table rows based on the search input
      searchInput.addEventListener('input', function() {
        const searchValue = searchInput.value.toLowerCase(); // Get the search value
        const rows = table.querySelectorAll('tbody tr'); // Get all table rows in the tbody

        rows.forEach(row => {
          const name = row.cells[0].textContent.toLowerCase(); // Name column (1st column)
          const vorname = row.cells[1].textContent.toLowerCase(); // Vorname column (2nd column)
          const email = row.cells[2].textContent.toLowerCase(); // Email column (3rd column)
          const postadresse = row.cells[3].textContent.toLowerCase(); // Postadresse column (4th column)

          // Check if the search value matches any of the columns' text content
          if (name.includes(searchValue) || vorname.includes(searchValue) || email.includes(searchValue) || postadresse.includes(searchValue)) {
            row.style.display = ''; // Show the row if it matches
          } else {
            row.style.display = 'none'; // Hide the row if it doesn't match
          }
        });
      });
    });
  </script>

<?php
}
?>