<?php
function userAdministrationTable() {
  // Database connection settings
  global $wpdb;

  // Fetch data from the 'employees' table
  $table_name = 'users'; // Add table prefix for WordPress compatibility
  $employees = $wpdb->get_results("SELECT * FROM $table_name");
}
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
                    echo '<th class="border border-slate-300 ' . htmlspecialchars($key) . '">' . htmlspecialchars($label) . '</th>';
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
            if (!empty($users)) {
              foreach ($users as $user): ?>
                <tr data-id="<?php echo htmlspecialchars($user->id); ?>">
                  <td><?php echo htmlspecialchars($user->name ?? ''); ?></td>
                  <td><?php echo htmlspecialchars($user->vorname ?? ''); ?></td>
                  <td><?php echo htmlspecialchars($user->email ?? ''); ?></td>
                  <td><?php echo htmlspecialchars($user->rolle ?? ''); ?></td>

                  <td>
                    <div class="flex flex-row gap-4">
                      <button id="deleteUserButton"
                        class="flex justify-center items-center w-24 h-16 bg-red-500 border rounded-xl hover:bg-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                      </button>

                    </div>

                    <!-- EdituserDialog -->
                    <?php
                    // Generate a unique ID for the edit dialog
                    $editDialogId = 'editDialog-' . htmlspecialchars($user->id);
                    $userData = [
                      'id' => $user->id,
                      'name' => $user->name ?? '',
                      'vorname' => $user->vorname ?? '',
                      'email' => $user->email ?? '',
                      'rolle' => $user->rolle ?? '',
                    ];

                    include 'EditUserDialog.php';
                    ?>

                  </td>
                </tr>
              <?php endforeach; ?>

            <?php
            } else {
              echo '<tr><td colspan="5">keine Daten gefunden</td></tr>';
            }
            ?>
          </tbody>
        </table>
      </div>