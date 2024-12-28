<?php include "php/products.php"; ?>
<!DOCTYPE html5>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IFMA</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <main>
            <h1>Iss Für Mein ABI!</h1>
            <div class="grid-container">
                <!-- Product grid will be generated here -->
                <?php echo $grid; ?>
            </div>
        </main>
        <script src="js/script.js"></script>
    </body>
</html>
