<?php
require_once 'db_connectie.php';
require_once 'functies/BestellingFuncties.php';

$db = maakVerbinding();
session_start();

//is er een mand?
if (!isset($_SESSION['mand']) || !is_array($_SESSION['mand'])) {
    $_SESSION['mand'] = [];
}

//is gebruiker ingelogd?
if (!isset($_SESSION['gebruiker'])) {
    header("Location: Login.php");
}
$klant_gebruikernaam = $_SESSION['gebruiker']['gebruikersnaam'];

// Functie voor het bijwerken van de hoeveelheid in de winkelmand
function updateQuantity($product, $action) {
    if (isset($_SESSION['mand'][$product])) {
        $current_quantity = $_SESSION['mand'][$product]['quantity'];
        
        // Verhoog of verlaag de hoeveelheid op basis van de actie
        if ($action === 'plus') {
            $_SESSION['mand'][$product]['quantity'] = $current_quantity + 1;
        } elseif ($action === 'minus' && $current_quantity > 1) {
            $_SESSION['mand'][$product]['quantity'] = $current_quantity - 1;
        }
    }
}
// Functie voor het berekenen van de totale prijs van de winkelmand
function calculateTotal($mand) {
    $total = 0;
    if(is_array($mand)){
        foreach ($mand as $details) {
            $total += $details['quantity'] * $details['price'];
        }
    }
    return $total;
}

// Functie om een nieuw order_id te genereren
function getNewOrderId($db) {
    // Haal het hoogste bestaande order_id op en verhoog dit met 1
    $query = "SELECT MAX(order_id) AS max_order_id FROM Pizza_Order_Product";
    $result = $db->query($query);
    $row = $result->fetch();
    return $row['max_order_id'] ? $row['max_order_id'] + 1 : 1;
}

// Functie om de bestelling toe te voegen aan de database
function addOrderToDatabase($db, $order_id, $mand) {
    foreach ($mand as $product => $details) {
        $stmt = $db->prepare("INSERT INTO Pizza_Order_Product (order_id, product_name, quantity) VALUES (:order_id, :product_name, :quantity)");

        $stmt->execute([
            ':order_id' => $order_id,
            ':product_name' => $product,
            ':quantity' => $details['quantity']
        ]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['annuleer_bestelling'])) {
    unset($_SESSION['mand']);
    header("Location: Menu.php");
}

if (!isset($_SESSION['mand']) || !is_array($_SESSION['mand'])) {
    $_SESSION['mand'] = [];
}

$bestelling_bevestigd = false;

// **Bestelling Plaatsen**
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bestelling_plaatsen'])) {
    if (!empty($_SESSION['mand'])) {
        $address = $_POST['address'] ?? '';
        $new_order_id = voegBestellingToe($db, $klant_gebruikernaam, $address);
        addOrderToDatabase($db, $new_order_id, $_SESSION['mand']);
        unset($_SESSION['mand']);
        $bestelling_bevestigd = true;
    }
}

// **UPDATE HOEVEELHEID IN WINKELMAND**
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product']) && isset($_POST['action'])) {
    $product = $_POST['product'];
    $action = $_POST['action']; // 'plus' of 'minus'

    updateQuantity($product, $action);

    header("Location: Winkelmandje.php");
}


// **TOEVOEGEN AAN WINKELMAND**
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product'], $_POST['price'], $_POST['quantity'])) {
    $product = $_POST['product'];
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    if ($quantity > 0) {
        // Als het product al in de winkelmand zit, aantal verhogen
        if (isset($_SESSION['mand'][$product])) {
            $_SESSION['mand'][$product]['quantity'] += $quantity;
        } else {
            $_SESSION['mand'][$product] = ['quantity' => $quantity, 'price' => $price];
        }
    }

    // Redirect om te voorkomen dat formulier opnieuw wordt verzonden bij herladen
    header("Location: Winkelmandje.php");
}

// **VERWIJDEREN UIT WINKELMAND**
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verwijder'])) {
    $product = $_POST['product'];

    if (isset($_SESSION['mand'][$product])) {
        unset($_SESSION['mand'][$product]); // Verwijder product uit de winkelmand
    }

    // Redirect om herladen problemen te voorkomen
    header("Location: Winkelmandje.php");
}

$totaalPrijs = calculateTotal($_SESSION['mand']);
$mandItems = $_SESSION['mand'];
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
    <h2>Winkelmand: </h2>

    <table>
        <tr>
            <th>Product: </th>
            <th>Aantal: </th>
            <th>Prijs per stuk: </th>
            <th>Totaalprijs: </th>
            <th>Actie: </th>
        </tr>
        <?php if (!empty($mandItems)): ?>
            <?php foreach ($mandItems as $product => $details): ?>
                <?php 
                $subtotaal = $details['quantity'] * $details['price']; 
                ?>
                <tr>
                    <td><?= htmlspecialchars($product) ?></td>
                    <td>
                        <!-- Formulier voor het aanpassen van de hoeveelheid -->
                        <form method="post">
                            <input type="hidden" name="product" value="<?= htmlspecialchars($product) ?>">
                            <button type="submit" name="action" value="plus" class="quantity-button">+</button>
                            <?= $details['quantity'] ?>
                            <button type="submit" name="action" value="minus" class="quantity-button">-</button>
                        </form>

                    </td>
                    <td>€<?= number_format($details['price'], 2) ?></td>
                    <td>€<?= number_format($subtotaal, 2) ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="product" value="<?= htmlspecialchars($product) ?>">
                            <button type="submit" name="verwijder">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Totaal</strong></td>
                <td><strong>€<?= number_format($totaalPrijs, 2) ?></strong></td>
                <td></td>
            </tr>
        <?php else: ?>
            <tr><td colspan="5">Je winkelmandje is leeg.</td></tr>
        <?php endif; ?>
        </table>

        <div class="bestelling-annuleren">
            <form method="post">
                <button type="submit" name="annuleer_bestelling">Anuleer bestelling</button>
            </form>
        </div>

        <h2> Bestelling wordt bezorgt naar adres:</h2>
        <div class="bezorg-adres">
            <form method="post">
                <input name="address" type="text" placeholder="adres" />
            </form>
        </div>

        <?php if ($bestelling_bevestigd): ?>
            <p style="color: green;">Bestelling succesvol geplaatst!</p>
        <?php endif; ?>

        <div class="bestelling-bevestiging">
            <h2>Bevestig bestelling: </h2>
            <form method="post">
            <button type="submit" name="bestelling_plaatsen">Betalen</button>
            </form>
        </div>

    <?php require 'functies/Footer.php'; ?>
</body>
</html>
