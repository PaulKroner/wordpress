<?php

/**
 * ColumnSelection Component for WordPress
 *
 * This function renders a set of checkboxes allowing users to filter columns of the table.
 *
 * @param array $showNachweise An associative array containing boolean values to control the checked state of each checkbox.
 * @param callable $handleToggle A function that handles the checkbox toggle event.
 */
function column_selection($showNachweise, $handleToggle)
{
?>
  <section class="flex flex-col gap-4 p-4 border-2 rounded-2xl">
    <p class="flex justify-center">
      Wähle aus, was du filtern möchtest:
    </p>

    <div class="flex flex-col md:flex-row gap-4">
      <div class="flex flex-row gap-2">
        <label for="nachweis1">Führungszeugnis</label>
        <input
          type="checkbox"
          id="nachweis1"
          name="nachweis1"
          value=""
          <?php checked($showNachweise['nachweis1'], true); ?>
          onclick="handleToggle('nachweis1')" />
      </div>
      <div class="flex flex-row gap-2">
        <label for="nachweis2">Grundlagenschulung</label>
        <input
          type="checkbox"
          id="nachweis2"
          name="nachweis2"
          value=""
          <?php checked($showNachweise['nachweis2'], true); ?>
          onclick="handleToggle('nachweis2')" />
      </div>
      <div class="flex flex-row gap-2">
        <label for="nachweis3">Upgradeschulung</label>
        <input
          type="checkbox"
          id="nachweis3"
          name="nachweis3"
          value=""
          <?php checked($showNachweise['nachweis3'], true); ?>
          onclick="handleToggle('nachweis3')" />
      </div>
      <div class="flex flex-row gap-2">
        <label for="nachweis4">Selbstverpflichtungserklärung</label>
        <input
          type="checkbox"
          id="nachweis4"
          name="nachweis4"
          value=""
          <?php checked($showNachweise['nachweis4'], true); ?>
          onclick="handleToggle('nachweis4')" />
      </div>
    </div>
  </section>

  <script type="text/javascript">
    function handleToggle(checkboxName) {
      // Here, you would handle the toggle logic in JavaScript
      // Example: You can send an AJAX request to update the state of the checkbox
      console.log(checkboxName + " toggled");
    }
  </script>
<?php
}
