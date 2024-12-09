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
          <th class="border border-slate-300">Optionen</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Check if data exists
        if (!empty($employees)) {
        //   foreach ($employees as $employee) {
        //     echo '<tr>';
        //     echo '<td>' . htmlspecialchars($employee->name ?? '') . '</td>';
        //     echo '<td>' . htmlspecialchars($employee->vorname ?? '') . '</td>';
        //     echo '<td>' . htmlspecialchars($employee->email ?? '') . '</td>';
        //     echo '<td>' . htmlspecialchars($employee->postadresse ?? '') . '</td>';

        //     // Render nachweise columns dynamically
        //     foreach ($nachweise as $key => $columns) {
        //       if (!empty($showNachweise[$key])) {
        //         foreach ($columns as $field) {
        //           echo '<td>' . htmlspecialchars($employee->$field ?? '') . '</td>';
        //         }
        //       }
        //     }

        //     echo '<td>' . htmlspecialchars($employee->hauptamt ?? '') . '</td>';
        //     echo '<td>
        //             <div class="flex flex-row gap-4">
        //               <button id="deleteEmployeeButton" class="flex justify-center items-center w-24 h-16 bg-red-500 border rounded-xl hover:bg-red-600">
        //                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        //                   <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        //                 </svg>
        //               </button>
        //               <button class="flex justify-center items-center w-24 h-16 bg-white border rounded-xl hover:bg-gray-100">
        //                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        //                   <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        //                 </svg>
        //               </button>
        //             </div>
        //           </td>';
        //     echo '</tr>';
        //   }
          foreach ($employees as $employee): ?>
            <tr data-id="<?php echo htmlspecialchars($employee->id); ?>">
              <td><?php echo htmlspecialchars($employee->name ?? ''); ?></td>
              <td><?php echo htmlspecialchars($employee->vorname ?? ''); ?></td>
              <td><?php echo htmlspecialchars($employee->email ?? ''); ?></td>
              <td><?php echo htmlspecialchars($employee->postadresse ?? ''); ?></td>
              <?php
              foreach ($nachweise as $key => $columns) {
                if (!empty($showNachweise[$key])) {
                  foreach ($columns as $field) {
                    echo '<td>' . htmlspecialchars($employee->$field ?? '') . '</td>';
                  }
                }
              }
              ?>
              <td><?php echo htmlspecialchars($employee->hauptamt ?? ''); ?></td>
              <td>
                <?php
                echo '
              <div class="flex flex-row gap-4">
                      <button id="deleteEmployeeButton" class="flex justify-center items-center w-24 h-16 bg-red-500 border rounded-xl hover:bg-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                      </button>
                      <button class="flex justify-center items-center w-24 h-16 bg-white border rounded-xl hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                      </button>
                    </div>
              '
                ?>
              </td>
            </tr>
          <?php endforeach; ?>

        <?php
        } else {
          echo '<tr><td colspan="5">No data found</td></tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('search');
      const table = document.getElementById('dashboard-table');
      const deleteEmployeeButton = document.getElementById('deleteEmployeeButton');

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