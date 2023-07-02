<?php
session_start();
require_once 'php/inc/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account aanmaken</title>
    <link rel="stylesheet" href="./CSS/overons.css">
    <link rel="stylesheet" href="./CSS/algemeen.css">
    <link rel="stylesheet" href="./CSS/inc.css">
    <link rel="icon" type="image/x-icon" href="./img/3pin1bal.png">
</head>
<body>
    <!-- inc -->
    <?php include './inc/nav.php' ?>
    <!-- text in yellow stripe -->
    <h1 class="navstripe">Registeren</h1>
    <!-- registration -->
    <div class="formbox">
        <div class="container">
            <h1>Maak een account!</h1>
            <?php
            if (sessionCheck('registerError')) {
                echo sessionSet('registerError');
            }
            ?>
            <form action="php/inc/register.php" method="post">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="Voer uw e-mailadres in" required>
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" id="password" name="password" placeholder="Voer uw wachtwoord in" required>
                </div>
                <div class="form-group">
                    <label for="passwordConfirm">Herhaal wachtwoord:</label>
                    <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Herhaal uw wachtwoord" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telefoonnummer:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Voer uw telefoonnummer in" required>
                </div>
                <div class="form-group">
                    <label for="firstname">Voornaam:</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Voer uw voornaam in" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Achternaam:</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Voer uw achternaam in" required>
                </div>
                <br>
                <br>
                <button type="submit">Registreren</button>
            </form>
        </div>
    </div>
    <!-- inc -->
    <?php include './inc/footer.php' ?>
</body