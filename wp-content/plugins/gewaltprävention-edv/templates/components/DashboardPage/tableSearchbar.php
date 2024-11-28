<?php
function tableSearchBar()
{
  $input_path = plugin_dir_path(__FILE__) . '../ui/input.php';
  include $input_path;
  input('text', 'search', 'search', 'Suche');
}
