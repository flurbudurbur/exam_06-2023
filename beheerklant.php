<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheer</title>
    <link rel="stylesheet" href="./CSS/algemeen.css">
    <link rel="stylesheet" href="./CSS/inc.css">
    <link rel="stylesheet" href="./CSS/beheer.css">
    <link rel="icon" type="image/x-icon" href="./img/3pin1bal.png">
</head>
<body>
    <!-- inc -->
    <?php include './inc/nav.php' ?>
    <!--text in yellow stripe -->
    <h1 class="navstripe">Beheer</h1>
    <!-- welcome -->
    <h1>Welkom terug, <?php echo $_SESSION['displayname']?></h1>
    <!--resevations blocks-->
    <div class="nextto">
        <!-- my reservations -->
        <div class="prices">
            <h1>Mijn reserveringen</h1>
            <div class="info">
                <div class="infotext">Personen:</div>
                <div class="infotext">Datum:</div>
                <div class="infotext">Tijd:</div>
            </div>
            <div class="container2">
                <div class="row1">
                    <div class="row">
                        <div class="resblock">8</div>
                        <div class="resblock">29-7</div>
                        <div class="resblock">16.00</div>
                        <div class="eblock">
                            <div class="resblock"><img src="./img/penicon.png"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="resblock">8</div>
                        <div class="resblock">29-7</div>
                        <div class="resblock">16.00</div>
                        <div class="resblock"><img src="./img/penicon.png"></div>
                    </div>
                    <div class="row">
                        <div class="resblock">8</div>
                        <div class="resblock">29-7</div>
                        <div class="resblock">16.00</div>
                        <div class="resblock"><img src="./img/penicon.png"></div>
                    </div>
                    <div class="row">
                        <div class="resblock">8</div>
                        <div class="resblock">29-7</div>
                        <div class="resblock">16.00</div>
                        <div class="resblock"><img src="./img/penicon.png"></div>
                    </div>
                    <div class="row">
                        <div class="resblock">8</div>
                        <div class="resblock">29-7</div>
                        <div class="resblock">16.00</div>
                        <div class="resblock"><img src="./img/penicon.png"></div>
                    </div>
                    <div class="row">
                        <div class="resblock">8</div>
                        <div class="resblock">29-7</div>
                        <div class="resblock">16.00</div>
                        <div class="resblock"><img src="./img/penicon.png"></div>
                    </div>
                    <div class="row">
                        <div class="resblock">8</div>
                        <div class="resblock">29-7</div>
                        <div class="resblock">16.00</div>
                        <div class="resblock"><img src="./img/penicon.png"></div>
                    </div>
                    <div class="row">
                        <div class="resblock">8</div>
                        <div class="resblock">29-7</div>
                        <div class="resblock">16.00</div>
                        <div class="resblock"><img src="./img/penicon.png"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my scores -->
        <div class="prices">
            <h1>Mijn scores</h1>
            <div class="info">
                <div class="infotext2">Datum:</div>
                <div class="infotext2">Tijd:</div>
            </div>
            <div class="container2">
                <div class="row1">
                    <div class="row">
                        <div class="resblock2">29-7</div>
                        <div class="resblock2">16.00</div>
                    </div>
                    <div class="row">
                        <div class="resblock2">29-7</div>
                        <div class="resblock2">16.00</div>
                    </div>
                    <div class="row">
                        <div class="resblock2">29-7</div>
                        <div class="resblock2">16.00</div>
                    </div>
                    <div class="row">
                        <div class="resblock2">29-7</div>
                        <div class="resblock2">16.00</div>
                    </div>
                    <div class="row">
                        <div class="resblock2">29-7</div>
                        <div class="resblock2">16.00</div>
                    </div>
                    <div class="row">
                        <div class="resblock2">29-7</div>
                        <div class="resblock2">16.00</div>
                    </div>
                    <div class="row">
                        <div class="resblock2">29-7</div>
                        <div class="resblock2">16.00</div>
                    </div>
                    <div class="row">
                        <div class="resblock2">29-7</div>
                        <div class="resblock2">16.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inc -->
    <?php include './inc/footer.php' ?>
</body>