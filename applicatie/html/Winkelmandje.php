<!--PAGINA MET GEKOZEN ARTIKELEN OM DE BESTELLING TE BEVESTIGEN EN BETALEN-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Sole Machina</title>

    <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body><!--PAGINA MET GEKOZEN ARTIKELEN OM DE BESTELLING TE BEVESTIGEN EN BETALEN-->

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
    <h2>Winkelmand: </h2>

    <table>
        <tr>
            <th>Bestellingnr: </th>
            <th>Producten: </th>
            <th>Type:</th>
            <th>Aantal: </th>
            <th>Prijs:</th>
        </tr>
        <tr>
            <td> 00001</td>
            <td> Margaritha pizza</td>
            <td> Eten</td>
            <td><button>+ </button> 1 <button> - </button></td>
            <td> 10,99€</td>
        </tr>
        <tr>
            <td> </td>
            <td> Cola</td>
            <td> Drank</td>
            <td><button>+ </button> 2 <button> - </button></td>
            <td> 1,49€</td>
        </tr>
        <tr>
            <td> Totaal</td>
            <td> </td>
            <td> </td>
            <td> 3 </td>
            <td> 12,48€</td>
        </tr>
        </table>

        <div class="bestelling-annuleren">
            <button><a href="Menu.html">Anuleer bestelling</a></button>
        </div>

        <h2> Bestelling wordt bezorgt naar adres:</h2>
        <div class="bezorg-adres">
            <form method="post">
                <input name="Postcode" type="text" placeholder="Postcode" />
                <input name="Stad" type="text" placeholder="Stad" />
                <input name="Straat" type="text" placeholder="Straat" />
                <input name="Huisnummer" type="text" placeholder="Huisnummer" />
            </form>
        </div>
        <div class="bestelling-bevestiging">
            <h2>Bevestig bestelling: </h2>
            <button>Betalen</button>
        </div>
    </main>
    <footer>
            <a href="Privacyverklaring.html"> link naar privacy verklaring.</a>
    </footer>
</body>
</html>
    <?php include 'functies/Header.php'; ?>

    <main>
        <div class="container">
            <h2>Winkelmandje </h2>
            <table>
                <tr>
                    <th>[$naam]</th>
                    <th>[$Prijs]</th>
                    <th>[$Aantal]</th>
                    <th>[$Totaal]</th>
                </tr>
            </table>
            <form>
                <label for="address">Afleveradres:</label>
                <input type="text" id="address" name="address" required><br><br>
                <!-- Optie voor ophalen ??-->
                <button type="submit">Bestelling Plaatsen</button>
            </form>
            <!--<h6>Winkelmand: </h6>
            <h6>Anuleer artikel: </h6>
            <h6>Anuleer bestelling: </h6>
            <h6> Bestelling ophalen/wordt bezorgt naar adres..</h6>
            <h6>Bevestig bestelling: Betalen</h6>-->
        </div>
    </main>

    <?php include 'functies/Footer.php'; ?>
</body>
</html>