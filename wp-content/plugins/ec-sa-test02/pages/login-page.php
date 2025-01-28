<?php

function mitarbeiter_login_page() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
        $username = sanitize_text_field($_POST['username']);
        $password = sanitize_text_field($_POST['password']);

        // Beispiel-Benutzerdaten (Anpassen mit tatsächlicher Authentifizierung)
        if ($username === 'admin' && $password === '123456') {
            // Benutzer als eingeloggt markieren
            wp_set_current_user(1); // 1 ist die Benutzer-ID (ändern je nach Anforderungen)
            wp_set_auth_cookie(1);
            wp_redirect(home_url('/mitarbeiter-tabelle'));
            exit;
        } else {
            echo '<div style="color: red;">Ungültige Anmeldedaten. Bitte erneut versuchen.</div>';
        }
    }

    ob_start(); // Verhindert unerwünschte Ausgaben
    ?>
    <div>
        <h1>Login</h1>
        <form method="POST" action="">
            <label for="username">Benutzername:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Passwort:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Einloggen</button>
        </form>
    </div>
    <?php
    return ob_get_clean(); // Gibt den Inhalt als Shortcode zurück
}
