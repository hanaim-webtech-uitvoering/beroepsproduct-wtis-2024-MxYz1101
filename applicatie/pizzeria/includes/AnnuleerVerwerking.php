<?php
session_start();
require_once '../db_connectie.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    $db = maakVerbinding();

    // Je kunt ook verwijderen, maar ik zet het op status 0, kan weer terug gehaald worden.
    $stmt = $db->prepare("UPDATE pizza_order SET status = 0 WHERE order_id = :order_id");
    $stmt->execute(['order_id' => $order_id]);

    header('Location: ../BestellingOverzicht.php');
    exit;
}
?>
