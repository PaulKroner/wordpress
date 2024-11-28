<?php
function SelectRowSort()
{
  // $select_path = plugin_dir_path(__FILE__) . '../ui/select.php';
  // include $select_path;
  select('selectRowSort', 'Sortiere nach', [
    "name" => "Name",
    "vorname" => "Vorname",
    "email" => "Email",
    "postadresse" => "Postadresse",
  ]);
}