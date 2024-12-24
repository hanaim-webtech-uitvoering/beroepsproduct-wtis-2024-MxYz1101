<!--VOOR PERSONEELLID: Dingen die in detail pagina moeten staan
        (1)Detail van actieve bestelling
        (2)Hoort ook bij Bestellingoverzicht
        (3) Kan bestellingen aanpassen (zoals, besteld, of anuleren)
        (4) Wat er besteld is, totaalprijs.
    -->

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Sole Machina</title>

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
        <h2> Status van bestellingen: </h2>
    <table>
        <tr>
            <th>Datum: </th>
            <th>Bestellingnr: </th>
            <th>Klant: </th>
            <th>Medewerker: </th>
            <th>Status: </th>
        </tr>
        <tr>
            <td>11/11/2024</td>
            <td><a href="DetailoverzichtBestelling.php">00001</a></td>
            <td>gil023 </td>
            <td>Maria T </td>
            <td>in de oven </td>
        </tr>
        <tr>
            <td>..</td>
            <td>.. </td>
            <td>.. </td>
            <td>.. </td>
            <td>bezorgd </td>
        </tr>
        <tr>
            <td>..</td>
            <td>.. </td>
            <td>.. </td>
            <td>.. </td>
            <td>bezorgd </td>
        </tr>
    </table>
    </main>
    <footer>
            <a href="Privacyverklaring.php"> link naar privacy verklaring.</a>
    </footer>
</body>
</html>