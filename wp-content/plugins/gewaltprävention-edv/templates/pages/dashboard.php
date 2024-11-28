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

      <!-- table functionality container -->
      <div class="flex gap-6 w-full flex-col sm:gap-4 sm:flex-row items-center">
        <!-- Number of Rows -->
        <div class="sm:flex-shrink-0">
          <div class="flex flex-row gap-4">
            <!-- Replace with your SelectNumberRows component -->
            <?php
            $selectNumberRows_path = plugin_dir_path(__FILE__) . '../components/DashboardPage/SelectNumberRows.php';
            include $selectNumberRows_path;
            selectNumberRows();
            ?>

            <?php
            $selectRowSort_path = plugin_dir_path(__FILE__) . '../components/DashboardPage/SelectRowSort.php';
            include $selectRowSort_path;
            selectRowSort();
            ?>
          </div>
        </div>

        <!-- Searchbar -->
        <div class="flex gap-6 sm:gap-4 flex-col sm:flex-row sm:ml-auto">
          <!-- Replace with your TableSearchBar component -->
          <?php
          // Example: input field for search query
          ?>
          <!-- Add new employee -->
          <?php if ($userRole === 1 || $userRole === 2) : ?>
            <!-- Add employee dialog component -->
            <?php
            // Example: include AddEmployeeDialog component
            ?>
          <?php endif; ?>
        </div>
      </div>

      <!-- table -->
      <div class="max-w-full">
        <?php
        // Replace with your DashboardTable component
        // Example: use a loop or function to display the table data
        ?>
      </div>

    </div>

  </main>

  <footer>
    <?php include 'footer.php'; ?>
  </footer>
</body>

</html>