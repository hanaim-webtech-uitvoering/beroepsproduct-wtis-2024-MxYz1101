<!--
Details van een bestelling inzien voor bijvoorbeeld een bezorger
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
        <table>
            <tr>
                <th>Bestellingnr: </th>
                <th>Productnr:</th>
                <th>Producten: </th>
                <th>Type:</th>
                <th>Aantal: </th>
                <th>In bestelling:</th>
            </tr>
            <tr>
                <td> 00001</td>
                <td>na13z</td>
                <td> Margaritha pizza</td>
                <td> Eten</td>
                <td> 1 </td>
                <td><button>+ </button> 1 <button> - </button></td>
            </tr>
            <tr>
                <td> </td>
                <td>na12x</td>
                <td> Cola</td>
                <td> Drank</td>
                <td> 2 </td>
                <td><button>+ </button> 1 <button> - </button></td>
            </tr>
            </table>
    <h2> Bezorgen naar:</h2>
    <table>
        <tr>
            <th>Bestellingnr: </th>
            <th>Adres: </th>
            <th>reistijd:</th>
            <th>Status: </th>
        </tr>
        <tr>
            <td>00001</td>
            <td>Arnhem, ruitenberglaan 26</td>
            <td> 16 min</td>
            <td><button class="bestelling-bevestiging">Bevestig volledig bestelling</button></td>
        </tr>
    </table>
        <a href="Bestellingoverzicht.php">Terug naar bestellingen overzicht</a>
</main>
<footer>
        <a href="Privacyverklaring.php"> link naar privacy verklaring.</a>
</footer>
</body>
</html>