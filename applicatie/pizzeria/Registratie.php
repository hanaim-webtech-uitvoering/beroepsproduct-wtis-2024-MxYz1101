<?php
require_once 'db_connectie.php';

$db = maakVerbinding();

$first_name = "";
$last_name = "";
$username = "";
$password = "";
$confirm_password = "";
$role = "";
$address = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];
    $address = trim($_POST['address']);

    if ($password !== $confirm_password) {
        $message = "Wachtwoorden komen niet overeen.";
    } else {
        // Maatregelen tegen het gevoelige datalek:
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Maatregelen tegen SQL-injection:
        $sql = "INSERT INTO [User] (username, password, first_name, last_name, role, address)
                VALUES (:username, :password, :first_name, :last_name, :role, :address)";

        $stmt = $db->prepare($sql);
        $success = $stmt->execute([
            ':username'    => $username,
            ':password'    => $hashed_password,
            ':first_name'  => $first_name,
            ':last_name'   => $last_name,
            ':role'        => $role,
            ':address'     => $address
        ]);

        if ($success) {
            $message = "Registratie succesvol!";
        } else {
            $message = "Er is iets misgegaan bij het registreren.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie of Login.</title>

    <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <?php require 'functies/Header.php'; ?>
    
    <main>
    <div class="registratie-form">
        <?php if ($message): ?>
            <p class="message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form method="post" action="">
    <input name="first_name" type="text" placeholder="voornaam" value="<?= $first_name ?>" required />
    <input name="last_name" type="text" placeholder="achternaam" value="<?= $last_name ?>" required />
    <input name="username" type="text" placeholder="gebruikersnaam" value="<?= $username ?>" required />
        <input name="password" type="password" placeholder="wachtwoord" required/>
    <!--    TWEEDE WW MOET OVEREENKOMEN MET DE EERSTE   -->
        <input name="confirm_password" type="password" placeholder="wachtwoord bevestiging" required/>
        <select name="role" required>
                    <option value="" disabled selected>Rol kiezen (Klant/Medewerker)</option>
                    <option value="Personnel" <?= ($role == 'Personnel') ? 'selected' : '' ?>>Medewerker</option>
                    <option value="Client" <?= ($role == 'Client') ? 'selected' : '' ?>>Klant</option>
        </select>
        <!-- Maatregelen tegen Cross-Site Scripting: -->
        <input name="address" type="text" placeholder="adres" value="<?= htmlspecialchars($address) ?>" />
        <button type="submit" name="register">Registreer</button>
        </form>
        </div>
    </main>

    <?php require 'functies/Footer.php'; ?>
</body>
</html>