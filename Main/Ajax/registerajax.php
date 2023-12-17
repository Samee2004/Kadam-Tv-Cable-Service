<?php
include("../../config/connect.php");
if(
    !empty($_POST["FisrtName"]) && !empty($_POST["MiddeName"]) && !empty($_POST["LastName"]) && !empty($_POST["email"]) && !empty($_POST["contact"]) && !empty($_POST["password"]) && !empty($_POST["flat"]) && !empty($_POST["building"]) && !empty($_POST["streetAddress"]) && !empty($_POST["pincode"])
)
{
    $FisrtName=$_POST["FisrtName"];
    $MiddeName=$_POST["MiddeName"];
    $LastName=$_POST["LastName"];
    $email=$_POST["email"];
    $contact=$_POST["contact"];
    $password=$_POST["password"];

    
    $flat=$_POST["flat"];
    $building=$_POST["building"];
    $streetAddress=$_POST["streetAddress"];
    $pincode=$_POST["pincode"];
    
   $registerquery="INSERT INTO `customer` (`cust_email`, `cust_password`, `cust_fname`, `cust_mname`, `cust_lname`, `cust_flat`, `cust_building`, `cust_street`, `cust_pincode`, `cust_phone`) VALUES ('$email', '$password', '$FisrtName', '$MiddeName', '$LastName', '$flat', '$building', '$streetAddress', '$pincode', '$contact')";

   $exutequery=mysqli_query($con,$registerquery);
   if($exutequery)
   {
    echo("1");
   }
   else{
    echo("2");
   }
}
?>