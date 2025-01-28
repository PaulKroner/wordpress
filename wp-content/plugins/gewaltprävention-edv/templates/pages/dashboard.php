<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gewaltprävention-EDV EC-SA</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <nav class="bg-white border-gray-200 py-2.5">
    <?php
    $navbar_path = plugin_dir_path(__FILE__) . '../components/Navbar/navbar.php';
    include $navbar_path;
    ?>
  </nav>
  <main class="bg-white h-full p-4 md:p-10 m-2 rounded-2xl">


    <div class="flex flex-col justify-center items-center gap-8">

      <h1 class="flex justify-center items-center font-extrabold headline"><?php _e('Dashboard', 'your-text-domain'); ?></h1>

      <!-- Column Selection -->
      <?php
      $showNachweise = [
        'nachweis1' => true,
        'nachweis2' => true,
        'nachweis3' => true,
        'nachweis4' => true,
      ];

      $column_selection_path = plugin_dir_path(__FILE__) . '../components/DashboardPage/ColumnSelection.php';
      include $column_selection_path;
      // call the function to render it
      column_selection($showNachweise, 'handleToggle');
      ?>

      <div class="flex gap-6 w-full flex-col sm:gap-4 sm:flex-row items-center">
        <!-- Number of Rows -->
        <div class="sm:flex-shrink-0">
          <div class="flex flex-row gap-4">
            <!-- SelectNumberRows -->
            <?php
            $selectNumberRows_path = plugin_dir_path(__FILE__) . '../components/dashboardPage/SelectNumberRows.php';
            include $selectNumberRows_path;
            selectNumberRows();
            ?>

            <!-- SelectRowSort -->
            <?php
            $selectRowSort_path = plugin_dir_path(__FILE__) . '../components/dashboardPage/SelectRowSort.php';
            include $selectRowSort_path;
            selectRowSort();
            ?>
          </div>
        </div>

        <div class="flex gap-6 sm:gap-4 flex-col sm:flex-row sm:ml-auto items">
          <!-- Searchbar -->
          <?php
          $tableSearchbar_path = plugin_dir_path(__FILE__) . '../components/dashboardPage/tableSearchbar.php';
          include $tableSearchbar_path;
          tableSearchBar();
          ?>
          <!-- Add new employee -->
          <?php if ($userRole === 1 || $userRole === 2) : ?>
            <?php
            $addEmployeeDialog_path = plugin_dir_path(__FILE__) . '../components/dashboardPage/AddEmployeeDialog.php';
            include $addEmployeeDialog_path;
            addEmployeeDialog();
            ?>
          <?php endif; ?>
        </div>
      </div>

      <!-- table -->
      <div class="max-w-full">
        <?php
        $dashboardTable_path = plugin_dir_path(__FILE__) . '../components/dashboardTable/dashboardTable.php';
        include $dashboardTable_path;
        dashboardTable($showNachweise);
        ?>
      </div>

    </div>

  </main>

  <footer>

  </footer>
</body>

</html>