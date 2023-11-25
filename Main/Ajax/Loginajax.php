<?php
include("../../config/connect.php");
if(
    !empty($_POST["email"]) && !empty($_POST["password"])
)
{
    $email=$_POST["email"];
    $password=$_POST["password"];

    $loginquery="SELECT * FROM customer WHERE `cust_email` = '$email' AND cust_password = '$password'";
   
    $exutequery=mysqli_query($con,$loginquery);
   if(mysqli_num_rows($exutequery)==1)
   {
    
    while($row=mysqli_fetch_assoc($exutequery))
    {
        session_start();
        $_SESSION["email"]=$row["cust_email"];
        echo("1");

    }

   }
   else{
    echo("2");
   }
}
?>
