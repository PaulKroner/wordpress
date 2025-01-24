<?php
function SelectRowSort()
{
  $options = [
    "name" => "Name",
    "vorname" => "Vorname",
    "email" => "Email",
    "postadresse" => "Postadresse",
  ];
  ?>
  <div>
    <div class="relative mt-2">
      <input type="hidden" id="selected-value" name="value" value="">
      <button id="dropdown-button" type="button" class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm" aria-haspopup="listbox" aria-expanded="false">
        <span id="selected-option" class="block truncate">Sortiere nach</span>
        <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
          <svg class="size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z" clip-rule="evenodd" />
          </svg>
        </span>
      </button>
      <ul id="dropdown-list" class="hidden absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox">
        <?php foreach ($options as $value => $label): ?>
          <li class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" data-value="<?= $value ?>" role="option">
            <span class="block truncate"><?= htmlspecialchars($label) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const dropdownButton = document.getElementById('dropdown-button');
      const dropdownList = document.getElementById('dropdown-list');
      const selectedOption = document.getElementById('selected-option');
      const selectedValueInput = document.getElementById('selected-value');

      // Toggle dropdown visibility
      dropdownButton.addEventListener('click', () => {
        dropdownList.classList.toggle('hidden');
      });

      // Handle selection
      dropdownList.addEventListener('click', (event) => {
        const option = event.target.closest('li');
        if (!option) return;

        const value = option.getAttribute('data-value');
        const label = option.textContent;

        // Update hidden input and display selected option
        selectedValueInput.value = value;
        selectedOption.textContent = label;

        // Close the dropdown
        dropdownList.classList.add('hidden');
      });

      // Close dropdown when clicking outside
      document.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownList.contains(event.target)) {
          dropdownList.classList.add('hidden');
        }
      });
    });
  </script>
  <?php
}
