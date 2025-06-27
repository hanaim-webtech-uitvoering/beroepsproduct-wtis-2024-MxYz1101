<!--
Details van een bestelling inzien voor bijvoorbeeld een bezorger
-->
<?php
session_start();
require_once 'db_connectie.php';

if (!isset($_SESSION['gebruiker']) || $_SESSION['gebruiker']['rol'] !== 'Personnel') {
    header("Location: Login.php");
}

if (!isset($_GET['order_id'])) {
    echo "Geen bestelling gespecificeerd.";
}

$order_id = $_GET['order_id'];

$db = maakVerbinding();

// Haal bestelling op via order_id:
$stmt = $db->prepare("
    SELECT 
        pop.product_name, 
        pop.quantity, 
        pr.type_id
    FROM pizza_order_product pop
    JOIN product pr ON pop.product_name = pr.name
    WHERE pop.order_id = :order_id
");
$stmt->execute(['order_id' => $order_id]);
$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);

$adresStmt = $db->prepare("SELECT address, status FROM pizza_order WHERE order_id = :order_id");
$adresStmt->execute(['order_id' => $order_id]);
$bestellingInfo = $adresStmt->fetch(PDO::FETCH_ASSOC);
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
        <table>
            <tr>
                <th>Producten: </th>
                <th>Type:</th>
                <th>Aantal: </th>
            </tr>
            <?php foreach ($producten as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['product_name']) ?></td>
                <td><?= htmlspecialchars($p['type_id']) ?></td>
                <td><?= (int)$p['quantity'] ?></td>
            </tr>
            <?php endforeach; ?>
            </table>
    <h2> Bezorgen naar:</h2>
    <table>
        <tr>
            <th>Adres</th>
            <th>Status</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($bestellingInfo['address']) ?></td>
            <td><?= htmlspecialchars($bestellingInfo['status']) ?></td>
        </tr>
    </table>
        <a href="Bestellingoverzicht.php">Terug naar bestellingen overzicht</a>
</main>

<?php require 'functies/Footer.php'; ?>

</body>
</html>