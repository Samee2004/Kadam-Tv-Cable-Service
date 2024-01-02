<?php
include("../../config/connect.php");
if(
    !empty($_POST["email"]) && !empty($_POST["password"])
)
{
    $email=$_POST["email"];
    $password=$_POST["password"];

    $loginquery="SELECT * FROM employee WHERE emp_email = '$email' AND emp_password = '$password'";
   
    $exutequery=mysqli_query($con,$loginquery);
   if(mysqli_num_rows($exutequery)==1)
   {
    
    while($row=mysqli_fetch_assoc($exutequery))
    {
        session_start();
        $_SESSION["email"]=$row["emp_email"];
        $_SESSION["type"] = $row["emp_role"];
        echo("1");

    }

   }
   else{
    echo("2");
   }
}
?>
