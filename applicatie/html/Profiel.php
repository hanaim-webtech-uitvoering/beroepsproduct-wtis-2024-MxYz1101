<!--VOOR KLANT: KAN ZIJN BESTELLINGEN ZIEN: OUDE BESTELLINGEN/LOPENDE BESTELLINGEN-->

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
    <h2> Eerdere bestellingen:</h2>
    <table>
        <tr>
            <th>Datum: </th>
            <th>Bestellingnr: </th>
            <th>Prijs:</th>
            <th>Status: </th>
        </tr>
        <tr>
            <td> 11/11/2024 </td>
            <td> 00001</td>
            <td> 10,99€</td>
            <td>In Oven</td>
        </tr>
        <tr>
            <td> 01/11/2024 </td>
            <td> 00004</td>
            <td> 1,49€</td>
            <td>Geannuleerd</td>
        </tr>
        <tr>
            <td> 21/10/2024 </td>
            <td> 00010</td>
            <td> 12,48€</td>
            <td>Bezorgd</td>
        </tr>
        </table>
    <h2> Huidige bestelling:</h2>
    <table>
        <tr>
            <th>Datum: </th>
            <th>Bestellingnr: </th>
            <th>Producten: </th>
            <th>Aantal: </th>
            <th>Prijs:</th>
        </tr>
        <tr>
            <td> </td>
            <td> 00001</td>
            <td> Margaritha pizza</td>
            <td> 1 </td>
            <td> 10,99€</td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> Cola</td>
            <td> 2 </td>
            <td> 1,49€</td>
        </tr>
        <tr>
            <td> 11/11/2024 </td>
            <td> Totaal</td>
            <td> </td>
            <td> 3 </td>
            <td> 12,48€</td>
        </tr>
        </table>
    </main>
    <footer>
            <a href="Privacyverklaring.php"> link naar privacy verklaring.</a>
    </footer>
</body>
</html>