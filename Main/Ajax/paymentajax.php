<?php
include("../../config/connect.php");
if(
     !empty($_POST["pay_amount"]) && !empty($_POST["pay_id"]) && !empty($_POST["cust_id"] && !empty($_POST["data"]) ) 
)
{
    date_default_timezone_set('Asia/Kolkata');
    $data = $_POST["data"];
    $decodedData = json_decode($data, true);
    $pay_amount=$_POST["pay_amount"]; 
    $currentDate = date("Y-m-d");
    $pay_id=$_POST["pay_id"];
    $cus_id = $_POST["cust_id"];
    $currentDateTime = date("H:i:s"); // Output: Current time in the format HH:MM:SS
    $nextMonthDate = date("Y-m-d", strtotime("+1 month", strtotime($currentDate))); // Next month date
    $setpayment = "INSERT INTO `payment` (`transaction_id`, `pay_mode`, `pay_amount`, `pay_date`, `pay_time`, `pay_status`) VALUES ('$pay_id', 'online', '$pay_amount', '$currentDate', '$currentDateTime', 'success')";
    $exutequery=mysqli_query($con,$setpayment);
   if($exutequery)
   {
    $subscrption= "INSERT INTO `subscription` (`sub_start_date`, `sub_end_date`, `sub_cust_id`) VALUES ('$currentDate', '$nextMonthDate', '$cus_id')";
    $exutequerysubscrption=  mysqli_query($con,$subscrption);
    if($exutequerysubscrption){
        if ($decodedData !== null) {
            // Access individual elements
            $cart = $decodedData['cart'];
            if (empty($cart)) {
                // If the cart is empty, display a message
                echo "Your cart is empty!!";
            } else {
                $subscriptionId = mysqli_insert_id($con);
                $count = 0;
                foreach ($cart as $item) {
                    // Check if the 'type' value is 'c'
                    $chan_id = $item['chan_id'];
                    if ($item['type'] === 'c') {
                        $dynamicVariableNameChannel = "put_subscribe_channel_" . $count;
                        $$dynamicVariableNameChannel = "INSERT INTO `subscribeforchannel` (`subchan_id`, `channel_id`) VALUES ('$subscriptionId', '$chan_id')";
                        if(mysqli_query($con,$$dynamicVariableNameChannel)){
                            $count = $count + 1;
                        }
                    }
                    // Check if the 'type' value is 'p'
                    if ($item['type'] === 'p') {
                        $dynamicVariableNamePackage = "put_subscribe_package_" . $count;
                        $$dynamicVariableNamePackage = "INSERT INTO `subscribeforpackage` (`subpack_id`, `package_id`) VALUES ('$subscriptionId', '$chan_id')";
                        if(mysqli_query($con,$$dynamicVariableNamePackage)){
                            $count = $count + 1;
                        }
                    }
                }
                if($count==count($cart)){
                    $insertchanpay="INSERT INTO `paidforsubscription` (`paid_sub_id`, `paid_trans_id`) VALUES ('$subscriptionId', '$pay_id');";
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
