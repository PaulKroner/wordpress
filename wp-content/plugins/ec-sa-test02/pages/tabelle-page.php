<?php

function mitarbeiter_tabelle_page() {
    if (!is_user_logged_in()) {
        return 'Bitte loggen Sie sich ein, um die Tabelle zu sehen.';
    }

    ob_start();
    ?>
    <div>
        <h1>Mitarbeiter Tabelle</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Max Mustermann</td>
                <td>Entwickler</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Maria Musterfrau</td>
                <td>Designer</td>
            </tr>
        </table>
    </div>
    <?php
    return ob_get_clean();
}
