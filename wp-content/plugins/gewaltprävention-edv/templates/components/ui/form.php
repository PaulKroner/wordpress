<?php
function form($title, $subtitle)
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
      'id' => 'fz_kontrlliert_am',
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
  ];
?>
  <!-- content -->
  <div class="sm:flex sm:items-start">
    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
      <h3 class="text-base font-semibold text-gray-900" id="modal-title"><?= $title ?></h3>
      <div class="mt-2">
        <p class="text-sm text-gray-500">
          <?= $subtitle ?>
        </p>
        <div class="flex flex-row text-sm text-gray-500">
          Achtung:
          <span class="ml-1"></span>
          <span class="after:content-['*'] after:ml-0.5 after:text-red-500">Felder</span>
          <span class="ml-1"></span>
          sind Pflichtfelder!
        </div>

        <section class="grid gap-3 py-4 text-sm">
          <?php foreach ($fields as $field): ?>
            <?php if ($field['id'] === 'postaladress'): ?>
              <!-- Include postalAdress.php if the field id is postaladress -->
              <?php
              $postalAdress_path = plugin_dir_path(__FILE__) . 'postalAdress.php';
              include $postalAdress_path;
              postalAdress();
              ?>
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

                    <span className="flex flex-row items-center">
                      <div>Klicken sie auf </div>
                      <span className="ml-1"></span>
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
        </section>

      </div>
    </div>
  </div>
<?php
}
?>