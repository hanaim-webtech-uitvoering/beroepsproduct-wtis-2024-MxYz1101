<!-- DINGEN DIE JE KAN BESTELLEN OP DE PIZZERIA WEBSITE-->
<?php
require_once 'db_connectie.php';

$db = maakVerbinding();
session_start();

$query = 'SELECT [type_id] AS [Product Type], 
                 [name] AS Naam,
                 price AS Prijs 
                 FROM Product';

$data = $db->query($query);

// Prepare the menu content
$menu_content = '<div class="menu-container">';

while($rij = $data->fetch()) {
    $product_type = $rij['Product Type'];
    $naam = $rij['Naam'];    $prijs = $rij['Prijs'];
    

    // Append each product as a "card" to the menu content
    $menu_content .= "
    <div class='menu-item'>
        <h3>$naam</h3>
        <p>Type: $product_type</p>
        <p>Prijs: €$prijs</p>
        <form action='Winkelmandje.php' method='post'>
            <label for='quantity-$naam'>Hoeveelheid:</label>
            <input type='number' id='quantity-$naam' name='quantity' min='1' max='20' value='1'>
            <input type='hidden' name='product' value='$naam'>
            <input type='hidden' name='price' value='$prijs'>
            <br>
            <button type='submit'>Toevoegen aan winkelmandje</button>
        </form>
    </div>";
}
?>

<!-- DINGEN DIE JE KAN BESTELLEN OP DE PIZZERIA WEBSITE-->

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
        <h2> Ons Menu </h2>
        <div class= "menu-container"> 
            <?php echo $menu_content; ?>
        </div>               
    </main>

    <?php require 'functies/Footer.php'; ?>
</body>
</html>