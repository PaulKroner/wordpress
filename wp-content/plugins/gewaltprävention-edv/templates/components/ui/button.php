<?php
function button($id, $text, $type, $onClick)
{
?>
  <button
    $id="<?= $id ?>"
    type="<?= $type ?>"
    class="mt-2 bg-blue-500 hover:bg-blue-700 text-white inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto"
    onclick="<?= $onClick ?>">
    <?= $text ?>
  </button>
<?php
}
?>