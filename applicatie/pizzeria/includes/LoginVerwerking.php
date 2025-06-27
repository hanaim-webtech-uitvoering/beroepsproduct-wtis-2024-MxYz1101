<?php
session_start();

require_once 'db_connectie.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gebruikersnaam = trim($_POST['gebruikersnaam']);
    $wachtwoord = $_POST['wachtwoord'];

    $db = maakVerbinding();

    $sql = "SELECT * FROM [User] WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->execute([':username' => $gebruikersnaam]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($wachtwoord, $user['password'])) {
        //sessie om op te slaan:
        $_SESSION['gebruiker'] = [
            'gebruikersnaam' => $user['username'],
            'rol' => $user['role'],
            'voornaam' => $user['first_name'],
            'achternaam' => $user['last_name']
        ];

        header('Location: Profiel.php');
        exit;
    } else {
        $foutmelding = "Gebruikersnaam of wachtwoord onjuist.";
    }
}
?>