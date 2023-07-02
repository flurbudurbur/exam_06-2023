<?php
session_start();
require_once 'php/inc/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="./CSS/overons.css">
    <link rel="stylesheet" href="./CSS/algemeen.css">
    <link rel="stylesheet" href="./CSS/inc.css">
    <link rel="icon" type="image/x-icon" href="./img/3pin1bal.png">
</head>
<body>
    <!-- inc -->
    <?php include './inc/nav.php' ?>
    <!-- text in yellow stripe -->
    <h1 class="navstripe">Log-in</h1>
    <!-- login -->
    <div class="formbox">
        <div class="container">
            <h1>Log hier in</h1>
            <?php
            if (sessionCheck('registerError')) {
                echo sessionSet('registerError');
            }
            ?>
            <form action="php/inc/login.php" method="post">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input class="credentials" type="email" id="email" name="email" placeholder="Voer uw e-mailadres in" required>
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input class="credentials" type="password" id="password" name="password" placeholder="Voer uw wachtwoord in" required>
                </div>
                <br>
                <br>
                <button class="submitbtn" type="submit">Inloggen</button>
                <br>
                <hr>
                <br>
                <div class="notyet">
                    <a href="./registratie.php">
                        <h3>Nog geen account?</h3>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- inc -->
    <?php include './inc/footer.php' ?>
</body>
</html>