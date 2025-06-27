<?php
    //om van status 1, 2, 3 meer informatie terug te krijgen en kunnen interacteren:
    function geefStatusKnopForm($order_id, $status) {
    $kleur = 'gray';
    $tekst = 'Bestelling geplaatst';

    if ($status == 2) {
        $kleur = 'gold';
        $tekst = 'Bestelling koken';
    } elseif ($status == 3) {
        $kleur = 'green';
        $tekst = 'Bestelling compleet';
    } elseif ($status == 0){
        $kleur = 'red';
        $tekst = 'GEANULEERD';
    }

    $disabled = ($status >= 3) ? 'disabled' : '';
    
    return '
    <form method="POST" action="includes/StatusVerwerking.php" style="display:inline;">
        <input type="hidden" name="order_id" value="' . htmlspecialchars($order_id) . '">
        <input type="hidden" name="huidige_status" value="' . htmlspecialchars($status) . '">
        <button type="submit" style="background-color: ' . $kleur . '; color: white; border: none; padding: 5px 10px;" ' . $disabled . '>
            ' . $tekst . '
        </button>
    </form>';
}
?>