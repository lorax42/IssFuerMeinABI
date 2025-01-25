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
            <button onclick="submitOrder()">Bestellen</button>
        </div>

        <!-- <div id="order-summary"></div> -->

        <footer>
            <button onclick="clearCounter()">Zähler zurücksetzen</button>
        </footer>

        <script src="js/script.js"></script>
    </body>
</html>
