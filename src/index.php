<?php include "php/products.php" ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>School Fundraiser</title>
        <link rel="stylesheet" type="text/css"  href="css/style.css">
    </head>
    <body>
        <h1>Iss Für Mein ABI</h1>
        <h2 class="counterDiv">Zähler <span id="counter">0</span></h2>

        <div id="items">
            <?php echo $grid ?>
        </div>

        <div class="submit">
            <button id="submit" onclick="submitOrder()">Bestellen</button>
        </div>

        <footer>
            <div id="order-summary">order summary</div>
            <div>
                <button id="clearCounter" onclick="clearCounter()">Zähler zurücksetzen</button>
            </div>
            <div>
                <ul style="list-style: none">
                    <li>&copy; lorax 2025</li>
                    <li>GPL v3</li>
                    <li><a href="https://www.github.com/lorax42/IssFuerMeinABI">GitHub</a></li>
                </ul>
            </div>
        </footer>

        <script src="js/script.js"></script>
    </body>
</html>
