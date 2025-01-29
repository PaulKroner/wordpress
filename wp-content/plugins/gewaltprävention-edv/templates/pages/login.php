<?php
// get_header();
?>

<div class='flex min-h-screen flex-col items-center justify-center p-24 bg-ec '>
  <div class="bg-white h-full rounded-2xl p-12">
    <form class="flex flex-col justify-center items-center gap-6">
      <div class="flex justify-center items-center font-extrabold headline">
        Login
      </div>

      <div>
        <label htmlFor="email" class="block text-sm font-medium leading-6 text-gray-900">
          E-Mail-Adresse
        </label>
        <div class="relative mt-2 rounded-md shadow-sm">
          <input
            id="ec-email"
            name="email"
            type="email"
            placeholder="email@beispiel.com"
            value=""
            onchange=""
            class="block w-64 rounded-md border-0 py-1.5 pl-4 pr-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
            aria-label="Email address"
            autoComplete="email"
            required />
        </div>
      </div>

      <div>
        <label htmlFor="password" class="block text-sm font-medium leading-6 text-gray-900">
          Passwort
        </label>
        <div class="relative mt-2 rounded-md shadow-sm">
          <input
            id="password"
            name="password"
            type="password"
            placeholder="********"
            value=""
            onchange=""
            class="block w-64 rounded-md border-0 py-1.5 pl-4 pr-4 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
            aria-label="Password"
            autoComplete="password"
            required />
        </div>
      </div>

        <div className="flex justify-center w-full mt-4">
          <button
            class="flex flex-row justify-center items-center bg-blue-500 text-white py-2 px-4 rounded-full w-64 text-3xl font-semibold shadow-lg shadow-neutral-500 disabled:opacity-50"
            type="submit">
            Einloggen
          </button>
        </div>
    </form>
    <a href="" onclick="" class="flex justify-end mt-4 text-sm font-medium text-primary-600 hover:underline text-blue-500">Passwort zurücksetzen?</a>
  </div>
</div>