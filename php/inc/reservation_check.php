<?php
require_once '../db/db_connection.php';
$data = json_decode(file_get_contents("php://input"), TRUE);
$sql = "SELECT * FROM reservaties WHERE reservations_partysize BETWEEN '".$data['startDate']."' AND '".$data['endDate']."'";
$result = $conn->query($sql);

$dayNames = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$days = 7;
$openHours = ['14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', "21:00", "22:00", "23:00", "24:00"];
$timeslots = [];
for ($i = 0; $i < $days; $i++) {
    $timeslots[$dayNames[$i]] = [];
    // for days monday to friday open from 14:00 to 22:00
    // construct an array with timeslots as keys and costs as values
    if ($i < 5) {
        for ($j = 0; $j < 8; $j++) {
            $timeslots[$dayNames[$i]][] = [$openHours[$j] => "24"];
        }
    } else {
        // for saturday open from 14:00 to 23:00
        for ($j = 0; $j < 10; $j++) {
            $timeslots[$dayNames[$i]][] = [$openHours[$j] => "33.5"];
        }
    }
}

$response = [];
if($result-> num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo 'resultaten gevonden';
    }
} else {
    // get availableOptions between start and end date
    $availableOptions = [];
    $start = new DateTime($data['startDate']);
    $end = new DateTime($data['endDate']);
    // for each date between start and end date add to availableOptions array
    for($i = $start; $i <= $end; $i->modify('+1 day')){
        $availableOptions[] = $i->format('Y-m-d');
    }
    
    // for each date between start and end date add to response array with the date as key
    foreach ($availableOptions as $date) {
        // day to string for dayname
        $day = date('l', strtotime($date));
        foreach ($timeslots[$day] as $key => $value) {
            $availableAlleys = 8;
            // get the timeslot from the array
            $timeslot = array_keys($value)[0];
            // get the cost from the array
            $cost = array_values($value)[0];
            // check if timeslot is already taken 8 times
            $sql = "SELECT * FROM `reservaties` WHERE `reservations_date` = '".$date."' AND `reservations_timeslot` = '".$timeslot."'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $availableAlleys -= $row['reservations_lanes'];
            }
            $response[$date][] = [
                'timeslot' => $timeslot,
                'cost' => $cost,
                'available' => $availableAlleys
            ];
        }
    }
    $availableOptions = json_encode($response);
    echo $availableOptions;
}