<?php

ob_start();


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
        $_SESSION["firstname"] = $row["emp_fname"];
        $_SESSION["lastname"] = $row["emp_lname"];
        if(
            $row["emp_role"]=="a"
        ){
            echo("1");
        }
        elseif(
            $row["emp_role"]=="m"
        ){
            echo("2");
        }
        else {
                echo("3");
            
        }
    }

   }
   else{
    echo("4");
   }
}

ob_flush();

?>
