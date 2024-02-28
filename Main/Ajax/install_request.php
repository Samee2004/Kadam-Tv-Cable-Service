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
    $insert_install = "INSERT INTO `installs` (`installs_id`, `installs_req_date`, `installs_req_time`, `installs_date`, `installs_status`, `stb_number`, `emp_email`, `cust_email`) VALUES (NULL, '$formattedDate', '$formattedTime', NULL, 'Pending', NULL, NULL, '$email')";

    if (mysqli_query($con, $insert_install)) {
        echo(1);
    } else {
        echo(2);
        echo(mysqli_error($con));
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
if (!empty($_POST["install_id_status_failure"]) && !empty($_POST["install_status_failure"]) ) {
    $install_status_failure = $_POST["install_status_failure"];
    $install_id_status_failure = $_POST["install_id_status_failure"];
    $update_install_status = "UPDATE `installs` SET `installs_status` = '$install_status_failure' WHERE `installs`.`installs_id` = '$install_id_status_failure' ";
    if (mysqli_query($con,$update_install_status)) {
       echo(1);
    }else{
        echo(2);
    }

}
if (!empty($_POST["install_id_price"])) {
    $install_id_price = $_POST["install_id_price"];
    $get_price = "SELECT * FROM `installs`,`settopbox` WHERE `installs`.`stb_number`=`settopbox`.`stb_number` AND `installs_id` = '$install_id_price' ";
    $execute_get_price = mysqli_query($con,$get_price);
    if (mysqli_num_rows($execute_get_price)==1) {
        while ($row_of_price = mysqli_fetch_assoc($execute_get_price)) {
            echo($row_of_price["stb_price"]);
        }
    }
}
if (!empty($_POST["install_amount"]) && !empty($_POST["pay_id"]) && !empty($_POST["pay_status"]) && !empty($_POST["install_idd"])) {
    $install_idd = $_POST["install_idd"];
    $install_amount = $_POST["install_amount"];
    $pay_id = $_POST["pay_id"];
    $pay_status = $_POST["pay_status"];
    $currentDateTime = date("H:i:s"); // Output: Current time in the format HH:MM:SS
    $currentDate = date("Y-m-d");
    date_default_timezone_set('Asia/Kolkata');
    $setpayment = "INSERT INTO `payment` (`transaction_id`, `pay_mode`, `pay_amount`, `pay_date`, `pay_time`, `pay_status`) VALUES ('$pay_id', '$pay_status', '$install_amount', '$currentDate', '$currentDateTime', 'success')";
    if (mysqli_query($con,$setpayment)) {
        $get_stb_id = "SELECT * FROM `installs` WHERE  `installs_id` = '$install_idd' ";
        $execute_get_id = mysqli_query($con,$get_stb_id);
        if (mysqli_num_rows($execute_get_id)==1) {
            while ($row_of_id = mysqli_fetch_assoc($execute_get_id)) {
                $stb_id = $row_of_id["stb_number"];
                $insert_stb_pay  = "INSERT INTO `paidforsettopbox` (`Paid_stb_number`, `paid_trans_id`) VALUES ('$stb_id', '$pay_id')";
                if(mysqli_query($con,$insert_stb_pay))
                {

                    $update_install_status = "UPDATE `installs` SET `installs_status` = 'Completed' WHERE `installs`.`installs_id` = '$install_idd' ";
                    if (mysqli_query($con,$update_install_status)) {
                    echo(1);
                    }else{
                        echo(2);
                    }
                }else{
                    echo(2);
            
                }
                
            }
        }
        
    }else{
        echo(2);
    }

}
?>
