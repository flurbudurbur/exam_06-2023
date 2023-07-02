<?php
session_start();
require_once 'functions.php';
require_once '../db/db_connection.php';
$data = validate($_POST, false);



// todo 
$data['time'] = '14:00';
$data['options'] = '0';

foreach ($data as $key => $value) {
    if ($value == null) {
        $data[$key] = "0";
    }
}
$people = $data['adult'] . '-' . $data['child'];
$randomScores = json_encode(scoreGen());

$sql = "INSERT INTO `reservaties` (`reservations_account`, `reservations_date`, `reservations_timeslot`, `reservations_options`, `reservations_partysize`, `reservations_data`) VALUES ('" . $_SESSION['accountId'] . "', '" . $data['selectedDate'] . "', '" . $data['time'] . "', '" . $data['options'] . "', '" . $people . "', '" . $randomScores . "')";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['reservationSuccess'] = "Reservation has been made.";
    header("Location: ../../beheerklant.php");
    exit;
} else {
    $_SESSION['reservationError'] = "Something went wrong.";
    header("Location: ../../reserveren.php");
    exit;
}


?>