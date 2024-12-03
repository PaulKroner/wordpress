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

<?php
}
?>