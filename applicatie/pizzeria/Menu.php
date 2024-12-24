<!-- DINGEN DIE JE KAN BESTELLEN OP DE PIZZERIA WEBSITE-->
<?php
session_start();

?>

<!-- DINGEN DIE JE KAN BESTELLEN OP DE PIZZERIA WEBSITE-->

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
        <h2> Ons Menu </h2>
        <div class= "menu-container">  
            <div class="menu-item">
                <img src="afbeeldingen/margherita.png" alt="Margherita pizza afbeelding">
                <h3>Margherita pizza</h3>
                <p>Napolitaanse pizza met tomaten, mozzarella en verse basilicum </p>
                <p>Prijs: 10,99€</p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/4kazen.png" alt="Vier kazen pizza">
                <h3>Vier kazen pizza</h3>
                <p>Pizza met kazen: mozzarella, gorgonzola, blauwe schimmelkaas, parmigiano </p>
                <p>Prijs: 11,99€</p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a></button>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/pepperoni.png" alt="Pepperoni pizza">
                <h3>Pepperoni pizza</h3>
                <p>Pizza met kaas, tomatensaus en salami van rundvlees</p>
                <p>Prijs: 13,99€ </p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/ham.png" alt="Ham pizza">
                <h3>Ham pizza</h3>
                <p>Pizza met kaas, tomatensaus en ham</p>
                <p>Prijs: 13,99€</p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/paddenstoelen.png" alt="Paddenstoelen pizza">
                <h3>Paddenstoelen pizza</h3>
                <p>Pizza met kaas, tomatensaus, ui, paddenstoelen</p>
                <p>Prijs: 14,99€</p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/hawaii.png" alt="Hawaii pizza">
                <h3>Hawaii pizza</h3>
                <p>Pizza met kaas, tomatensaus, kip, ananas </p>
                <p>Prijs: 13,99€</p>
                <p>hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/hetepeper.png" alt="Hete peper pizza">
                <h3>Hete peper pizza</h3>
                <p>Pizza met kaas, tomatensaus, salami van rundvlees, hete groene peper</p>
                <p>Prijs: 10,99€</p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/burger.png" alt="Burger pizza">
                <h3>Burger pizza</h3>
                <p>Pizza met kaas, tomatensaus, ui, augurken, salami van rundvlees</p>
                <p>Prijs: 14,99€</p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/frisdrank.png" alt="Frisdrank">
                <h3>Frisdrank</h3>
                <p>Frisdrank naar keuze</p>
                <p>Prijs: 1,49€</p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/water.png" alt="Water">
                <h3>Water</h3>
                <p>Fles water Bona Aqua</p>
                <p>Prijs: 1,09€</p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
            <div class="menu-item">
                <img src="afbeeldingen/thee.png" alt="Thee">
                <h3>Thee</h3>
                <p>Thee naar keuze</p>
                <p>Prijs: 1,49€</p>
                <p>Hoeveelheid: </p>
                <a href="Winkelmandje.php">Toevoegen aan winkelmandje</a>
            </div>
        </div>
    </main>
    <footer>
            <a href="Privacyverklaring.php"> link naar privacy verklaring.</a>
    </footer>
</body>