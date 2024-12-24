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
                    <li><a href="Menu.html">Menu</a></li>
                    <li><a href="Winkelmandje.html">Winkelmandje</a></li>
                    <li><a href="Profiel.html">Profiel</a></li>
                    <li><a href="Login.html">Login</a></li>
                    <li><a href="Registratie.html">Registratie</a></li>
                </ul> 
            </nav>
        </div>
    </header>
    <main>
    <div class="registratie-form">
        <form method="post" action="Profiel.html">
        <input name="name" type="text" placeholder="voornaam" required/>
        <input name="name" type="text" placeholder="achternaam" required/>
        <input name="email" type="email" placeholder="gebruiksnaam" required />
        <input name="password" type="password" placeholder="wachtwoord" required/>
        <input name="password" type="password" placeholder="wachtwoord bevestiging" required/>
        <input name="rol" type="text" placeholder="rol (klant/medewerker)" required/>
        <input name="adres" type="text" placeholder="adres"/>
        <a href="Profiel.html">register</a>
        </form>
        </div>
    </main>
    <footer>
            <a href="Privacyverklaring.html"> link naar privacy verklaring.</a>
    </footer>
</body>
</html>