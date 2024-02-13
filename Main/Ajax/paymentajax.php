<?php
include("../../config/connect.php");
if(
     !empty($_POST["pay_amount"]) && !empty($_POST["pay_id"]) && !empty($_POST["cust_id"] && !empty($_POST["data"]) ) 
)
{
    date_default_timezone_set('Asia/Kolkata');

    $data = $_POST["data"];
    // Example fixing the error
$decodedData = json_decode($data, true);

    // Check if decoding was successful

    $pay_amount=$_POST["pay_amount"];
    $pay_id=$_POST["pay_id"];
    $cus_id = $_POST["cust_id"];
   $currentDate = date("Y-m-d");
    // Output: Current date in the format YYYY-MM-DD
   $currentDateTime = date("H:i:s");
    // Output: Current time in the format HH:MM:SS
    $setpayment = "INSERT INTO `payment` (`transaction_id`, `pay_mode`, `pay_amount`, `pay_date`, `pay_time`, `pay_status`) VALUES ('$pay_id', 'online', '$pay_amount', '$currentDate', '$currentDateTime', 'success')";
    
    $exutequery=mysqli_query($con,$setpayment);
   if($exutequery)
   {
     $nextMonthDate = date("Y-m-d", strtotime("+1 month", strtotime($currentDate)));
     $subschan= "INSERT INTO `subscribechannel` (`sub_start_date`, `sub_end_date`, `sub_cust_id`) VALUES ('$currentDate', '$nextMonthDate', '$cus_id')";
     $exutequerysubchan=  mysqli_query($con,$subschan);
    if($exutequerysubchan){
        if ($decodedData !== null) {
            // Access individual elements
            $cart = $decodedData['cart'];
            if (empty($cart)) {
                // If the cart is empty, display a message
                echo "Your cart is empty!!";
            } else {
            // Loop through the cart items
            $count = 0;
            $insertId = mysqli_insert_id($con);
            foreach ($cart as $item) {
                $chan_id = $item['chan_id'];
                
                
                $dynamicVariableName = "put_subscribe_channel_" . $count;
                $$dynamicVariableName = "INSERT INTO `subscribeforchannel` (`subchan_id`, `channel_id`) VALUES ('$insertId', '$chan_id')";
                if(mysqli_query($con,$$dynamicVariableName)){
                    $count = $count + 1;
                }
            }
            if($count==count($cart)){
                $insertchanpay="INSERT INTO `paidforchannel` (`paid_subchan_id`, `paid_trans_id`) VALUES ('$insertId', '$pay_id')";
                if(mysqli_query($con,$insertchanpay)){
                echo(1);
            }
            }else{
                echo(2);
            }
        }
    }
    }
    else{
        echo(2);
    }
  }
   else{
    echo(2);
   }

}
        

?>
