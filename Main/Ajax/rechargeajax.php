<?php
include("../../config/connect.php");
if(
     !empty($_POST["pay_amount"]) && !empty($_POST["pay_id"]) && !empty($_POST["sub_id"] ) 
)
{
    date_default_timezone_set('Asia/Kolkata');
    $pay_amount=$_POST["pay_amount"]; 
    $currentDate = date("Y-m-d");
    $pay_id=$_POST["pay_id"];
    $sub_id = $_POST["sub_id"];
    $currentDateTime = date("H:i:s"); // Output: Current time in the format HH:MM:SS
    $nextMonthDate = date("Y-m-d", strtotime("+1 month", strtotime($currentDate))); // Next month date
    $setpayment = "INSERT INTO `payment` (`transaction_id`, `pay_mode`, `pay_amount`, `pay_date`, `pay_time`, `pay_status`) VALUES ('$pay_id', 'online', '$pay_amount', '$currentDate', '$currentDateTime', 'success')";
    $exutequery=mysqli_query($con,$setpayment);
   if($exutequery)
   {
    $recharge_for_subscription = "INSERT INTO `rechargeforsubscription` (`recharge_sub_id`) VALUES ('1')";
    if (mysqli_query($con,$recharge_for_subscription)) {
        $recharge_id = mysqli_insert_id($con);
        $insert_recharge_transaction = "INSERT INTO `paidforrecharge` (`paid_recharge_id`, `paid_trans_id`) VALUES ('$recharge_id', '$pay_id')";
        if(mysqli_query($con,$insert_recharge_transaction))
        {
            $updste_subscription = "UPDATE `subscription` SET `sub_start_date` = '$currentDate',`sub_end_date` = '$nextMonthDate' WHERE `subscription`.`sub_id` = '$sub_id' ";
            if(mysqli_query($con,$updste_subscription))
            {
                echo(1);
            }else {
                echo(2);
            }
        }else {
            echo(2);
        }
    }else{
        echo(2);
    }
   }else{
    echo(2);
   }

}
?>