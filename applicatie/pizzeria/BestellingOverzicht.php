<!--VOOR PERSONEELLID: Dingen die in detail pagina moeten staan
        (1)Detail van actieve bestelling
        (2)Hoort ook bij Bestellingoverzicht
        (3) Kan bestellingen aanpassen (zoals, besteld, of anuleren)
        (4) Wat er besteld is, totaalprijs.
    -->
<?php
session_start();
require_once 'db_connectie.php';
require_once 'functies/BestellingFuncties.php';
require_once 'functies/BestelStatusKnop.php';

if (!isset($_SESSION['gebruiker']) || $_SESSION['gebruiker']['rol'] !== 'Personnel') {
    header("Location: Login.php");
}

$db = maakVerbinding();
$bestellingen = haalAlleBestellingenOp($db);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Sole Machina</title>

    <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <?php require 'functies/Header.php'; ?>
    
    <main>
        <form method="post" action="includes/LoguitVerwerking.php">
            <button type="submit">Log uit</button>
        </form>
        <h2> Status van bestellingen: </h2>
    <table>
        <tr>
            <th>Datum: </th>
            <th>Bestellingnr: </th>
            <th>Klant: </th>
            <th>Medewerker: </th>
            <th>Status: </th>
            <th>Totale Prijs:</th>
            <th>Actie</th>
        </tr>
<!-- Bestellingen overzicht in tabel: -->
        <?php foreach ($bestellingen as $b): ?>
            <tr>
                <td><?= date('d/m/Y H:i', strtotime($b['datetime'])) ?></td>
                <td>
                    <a href="DetailOverzicht.php?order_id=<?= $b['order_id'] ?>">
                        <?= str_pad($b['order_id'], 5, '0', STR_PAD_LEFT) ?>
                    </a>
                </td>
                <td><?= htmlspecialchars($b['client_name']) ?></td>
                <td><?= htmlspecialchars($b['personnel_username']) ?></td>
                <td><?= geefStatusKnopForm($b['order_id'], $b['status']) ?></td>
                <td>€ <?= number_format(berekenTotaalPrijs($db, $b['order_id']), 2, ',', '.') ?></td>
                <td>
                    <form method="POST" action="includes/AnnuleerVerwerking.php">
                        <input type="hidden" name="order_id" value="<?= $b['order_id'] ?>">
                        <button type="submit"> Annuleer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    </main>
    <?php require 'functies/Footer.php'; ?>
</body>
</html>