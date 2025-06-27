    <!--
Registratie en login voor medewerker EN klant
KLANT: Kan zijn bestelling status zien (onderweg, in de oven ect.), ADRES REGISTREREN
PERSONEEL: Om bestellingen van klant te beheren, volgende ->detailpagina.
-->
<?php
require_once 'db_connectie.php';
session_start();

$db = maakVerbinding();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['gebruikersnaam'];
    $password = $_POST['wachtwoord'];
    $role     = $_POST['rol'];

    $stmt = $db->prepare("SELECT * FROM [User] WHERE username = :gebruikersnaam AND role = :rol");
    $stmt->execute([
        ':gebruikersnaam' => $username,
        ':rol'     => $role
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['gebruiker'] = [
            'gebruikersnaam' => $user['username'],
            'rol' => $user['role']
];

        // Redirect op basis van rol
        if ($role === 'Client') {
            header("Location: Profiel.php");
        } elseif ($role === 'Personnel'){
            header("Location: BestellingOverzicht.php");
        }
    } else {
        // Bij fout: terug naar login met foutmelding
        $_SESSION['login_error'] = "Ongeldige gebruikersnaam, wachtwoord of rol.";
        header("Location: Registratie.php");
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
        <div class="login-form">    
        <form method="post" action="">
            <h3>Login</h3>
            <label>gebruikersnaam</label> 
            <input type="text" id="gebruikersnaam" name="gebruikersnaam" required><br>
            <label>wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>
            <select name="rol" required>
                <option value="Client">Klant</option>
                <option value="Personnel">Medewerker</option>
            </select>
            <button>Log in</button>
        </form>
        </div>
    </main>    
    <?php require 'functies/Footer.php'; ?>
</body>
</html>
