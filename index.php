<?php
session_start();
require_once 'php/inc/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowlingcenter Brooklyn</title>
    <link rel="stylesheet" href="./CSS/algemeen.css">
    <link rel="stylesheet" href="./CSS/inc.css">
    <script src="js/ajax.js"></script>
    <link rel="icon" type="image/x-icon" href="./img/3pin1bal.png">
</head>

<body>
    <?php include './inc/nav.php' ?>
    <!-- Text in yellow stripe -->
    <h1 class="navstripe">Bowlingcenter Brooklyn</h1>
    <!-- Article about making reservations -->
    <div class="homepage">
        <div class="article" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
            <h1>Reserveren</h1>
            <img src="./img/placeholder3.jpg">
            <p>Maak je klaar voor een geweldige tijd vol plezier, competitie en lachen! Reserveer nu je bowlingbaan bij Bowlingcenter Brooklyn in Limmen en creëer onvergetelijke herinneringen met vrienden en familie.</p>
            <a href="./reserveren.php">Reserveer nu!</a>
        </div>
        <!-- Article with information about the bowlingcenter -->
        <div class="middlearticle">
            <h1>Onze geschiedenis</h1>
            <img src="./img/placeholder3.jpg">
            <p>Ontdek het inspirerende verhaal van Bowlingcenter Brooklyn in Limmen. Lees hoe twee broers, Walter en Donny de Vries, het succesvolle familiebedrijf overnemen van hun geliefde oom en het transformeren tot een bruisend bowlingparadijs. Volg hun reis vol passie, doorzettingsvermogen en succes in deze boeiende geschiedenis die je niet mag missen.</p>
            <a href="./overons.php">Lees het verhaal</a>
        </div>
        <!-- Article about creating an account -->
        <div class="article" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
            <h1>Maak je account</h1>
            <img src="./img/placeholder3.jpg">
            <p>Maak een account aan bij Bowlingcenter Brooklyn in Limmen en geniet van exclusieve voordelen, speciale aanbiedingen en een vlotte reserveringservaring. Mis het niet, meld je vandaag nog aan!</p>
            <a href="./registratie.php">Maak je account aan</a>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2424.680941776617!2d4.69119777693006!3d52.575380932127466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5f9cd6bcbd017%3A0xb9211a5d8b438810!2sDekaMarkt%20Limmen!5e0!3m2!1sen!2snl!4v1687872473590!5m2!1sen!2snl" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <?php include './inc/footer.php' ?>
</body>

</html>