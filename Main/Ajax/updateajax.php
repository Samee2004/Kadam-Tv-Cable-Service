<?php
ob_start();
session_start();
include("../../config/connect.php");
if(
    !empty($_POST["FisrtName"]) && !empty($_POST["MiddeName"]) && !empty($_POST["LastName"]) && !empty($_POST["email"]) && !empty($_POST["contact"]) && !empty($_POST["flat"]) && !empty($_POST["building"]) && !empty($_POST["streetAddress"]) && !empty($_POST["pincode"]) && !empty($_POST["id"])
)
{
    $FisrtName=$_POST["FisrtName"];
    $MiddeName=$_POST["MiddeName"];
    $LastName=$_POST["LastName"];
    $email=$_POST["email"];
    $contact=$_POST["contact"];
    $flat=$_POST["flat"];
    $building=$_POST["building"];
    $streetAddress=$_POST["streetAddress"];
    $pincode=$_POST["pincode"];
    $id = $_POST["id"];
    $updatequery=" UPDATE `customer` SET `cust_building` = '$building', `cust_email` = '$email',`cust_fname` = '$FisrtName',`cust_mname` = '$MiddeName',`cust_lname` = '$LastName',`cust_flat` = '$flat',`cust_street` = '$streetAddress',`cust_pincode` = '$pincode',`cust_phone` = '$contact' WHERE `customer`.`cust_email` = '$id' ";

   $exutequery=mysqli_query($con,$updatequery);
   if($exutequery)
   {
    $_SESSION["email"] = $email;
    echo("1");
   }
   else{
    echo("2");
   }
}
ob_flush();
?>