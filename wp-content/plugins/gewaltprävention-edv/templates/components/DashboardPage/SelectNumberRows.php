<?php
function SelectNumberRows()
{
  $select_path = plugin_dir_path(__FILE__) . '../ui/select.php';
  include $select_path;
  select('selectRows', 'Zeilen', [
    5 => '5',
    10 => '10',
    20 => '20',
    50 => '50',
  ]);
}
