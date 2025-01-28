<?php
/**
 * Plugin Name: Mitarbeiter Dashboard
 * Description: Erstellt ein Dashboard für Mitarbeiter und eine Tabelle im WordPress-Admin-Bereich.
 * Version: 1.0
 * Author: Dein Name
 */

// Verhindere direkten Zugriff auf das Plugin
if (!defined('ABSPATH')) {
    exit;
}

// Admin-Menüpunkte hinzufügen
function mitarbeiter_dashboard_menu() {
    // Hauptmenüpunkt (Startseite)
    add_menu_page(
        'Mitarbeiter Dashboard',         // Seitenname
        'Mitarbeiter',                   // Menüname
        'manage_options',                // Berechtigungen
        'mitarbeiter_dashboard',         // Slug
        'mitarbeiter_dashboard_page',    // Callback für die Hauptseite
        'dashicons-admin-users',         // Icon
        6                                // Position im Admin-Menü
    );

    // Untermenüpunkt (Tabelle)
    add_submenu_page(
        'mitarbeiter_dashboard',         // Parent-Slug
        'Mitarbeiter Tabelle',           // Seitenname
        'Tabelle',                       // Menüname
        'manage_options',                // Berechtigungen
        'mitarbeiter_tabelle',           // Slug
        'mitarbeiter_tabelle_page'       // Callback für die Tabelle
    );
}
add_action('admin_menu', 'mitarbeiter_dashboard_menu');

// Callback-Funktion: Mitarbeiter Dashboard (Startseite)
function mitarbeiter_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Mitarbeiter Dashboard</h1>
        <p>Willkommen im Mitarbeiter-Dashboard!</p>
        <p>Hier könnten Statistiken oder allgemeine Informationen zu den Mitarbeitern stehen.</p>
        <button onclick="window.location.href='<?php echo admin_url('admin.php?page=mitarbeiter_tabelle'); ?>'" class="button button-primary">
            Zur Tabelle
        </button>
    </div>
    <?php
}

// Callback-Funktion: Mitarbeiter Tabelle
function mitarbeiter_tabelle_page() {
    ?>
    <div class="wrap">
        <h1>Mitarbeiter Tabelle</h1>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Abteilung</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Max Mustermann</td>
                    <td>Entwickler</td>
                    <td>IT</td>
                </tr>
                <tr>
                    <td>Maria Musterfrau</td>
                    <td>Projektleiterin</td>
                    <td>Marketing</td>
                </tr>
                <tr>
                    <td>Thomas Müller</td>
                    <td>Designer</td>
                    <td>Design</td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}
