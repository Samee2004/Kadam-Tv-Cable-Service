<?php
include("../../config/connect.php");
if(
    !empty($_POST["email"])
)
{
    $email=$_POST["email"];
    

    $getuser="SELECT * FROM customer WHERE `cust_email` = '$email'";
   
    $exutequery=mysqli_query($con,$getuser);
   if(mysqli_num_rows($exutequery)==1)
   {
    
    while($row=mysqli_fetch_assoc($exutequery))
    {
    
        echo("1");

    }

   }
   else{
    echo("2");
   }

}
if(
    !empty($_POST["re_email"]) && !empty($_POST["password"])
)
{
    $email=$_POST["re_email"];
    $password=$_POST["password"];

    $updatepass="UPDATE `customer` SET `cust_password` = '$password' WHERE `customer`.`cust_email` = '$email'";

    $exutequery=mysqli_query($con,$updatepass);
   if($exutequery)
   {
    echo("1");
   }
   else{
    echo("2");
   }

    
}
?>