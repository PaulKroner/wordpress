<?php
/**
 * ColumnSelection Component for WordPress
 *
 * This function renders a set of checkboxes allowing users to filter columns of the table.
 *
 * @param array $showNachweise An associative array containing boolean values to control the checked state of each checkbox.
 * @param callable $handleToggle A function that handles the checkbox toggle event.
 */

function column_selection($showNachweise) {
?>
  <section class="flex flex-col gap-4 p-4 border-2 rounded-2xl">
    <p class="flex justify-center">
      Wähle aus, was du filtern möchtest:
    </p>

    <div class="flex flex-col md:flex-row gap-4">
      <?php
      $nachweise = [
        'nachweis1' => 'Führungszeugnis',
        'nachweis2' => 'Grundlagenschulung',
        'nachweis3' => 'Upgradeschulung',
        'nachweis4' => 'Selbstverpflichtungserklärung',
      ];

      foreach ($nachweise as $key => $label) {
        ?>
        <div class="flex flex-row gap-2">
          <label for="<?= $key ?>"><?= $label ?></label>
          <input
            type="checkbox"
            id="<?= $key ?>"
            name="<?= $key ?>"
            value=""
            <?php checked($showNachweise[$key], true); ?>
            onclick="handleToggle('<?= $key ?>')" />
        </div>
        <?php
      }
      ?>
    </div>
  </section>
  <script type="text/javascript">
    function handleToggle(checkboxName) {
      // showNachweise[checkboxName] = !showNachweise[checkboxName];
      console.log(checkboxName + " toggled");
    }
  </script>
<?php
}
?>
