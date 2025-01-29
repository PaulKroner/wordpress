<div class="flex min-h-screen flex-col items-center justify-center p-24 bg-ec">
  <div class="relative bg-white h-full rounded-2xl p-12">
    <button class="absolute top-4 left-4 m-1" onclick="">
      <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-6">
        <path strokeLinecap="round" strokeLinejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
      </svg> -->
    </button>

    <form onSubmit="" class="flex flex-col justify-center items-center gap-4">

      <div class="flex justify-center items-center font-extrabold headline">
        Registrierung
      </div>

      <div class="w-64 flex flex-col gap-2">
        <label for="email"
          class=""
          placeholder="email@beispiel.com"
          value=""
          onchange=""
          class=""
          aria-label="E-Mail"
          required>
        </label>
      </div>

      <div class="w-64 flex flex-col gap-2">
        <label for="password" class="">
          Passwort
        </label>
        <input
          id="password"
          name="password"
          type="password"
          placeholder="********"
          value=""
          onchange=""
          class=""
          aria-label="Password"
          autocomplete="password"
          required />
      </div>

      <div class="mt-2 text-sm block w-64">
        <div class={`flex items-center ${passwordValidations.minLength ? 'text-green-500' : 'text-red-500' }`}>
          <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 mr-2">
            <path fillRule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clipRule="evenodd" />
          </svg> -->
          <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 mr-2">
            <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
          </svg> -->
          Mind. 6 Zeichen
        </div>

        <div class={`flex items-center ${passwordValidations.hasUpperCase ? 'text-green-500' : 'text-red-500' }`}>
          <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 mr-2">
            <path fillRule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clipRule="evenodd" />
          </svg> -->
          <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 mr-2">
            <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
          </svg> -->
          Mind. 1 Großbuchstaben
        </div>

        <div class={`flex items-center ${passwordValidations.hasSpecialChar ? 'text-green-500' : 'text-red-500' }`}>
          <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 mr-2">
            <path fillRule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clipRule="evenodd" />
          </svg> -->
          <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 mr-2">
            <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
          </svg> -->
          Mind. 1 Sonderzeichen (!@#$%^&*)
        </div>
      </div>

      <div class="w-64 flex flex-col gap-2">
        <label for="name" class="">
          Nachname
        </label>
        <input
          id="name"
          name="name"
          type="text"
          placeholder="Nachname"
          value=""
          onchange=""
          class=""
          aria-label="name"
          required />
      </div>

      <div class="w-64 flex flex-col gap-2">
        <label for="email" class="">
          Vorname
        </label>
        <input
          id="vorname"
          name="vorname"
          type="text"
          placeholder="Vorname"
          value=""
          onchange=""
          class=""
          aria-label="vorname"
          required />
      </div>

      <div class="w-64 flex flex-col gap-2">
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
          Rolle / Berechtigung
        </label>
        <select name="role-registration" id="role-registration">
        <option value="" disabled selected>Wählen Sie eine Rolle</option>
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </div>
      <div className="flex justify-center w-full mt-4">
        <button
          class="flex flex-row justify-center items-center bg-blue-500 text-white py-2 px-4 rounded-full w-64 text-3xl font-semibold shadow-lg shadow-neutral-500 disabled:opacity-50"
          type="submit">
          Registrieren
        </button>
      </div>

      <!-- <SubmitButton text={"registrieren"} loading={loading} /> -->
    </form>
  </div>
</div>