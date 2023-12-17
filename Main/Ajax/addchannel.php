<?php
include("../../config/connect.php");
if(
    !empty($_POST["name"]) && !empty($_POST["chan_number"]) && !empty($_POST["price"]) && !empty($_POST["category"]) 
)
{
    $name=$_POST["name"];
    $chan_number=$_POST["chan_number"];
    $price=$_POST["price"];
    $category=$_POST["category"];
    
   $addchannelquery="INSERT INTO `channels` ( `Chan_name`, `chan_number`, `chan_price`, `chan_genre`) VALUES ('$name', '$chan_number', '$price', '$category')";

   $exutequery=mysqli_query($con,$addchannelquery);
   if($exutequery)
   {
    echo("1");
   }
   else{
    echo("2");
   }
}
?>