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
    'label' => '',
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
<div id="dialog-<?php echo htmlspecialchars($employeeData['id']); ?>" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
  <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg" style="max-height: 85vh; overflow-y: auto;">
    <div class="absolute top-2 right-2">
      <!-- Close button -->
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-gray-500 hover:text-gray-700" onclick="document.getElementById('dialog-<?php echo htmlspecialchars($employeeData['id']); ?>').classList.add('hidden')">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
    <!-- Dialog Content -->
    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
      <div class="sm:flex sm:items-start">
        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
          <h3 class="text-base font-semibold text-gray-900" id="modal-title">Mitarbeiter bearbeiten</h3>
          <p><?php echo htmlspecialchars($editDialogId); ?></p>
          <div class="mt-2">
            <p class="text-sm text-gray-500">
              Hier können Sie einen neuen Mitarbeiter bearbeiten
            </p>
            <div class="flex flex-row text-sm text-gray-500">
              Achtung:
              <span class="ml-1"></span>
              <span class="after:content-['*'] after:ml-0.5 after:text-red-500">Felder</span>
              <span class="ml-1"></span>
              sind Pflichtfelder!
            </div>

            <form id="employee-form" class="grid gap-3 py-4 text-sm">
              <?php foreach ($fields as $field): ?>

                <?php if ($field['id'] === 'postaladress'): ?>
                  <!-- Include postal address fields dynamically -->
                  <div class="grid grid-cols-6 items-center gap-4">
                    <label for="postadresse" class="col-span-2">Postadresse</label>
                    <!-- Street Input -->
                    <input type="text" id="street-<?php echo esc_attr($employeeData['id']) ?>"
                      name="postal_data[street]"
                      value="<?php echo esc_attr(isset($employeeData['postal_data']['street']) ? $employeeData['postal_data'] : ''); ?>"
                      class="col-span-2"
                      placeholder="Straße"
                      oninput="this.value = this.value.replace(/[^a-zA-ZäöüÄÖÜß\s]/g, '')" />

                    <!-- House Number Input -->
                    <input type="text" id="housenumber-<?php echo esc_attr($employeeData['id']) ?>"
                      name="postal_data[housenumber]"
                      value="<?php echo esc_attr(isset($employeeData['postal_data']['housenumber']) ? $employeeData['postal_data']['housenumber'] : ''); ?>"
                      class="col-span-1"
                      placeholder="Nr." />

                    <!-- Empty div for spacing -->
                    <div class="col-span-2"></div>

                    <!-- ZIP Code Input -->
                    <input type="text" id="zip-<?php echo esc_attr($employeeData['id']) ?>"
                      name="postal_data[zip]"
                      value="<?php echo esc_attr(isset($employeeData['postal_data']['zip']) ? $employeeData['postal_data']['zip'] : ''); ?>"
                      class="col-span-1"
                      placeholder="PLZ" 
                      oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 5)" />

                    <!-- City Input -->
                    <input type="text" id="city-<?php echo esc_attr($employeeData['id']) ?>"
                      name="postal_data[city]"
                      value="<?php echo esc_attr(isset($employeeData['postal_data']['city']) ? $employeeData['postal_data']['city'] : ''); ?>"
                      class="col-span-2"
                      placeholder="Ort" 
                      oninput="this.value = this.value.replace(/[^a-zA-ZäöüÄÖÜß\s]/g, '')" />

                    <!-- Empty div for spacing -->
                    <div class="col-span-2"></div>

                    <!-- Additional Input -->
                    <input type="text" id="additional-<?php echo esc_attr($employeeData['id']) ?>"
                      name="postal_data[additional]"
                      value="<?php echo esc_attr(isset($employeeData['postal_data']['additional']) ? $employeeData['postal_data']['additional'] : ''); ?>"
                      class="col-span-2"
                      placeholder="Zusatz" />
                  </div>

                <?php elseif ($field['id'] === 'hauptamt'): ?>
                  <div class="grid grid-cols-3 items-center gap-4">
                    <label for="<?php echo esc_attr($field['id']); ?>"
                      class="<?php echo $field['required'] ? 'after:content-[\'*\'] after:ml-0.5 after:text-red-500' : ''; ?>">
                      <?php echo esc_html($field['label']); ?>
                    </label>
                    <section class="flex flex-row gap-4 justify-evenly">
                      <?php
                      $hauptamt = $employee->hauptamt ?? 0; // Assuming hauptamt is 0 or 1
                      $yesActive = $hauptamt == 1 ? 'bg-blue-500' : ''; // Yes button active when hauptamt = 1
                      $noActive = $hauptamt == 0 ? 'bg-blue-500' : ''; // No button active when hauptamt = 0
                      $yesSelected = $hauptamt == 1 ? 'true' : 'false'; // data-selected is true for Yes button when hauptamt = 1
                      $noSelected = $hauptamt == 0 ? 'true' : 'false';  // data-selected is true for No button when hauptamt = 0
                      ?>

                      <!-- Yes Button -->
                      <button id="yes-<?php echo esc_attr($employeeData['id']) ?>" type="button" class="flex justify-center items-center border rounded-xl w-16 p-2 hover:bg-blue-400 hauptamt-btn <?php echo $yesActive; ?>" data-selected="<?php echo $yesSelected; ?>">ja</button>
                      <!-- No Button -->
                      <button id="no-<?php echo esc_attr($employeeData['id']) ?>" type="button" class="flex justify-center items-center border rounded-xl w-16 p-2 hover:bg-blue-400 hauptamt-btn <?php echo $noActive; ?>" data-selected="<?php echo $noSelected; ?>">nein</button>
                    </section>
                  </div>

                <?php else: ?>
                  <div class="grid grid-cols-3 items-center gap-4">
                    <label for="<?php echo esc_attr($field['id']); ?>"
                      class="<?php echo $field['required'] ? 'after:content-[\'*\'] after:ml-0.5 after:text-red-500' : ''; ?>">
                      <?php echo esc_html($field['label']); ?>
                    </label>
                    <input
                      type="<?php echo esc_attr($field['type']); ?>"
                      id="<?php echo esc_attr($field['id'] . '-' . $employeeData['id']); ?>"
                      name="<?php echo esc_attr($field['id']); ?>"
                      value="<?php echo esc_attr(isset($employeeData[$field['id']]) ? $employeeData[$field['id']] : ''); ?>"
                      placeholder="<?php echo isset($field['placeholder']) ? esc_attr($field['placeholder']) : ''; ?>"
                      <?php echo $field['required'] ? 'required' : ''; ?>
                      <?php echo isset($field['disabled']) && $field['disabled'] ? 'disabled' : ''; ?> />

                    <?php if ($field['id'] === 'fz_eingetragen'): ?>
                      <div class="text-sm">
                        <span class="flex flex-row items-center">
                          <div>Klicken Sie auf </div>
                          <span class="ml-1"></span>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                          </svg>
                          <div>, um</div>
                        </span>
                        <div>ein Datum einzugeben</div>
                      </div>
                    <?php endif; ?>

                    <?php if ($field['id'] === 'fz_kontrolliert_first'): ?>
                      <span className="col-span-1 leading-none font-medium text-xs text-muted-foreground">
                        <div className="flex flex-col">
                          <div>Es müssen zwei Personen kontrolliert haben. Vor- und Nachname erforderlich!</div>
                        </div>
                      </span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>

            </form>

          </div>
        </div>
      </div>
    </div>

    <!-- Dialog Footer -->
    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
      <button
        type="submit"
        id="saveChangesButton-<?php echo htmlspecialchars($employeeData['id']); ?>"
        class="bg-blue-500 hover:bg-blue-700 text-white inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto">
        Änderungen speichern
      </button>
      <button
        type="button"
        id="cancelButton-<?php echo htmlspecialchars($employeeData['id']); ?>"
        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
        abbrechen
      </button>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {

    const dialogId = '<?php echo htmlspecialchars($employeeData['id']); ?>';
    const dialogOverlay = document.getElementById('dialog-' + dialogId);
    const dialogContent = document.getElementById('dialog-content-' + dialogId);
    const closeDialogButton = document.getElementById('close-dialog-' + dialogId);
    const cancelDialogButton = document.getElementById('cancelButton-' + dialogId);
    const submitButton = document.getElementById('saveChangesButton-' + dialogId);
    const fzEingetragenField = document.getElementById('fz_eingetragen-' + dialogId);
    const fzAbgelaufenField = document.getElementById('fz_abgelaufen-' + dialogId);
    const usEingetragenField = document.getElementById('us_eingetragen-' + dialogId);
    const usAbgelaufenField = document.getElementById('us_abgelaufen-' + dialogId);

    const postadresse = "<?php echo esc_js($employeeData['postal_data'] ?? ''); ?>";
    const parsedData = parsePostalAddress(postadresse);

    // Populate the fields with parsed data
    document.getElementById("street-<?php echo esc_attr($employeeData['id']) ?>").value = parsedData.street;
    document.getElementById("housenumber-<?php echo esc_attr($employeeData['id']) ?>").value = parsedData.housenumber;
    document.getElementById("zip-<?php echo esc_attr($employeeData['id']) ?>").value = parsedData.zip;
    document.getElementById("city-<?php echo esc_attr($employeeData['id']) ?>").value = parsedData.city;
    document.getElementById("additional-<?php echo esc_attr($employeeData['id']) ?>").value = parsedData.additional;

    // Hide the dialog
    function hideDialog() {
      dialogOverlay.classList.add('hidden');
    }

    if (cancelDialogButton) {
      cancelDialogButton.addEventListener('click', function() {
        document.getElementById('dialog-' + dialogId).classList.add('hidden');
      });
    } else {
      console.error("Button not found");
    }

    // Use event delegation to handle buttons and dialogs dynamically
    document.addEventListener('click', function(event) {
      const target = event.target;
      // Show the dialog
      if (target.classList.contains('show-dialog')) {
        dialogOverlay?.classList.remove('hidden');
      }
      // Hide the dialog
      if (target.classList.contains('hide-dialog')) {
        dialogOverlay?.classList.add('hidden');
      }
    });

    // Handle click outside dialog to close it
    document.addEventListener('click', function(event) {
      if (event.target === dialogOverlay) {
        dialogOverlay.classList.add('hidden');
      }
    });

    function calculateExpiry(inputField, outputField) {
      inputField.addEventListener('change', function() {
        const enteredDate = new Date(inputField.value);
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


  function parsePostalAddress(postadresse) {
    const postalData = {
      street: "",
      housenumber: "",
      zip: "",
      city: "",
      additional: "",
    };

    if (postadresse !== "keine Postadresse" && postadresse !== "") {
      const addressParts = postadresse.split(", ");

      if (addressParts.length >= 2) {
        const streetAndHouse = addressParts[0].split(" ");
        postalData.street = streetAndHouse.slice(0, -1).join(" ");
        postalData.housenumber = streetAndHouse[streetAndHouse.length - 1];

        const zipAndCity = addressParts[1].split(" ");
        postalData.zip = zipAndCity[0];
        postalData.city = zipAndCity.slice(1).join(" ");

        postalData.additional = addressParts.length > 2 ? addressParts[2] : "";

        // const streetAndHouse = addressParts[0].split(" ");
        postalData.street = streetAndHouse.slice(0, -1).join(" ").replace(/[^a-zA-Z\s]/g, ""); // Letters only
        postalData.housenumber = streetAndHouse[streetAndHouse.length - 1].replace(/[^0-9]/g, ""); // Numbers only

        // Validate zip and city
        // const zipAndCity = addressParts[1].split(" ");
        postalData.zip = zipAndCity[0].replace(/[^0-9]/g, "").slice(0, 5); // Numbers only, max length 5
        postalData.city = zipAndCity.slice(1).join(" ").replace(/[^a-zA-Z\s]/g, ""); // Letters only

        // Validate additional
        postalData.additional = addressParts.length > 2 ? addressParts[2].replace(/[^a-zA-Z0-9\s]/g, "") : ""; // Letters and numbers only

      }
    }

    return postalData;
  }
</script>