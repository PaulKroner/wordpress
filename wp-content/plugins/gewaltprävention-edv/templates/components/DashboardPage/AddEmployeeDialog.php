<?php
// Function to display the button and include the dialog
function addEmployeeDialog()
{

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
      'disabled' => true,
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
      'label' => 'Grundlagenschulung Ablaufdatum',
      'type' => 'date',
      'required' => false,
      'disabled' => true,
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

  <div>
    <button
      id="addEmployeeDialog"
      type="button"
      class="mt-2 bg-blue-500 hover:bg-blue-700 text-white inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto"
      onclick="showDialog()">
      Mitarbeiter hinzufügen
    </button>

    <!-- Dialog container -->
    <div>
      <div id="dialog-overlay" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div id="dialog-content" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
          style="max-height: 85vh; overflow-y: auto;">
          <!-- Close Button -->
          <div class="absolute top-2 right-2">
            <svg id="close-dialog" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-gray-500 hover:text-gray-700">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </div>

          <!-- Dialog Content -->
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold text-gray-900" id="modal-title">Mitarbeiter hinzufügen</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">
                    Hier können Sie einen neuen Mitarbeiter hinzufügen
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
                        <!-- Include postalAdress.php if the field id is postaladress -->
                        <div class="grid grid-cols-6 items-center gap-4">
                          <label for="postadresse" class="col-span-2">Postadresse</label>

                          <?php if (get_current_user_id() && current_user_can('administrator')) : // Check if user is authenticated and has admin role 
                          ?>
                            <!-- Street Input -->
                            <input type="text" id="street" name="postal_data[street]" value="<?php echo esc_attr(isset($postal_data['street']) ? $postal_data['street'] : ''); ?>" class="col-span-2" placeholder="Straße" />

                            <!-- House Number Input -->
                            <input type="text" id="housenumber" name="postal_data[housenumber]" value="<?php echo esc_attr(isset($postal_data['housenumber']) ? $postal_data['housenumber'] : ''); ?>" class="col-span-1" placeholder="Nr." />

                            <!-- Empty div for spacing -->
                            <div class="col-span-2"></div>
                          <?php endif; ?>

                          <!-- ZIP Code Input -->
                          <input type="text" id="zip" name="postal_data[zip]" value="<?php echo esc_attr(isset($postal_data['zip']) ? $postal_data['zip'] : ''); ?>" class="col-span-1" placeholder="PLZ" />

                          <!-- City Input -->
                          <input type="text" id="city" name="postal_data[city]" value="<?php echo esc_attr(isset($postal_data['city']) ? $postal_data['city'] : ''); ?>" class="col-span-2" placeholder="Ort" />

                          <?php if (get_current_user_id() && current_user_can('administrator')) : // Check if user is authenticated and has admin role 
                          ?>
                            <!-- Empty div for spacing -->
                            <div class="col-span-2"></div>

                            <!-- Additional Input -->
                            <input type="text" id="additional" name="postal_data[additional]" value="<?php echo esc_attr(isset($postal_data['additional']) ? $postal_data['additional'] : ''); ?>" class="col-span-2" placeholder="Zusatz" />
                          <?php endif; ?>
                        </div>
                      <?php else: ?>
                        <div class="grid grid-cols-3 items-center gap-4">
                          <label for="<?php echo esc_attr($field['id']); ?>"
                            class="<?php echo $field['required'] ? 'after:content-[\'*\'] after:ml-0.5 after:text-red-500' : ''; ?>">
                            <?php echo esc_html($field['label']); ?>
                          </label>
                          <input
                            type="<?php echo esc_attr($field['type']); ?>"
                            id="<?php echo esc_attr($field['id']); ?>"
                            name="<?php echo esc_attr($field['id']); ?>"
                            placeholder="<?php echo isset($field['placeholder']) ? esc_attr($field['placeholder']) : ''; ?>"
                            <?php echo $field['required'] ? 'required' : ''; ?>
                            <?php echo isset($field['disabled']) && $field['disabled'] ? 'disabled' : ''; ?> />

                          <?php if ($field['id'] === 'fz_eingetragen'): ?>
                            <!-- more information icon -->
                            <div class="text-sm">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                              </svg>

                              <span class="flex flex-row items-center">
                                <div>Klicken sie auf </div>
                                <span class="ml-1"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                  <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                </svg>

                                <div>, um</div>
                              </span>
                              <div>ein Datum einzugeben</div>
                            </div>
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
            <button type="submit" id="submit-button" class="bg-blue-500 hover:bg-blue-700 text-white inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto">Mitarbeiter hinzufügen</button>
            <button type="button" id="cancel-dialog" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">abbrechen</button>
          </div>
        </div>
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

     
    });
  </script>
<?php
}
?>