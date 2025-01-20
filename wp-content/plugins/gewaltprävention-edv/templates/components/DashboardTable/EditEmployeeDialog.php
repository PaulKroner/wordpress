<?php

  $fields = [
    [
      'id' => 'name',
      'label' => 'Name',
      'type' => 'text',
      'placeholder' => 'Nachname',
      'required' => true,
    ],
    [
      'id' => 'vorname',
      'label' => 'Vorname',
      'type' => 'text',
      'placeholder' => 'Vorname',
      'required' => true,
    ],
    [
      'id' => 'email',
      'label' => 'E-Mail',
      'type' => 'email',
      'placeholder' => 'E-Mail',
      'required' => true,
    ],
    [
      'id' => 'postaladress',
      'label' => 'Postadresse',
    ],
    [
      'id' => 'fz_eingetragen',
      'label' => 'Führungszeugnis gültig ab',
      'type' => 'date',
      'required' => false,
    ],
    [
      'id' => 'fz_abgelaufen',
      'label' => 'Führungszeugnis Ablaufdatum',
      'type' => 'date',
      'required' => false,
      'disabled' => false,
    ],
    [
      'id' => 'fz_kontrolliert_first',
      'label' => 'Führungszeugnis kontrolliert von',
      'type' => 'text',
      'placeholder' => 'Max Mustermann',
      'required' => false,
    ],
    [
      'id' => 'fz_kontrolliert_second',
      'label' => 'Führungszeugnis kontrolliert von',
      'type' => 'text',
      'placeholder' => 'Max Mustermann',
      'required' => false,
    ],
    [
      'id' => 'fz_kontrolliert_am',
      'label' => 'Führungszeugnis kontrolliert am',
      'type' => 'date',
      'required' => false,
    ],
    [
      'id' => 'gs_eingetragen',
      'label' => 'Grundlagenschulung gültig ab',
      'type' => 'date',
      'required' => false,
    ],
    [
      'id' => 'gs_erneuert',
      'label' => 'Grundlagenschulung erneuert am',
      'type' => 'date',
      'required' => false,
    ],
    [
      'id' => 'gs_kontrolliert',
      'label' => 'Grundlagenschulung kontrolliert von',
      'type' => 'text',
      'placeholder' => 'Max Mustermann',
      'required' => false,
    ],
    [
      'id' => 'us_eingetragen',
      'label' => 'Upgradeschulung gültig ab',
      'type' => 'date',
      'required' => false,
    ],
    [
      'id' => 'us_abgelaufen',
      'label' => 'Upgradeschulung Ablaufdatum',
      'type' => 'date',
      'required' => false,
      'disabled' => false,
    ],
    [
      'id' => 'us_kontrolliert',
      'label' => 'Upgradeschulung kontrolliert von',
      'type' => 'text',
      'placeholder' => 'Max Mustermann',
      'required' => false,
    ],
    [
      'id' => 'sve_eingetragen',
      'label' => 'Selbstverpflichtungserklärung gültig ab',
      'type' => 'date',
      'required' => false,
    ],
    [
      'id' => 'sve_kontrolliert',
      'label' => 'Selbstverpflichtungserklärung kontrolliert von',
      'type' => 'text',
      'placeholder' => 'Max Mustermann',
      'required' => false,
    ],
    [
      'id' => 'hauptamt',
      'label' => 'Hauptamt',
      'type' => 'text',
      'placeholder' => 'Hauptamt',
      'required' => false,
    ]
  ];

?>

<button
  id="<?php echo htmlspecialchars($editDialogId); ?>"
  type="button"
  class="flex justify-center items-center w-24 h-16 bg-white border rounded-xl hover:bg-gray-100"
  onclick="document.getElementById('dialog-<?php echo htmlspecialchars($employeeData['id']); ?>').classList.remove('hidden')">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
  </svg>
</button>

<!-- Edit Employee Dialog -->
<div id="dialog-<?php echo htmlspecialchars($employeeData['id']); ?>" class="hidden fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
  <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
    <div class="absolute top-2 right-2">
      <!-- Close button -->
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-gray-500 hover:text-gray-700" onclick="document.getElementById('dialog-<?php echo htmlspecialchars($employeeData['id']); ?>').classList.add('hidden')">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
    <!-- Dialog Content -->
    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
      <h3 class="text-base font-semibold text-gray-900">Edit Employee</h3>
      <p>Editing employee: <?php echo htmlspecialchars($employeeData['name'] ?? 'Unknown'); ?></p>
      <!-- Add additional dialog form or content here -->
    </div>
  </div>
</div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const dialogOverlay = document.getElementById('dialog-overlay');
      const dialogContent = document.getElementById('dialog-content');
      const closeDialogButton = document.getElementById('close-dialog');
      const cancelDialogButton = document.getElementById('cancel-dialog');
      const submitButton = document.getElementById('submit-button');
      const fzEingetragenField = document.getElementById('fz_eingetragen');
      const fzAbgelaufenField = document.getElementById('fz_abgelaufen');
      const usEingetragenField = document.getElementById('us_eingetragen');
      const usAbgelaufenField = document.getElementById('us_abgelaufen');

      // Show the dialog
      window.showDialog = function() {
        dialogOverlay.classList.remove('hidden');
      };

      // Hide the dialog
      function hideDialog() {
        dialogOverlay.classList.add('hidden');
      }

      // Event listeners
      closeDialogButton.addEventListener('click', hideDialog);
      cancelDialogButton.addEventListener('click', hideDialog);

      dialogOverlay.addEventListener('click', function(event) {
        if (!dialogContent.contains(event.target)) {
          hideDialog();
        }
      });

      // Calculate and display `fz_abgelaufen` when `fz_eingetragen` is changed
      function calculateExpiry(inputField, outputField) {
        inputField.addEventListener('change', function() {
          const enteredDate = new Date(inputField.value);
          console.log(enteredDate);
          if (!isNaN(enteredDate)) {
            // Add 5 years
            enteredDate.setFullYear(enteredDate.getFullYear() + 5);

            // Format the new date as YYYY-MM-DD
            outputField.value = enteredDate.toISOString().split('T')[0];
          } else {
            outputField.value = ''; // Clear the field if invalid date
          }
        });
      }

      // Apply the function to the fields
      calculateExpiry(fzEingetragenField, fzAbgelaufenField);
      calculateExpiry(usEingetragenField, usAbgelaufenField);

    });
  </script>
<?php

?>