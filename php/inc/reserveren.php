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

$sql = "INSERT INTO `reservervaties` (`reservations_account`, `reservations_date`, `reservations_timeslot`, `reservations_options`, `reservations_partysize`) VALUES ('" . $_SESSION['accountId'] . "', '" . $data['selectedDate'] . "', '" . $data['time'] . "', '" . $data['options'] . "', '" . $people . "')";
$result = mysqli_query($conn, $sql);

echo $result;
var_dump($result);
die();

if ($result) {
    $_SESSION['reservationSuccess'] = "Reservation has been made.";
    // header("Location: ../../beheerklant.php");
    // exit;
} else {
    $_SESSION['reservationError'] = "Something went wrong.";
    // header("Location: ../../reserveren.php");
    // exit;
}


?>