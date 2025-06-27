<!--VOOR KLANT: KAN ZIJN BESTELLINGEN ZIEN: OUDE BESTELLINGEN/LOPENDE BESTELLINGEN-->
<?php
require_once 'db_connectie.php';
require_once 'functies/KlantenFuncties.php';

session_start();


if(isset($_SESSION['gebruiker'])){
  $db = maakVerbinding();

  $client_username = $_SESSION['gebruiker']['gebruikersnaam']; 

  $query = "
      SELECT 
            o.order_id, 
            o.client_username, 
            o.client_name, 
            o.datetime, 
            o.status, 
            o.address, 
            p.product_name,
            p.quantity, 
            pr.price
      FROM pizza_order o
      JOIN pizza_order_product p ON o.order_id = p.order_id
      JOIN product pr ON p.product_name = pr.name  
      WHERE o.client_username = :client_username
      ORDER BY o.datetime DESC;
  ";

  $stmt = $db->prepare($query);
  $stmt->execute(['client_username' => $client_username]);

  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $html_table_huidige_bestellingen = geefKlantBestellingOverzicht($data);
} elseif (!isset($_SESSION['gebruiker'])) {
    //niet ingelogd -> terug naar login:
    header('Location: Login.php');
    exit;
}
$gebruikersnaam = $_SESSION['gebruiker']['gebruikersnaam'];
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
    <h2>Jouw bestellingen:</h2>
    <?= $html_table_huidige_bestellingen ?>
    <form method="post" action="includes/LoguitVerwerking.php">
        <button type="submit">Log uit</button>
    </form>
    </main>

    <?php require 'functies/Footer.php'; ?>
</body>
</html>