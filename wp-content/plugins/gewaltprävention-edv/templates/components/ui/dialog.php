<?php
function dialog()
{
?>
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
        <?php
        $form_path = plugin_dir_path(__FILE__) . '../ui/form.php';
        include $form_path;
        form("Mitarbeiter hinzufügen", "Hier können Sie einen neuen Mitarbeiter hinzufügen"); // Render the form here
        ?>
      </div>

      <!-- Dialog Footer -->
      <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto">Mitarbeiter hinzufügen</button>
        <button type="button" id="cancel-dialog" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">abbrechen</button>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const dialogOverlay = document.getElementById('dialog-overlay');
      const dialogContent = document.getElementById('dialog-content');
      const closeDialogButton = document.getElementById('close-dialog');
      const cancelDialogButton = document.getElementById('cancel-dialog');

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