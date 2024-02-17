<?php
include("../../config/connect.php");

if (!empty($_POST["description"]) && !empty($_POST["userid"])) {
    date_default_timezone_set('Asia/Kolkata');
    $description = $_POST["description"];
    $userid = $_POST["userid"];
    $currentDate = date("Y-m-d");
    $complaintquery = "INSERT INTO `complaint` ( `complaint_issue`, `complaint_date`, `complaint_status`, `complaint_cust`) VALUES ('$description,', '$currentDate', 'Pending', '$userid')";
   
    $exutequery = mysqli_query($con, $complaintquery);

    if ($exutequery ) {
        echo "1";
    } else {
        echo "2";
    }
}
?>
