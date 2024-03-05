<?php

include("../../config/connect.php");
date_default_timezone_set('Asia/Kolkata');

// Calculate the date for one month ago
$oneMonthAgo = date("Y-m-d", strtotime("-1 month"));

// Current date
$currentDate = date("Y-m-d");

// Array to store generated dates
$dates = array();

// Start generating dates
$date = $oneMonthAgo;
while ($date <= $currentDate) {
    $dates[] = $date;
    $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
}

$data[] = array(
    "date" => $dates,
);

// Output the generated dates
echo json_encode($data);

?>
