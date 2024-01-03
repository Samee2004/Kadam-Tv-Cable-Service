<?php
ob_start();
session_start();
include("../../config/connect.php");

if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $loginquery = "SELECT * FROM customer WHERE `cust_email` = '$email' AND cust_password = '$password'";
   
    $exutequery = mysqli_query($con, $loginquery);

    if ($exutequery && mysqli_num_rows($exutequery) == 1) {
        $row = mysqli_fetch_assoc($exutequery);
        $_SESSION["email"] = $row["cust_email"];
        $_SESSION["firstname"] = $row["cust_fname"];
        $_SESSION["lastname"] = $row["cust_lname"];
        echo "1";
    } else {
        echo "2";
    }
}

ob_flush();
?>
