<?php
function input($type, $name, $id, $placeholder)
{
?>
  <div>
    <div class="relative mt-2 rounded-md shadow-sm">
      <input
        type="<?php echo htmlspecialchars($type); ?>"
        name="<?php echo htmlspecialchars($name); ?>"
        id="<?php echo htmlspecialchars($id); ?>"
        class="block w-60 p-2 border-2 rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" ,
        placeholder="<?php echo htmlspecialchars($placeholder); ?>">
    </div>
  </div>
<?php
}
?>