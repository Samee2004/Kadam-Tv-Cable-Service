<?php
include("../../config/connect.php");

if (!empty($_POST["email"]) && !empty($_POST["date"]) && !empty($_POST["time"])) {
    $email = $_POST["email"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $get_alrdy_has_stb = "SELECT * FROM `installs` WHERE cust_email = '$email' ";
    if (mysqli_num_rows(mysqli_query($con,$get_alrdy_has_stb))==0) {
            // Create a DateTime object for the date
    $dateObject = DateTime::createFromFormat('Y-m-d', $date);
    if (!$dateObject) {
        echo "Invalid date format";
        exit;
    }

    // Create a DateTime object for the time
    $timeObject = DateTime::createFromFormat('H:i', $time);
    if (!$timeObject) {
        echo "Invalid time format";
        exit;
    }

    // Format the date and time
    $formattedDate = $dateObject->format('Y-m-d');
    $formattedTime = $timeObject->format('H:i:s');

    // Insert into the database
    $insert_install = "INSERT INTO `installs` (`installs_req_date`, `installs_req_time`, `installs_date`, `installs_status`, `stb_number`, `emp_email`, `cust_email`)
        VALUES ('$formattedDate', '$formattedTime', 'Pending', NULL, NULL, NULL, '$email')";

    if (mysqli_query($con, $insert_install)) {
        echo(1);
    } else {
        echo(2);
    }
    }else{
        echo(3);
    }

}

if(!empty($_POST["stb_id"]) && !empty($_POST["technicanId"]) && !empty($_POST["install_id"]) ){
    $technicanId = $_POST["technicanId"];
    $stb_id = $_POST["stb_id"];
    $install_id = $_POST["install_id"];
    $update_assign = "UPDATE `installs` SET `installs_status` = 'Assigned',`emp_email` = '$technicanId',`stb_number`='$stb_id' WHERE `installs`.`installs_id` = '$install_id' ";
    $exutequery_update_assign = mysqli_query($con,$update_assign);
    if($exutequery_update_assign){
        $update_stb_status = "UPDATE `settopbox` SET `stb_status` = 'Assigned' WHERE `settopbox`.`stb_number` = '$stb_id'";
        if(mysqli_query($con,$update_stb_status))
        {
            echo(1);
        }else{
            echo(2);
        }
        
    }else{
        echo(2);
    }
}
?>
