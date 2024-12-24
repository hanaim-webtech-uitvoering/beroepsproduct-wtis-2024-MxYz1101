    <!--
Registratie en login voor medewerker EN klant
KLANT: Kan zijn bestelling status zien (onderweg, in de oven ect.), ADRES REGISTREREN
PERSONEEL: Om bestellingen van klant te beheren, volgende ->detailpagina.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie of Login.</title>

    <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <header>
        <div class="container">
            <h1>Pizzeria Sole Machina</h1>
            <nav>
                <ul>
                    <li><a href="Menu.php">Menu</a></li>
                    <li><a href="Winkelmandje.php">Winkelmandje</a></li>
                    <li><a href="Profiel.php">Profiel</a></li>
                    <li><a href="Login.php">Login</a></li>
                    <li><a href="Registratie.php">Registratie</a></li>
                </ul>  
            </nav>
        </div>
    </header>
    <main>
    <div class="login-form">    
    <form method="post" action="Profiel.php">
        <h3>Login als klant</h3>
        <label>emailadres</label> 
        <input type="text" id="email" name="emailadres" required><br>
        <label>wachtwoord</label>
        <input type="password" id="wachtwoord" name="wachtwoord" required>
        <button>Log in als klant</button>
    </form>
    </div>
    <div class="login-form">
        <form method="post" action="Bestellingoverzicht.php">
            <h3>Login als medewerker</h3>
            <label for="gebruiksnaam">gebruiksnaam</label>
            <input type="text" id="gebruiksnaam" name="gebruiksnaam" required><br>
            <label for="wachtwoord">wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>
            <button>Log in als Medewerker</button>
        </form>
    </div>
    </main>
    <footer>
            <a href="Privacyverklaring.php"> link naar privacy verklaring.</a>
    </footer>
</body>
</html>
