<?php
$user = wp_get_current_user();
$userRole = (in_array('administrator', $user->roles)) ? 1 : 0; // 1 for admin, 0 for others
$isAuthenticated = is_user_logged_in();
$loading = false;
?>

<div class="flex items-center justify-between max-w-full px-4">

  <div class="flex items-center order-2">
    <a href="#" class="flex flex-row items-center gap-1.5 bg-blue-500 text-white py-2 px-4 rounded-3xl text-2xl font-semibold disabled:opacity-50"
      <?php if ($loading): ?> disabled <?php endif; ?>
      onclick="logoutAction(event)">

      <?php if ($loading): ?>
        <div class="w-6 h-6">
          <!-- Loading spinner code here, for example using Font Awesome or custom SVG -->
          <div class="spinner"></div>
        </div>
      <?php endif; ?>

      <p>Logout</p>
      <div class="flex justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
        </svg>
      </div>
    </a>
  </div>

  <div class="items-center justify-between w-full flex lg:w-auto order-1" id="mobile-menu-2">
    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
      <?php if (isset($userRole) && $userRole === 1 && isset($isAuthenticated) && $isAuthenticated === true): ?>
        <li>
          <a href="/registration" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-500 lg:p-0" aria-current="page">Benutzer registrieren</a>
        </li>
        <li>
          <a href="/userAdministration" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-500 lg:p-0">Benutzer verwalten</a>
      <?php endif; ?>
    </ul>
  </div>
</div>

<!-- does not work -->
<script>
  function logoutAction(event) {
    event.preventDefault();
    // Redirect to WordPress logout URL
    window.location.href = '<?php echo wp_logout_url(); ?>';
  }
</script>