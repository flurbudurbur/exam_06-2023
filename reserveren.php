<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
    header("Location: login.php");
    exit;
} else {
    $accountID = $_SESSION['accountId'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveren</title>
    <link rel="stylesheet" href="./CSS/algemeen.css">
    <link rel="stylesheet" href="./CSS/inc.css">
    <link rel="stylesheet" href="./CSS/reserveer.css">
    <link rel="icon" type="image/x-icon" href="./img/3pin1bal.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/ajax.js"></script>
</head>

<body>
    <?php include './inc/nav.php' ?>
    <!-- Text in yellow stripe -->
    <h1 class="navstripe">Reserveer nu!</h1>
    <!-- To make sure the content is put next to each other -->
    <div class="nextto">
        <!-- This is where our prices are being displayed -->
        <div class="prices">
            <h1>Tarieven</h1>
            <div class="day">
                <p>Maandag t/m donderdag</p>
                <p>&euro;24,- per uur</p>
            </div>
            <div class="day">
                <p>Vrijdag, zaterdag en zondag van 14.00 uur tot 18.00 uur</p>
                <p>&euro;28,- per uur</p>
            </div>
            <p>Vrijdag, zaterdag en zondag van 18.00 uur tot 24.00 uur</p>
            <p>&euro;33,50 per uur</p>
            <img src="./img/3pin1bal.png">
        </div>
        <!-- This is where people can make a reservation -->
        <div class="container marginbottom">
            <h1>Reserveer!</h1>
            <form action="php/inc/reserveren.php" method="post">
                <div class="form-control guests">
                    <input type="hidden" name="accountID" value="<?php echo $accountID; ?>">
                    <label for="adult">Volwassen:</label>
                    <input id="adultInput" type="number" name="adult" value="1" min="1">
                    <label for="child">Kinderen t/m 12 jaar:</label>
                    <input id="childInput" type="number" name="child" value="0" min="0">
                    <label for="hekjes" class="hekjes" style="display:none;" min="0">kinderhekjes:</label>
                    <input id="railsInput" type="checkbox" name="hekjes" class="hekjes" value="false">
                    <label for="room">Banen:</label>
                    <input id="trackInput" type="number" value="1" min="1" max="8">
                    <label for="date" class="dateSelector">Datum van</label>
                    <label for="date" class="dateSelector">tot</label>
                    <input id="startDateInput" type="date" name="startdate" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
                    <input id="endDateInput" type="date" name="enddate" value="<?php echo date('Y-m-d', strtotime("+1 day")); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+2 weeks")); ?>">
                    <h2>Extra opties</h2>
                    <div class="row">
                        <label for="child">Snacks:</label>
                        <br>
                    </div>
                    <select id="child">
                        <option value="option1">Geen</option>
                        <option value="option2">Basis</option>
                        <option value="option3">Deluxe</option>
                    </select>
                    <div class="row">
                        <label for="child">Speciale gelegenheid:</label>
                        <br>
                    </div>
                    <select id="child">
                        <option value="option1">Geen</option>
                        <option value="option2">Kinderpartij</option>
                        <option value="option3">Vrijgezellenfeest</option>
                    </select>
                    <input id="selectedDate" type="date" name="selectedDate" value="<?php echo date('Y-m-d'); ?>" hidden>
                    <input type="submit" value="Reserveer" class="span2">
                </div>
                <div class="reserveContainer" id="data"></div>
            </form>

            <script>
                addAllEventListeners();
                ajaxStringify();
            </script>
        </div>
    </div>
    <?php include './inc/footer.php' ?>
</body>

</html>