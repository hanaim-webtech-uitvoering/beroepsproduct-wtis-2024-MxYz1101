<?php
require_once '../db_connectie.php';
session_start();

if (!isset($_SESSION['gebruiker']) || $_SESSION['gebruiker']['rol'] !== 'Personnel') {
    header("Location: ../Login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $huidige_status = $_POST['huidige_status'];

    //voor interactie met status:
    if ($huidige_status < 3) {
        $nieuwe_status = $huidige_status + 1;

        $db = maakVerbinding();
        $stmt = $db->prepare("UPDATE pizza_order SET status = :status WHERE order_id = :order_id");
        $stmt->execute([
            ':status' => $nieuwe_status,
            ':order_id' => $order_id
        ]);
    }

    header("Location: ../BestellingOverzicht.php");
}
?>