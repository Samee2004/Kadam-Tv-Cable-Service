<?php
$hostname="localhost";
$username="root";
$password="";
$database="tv cable connection";
$con=mysqli_connect($hostname,$username,$password,$database);
if(mysqli_connect_errno()){
    echo("not connected");
}
else{
    echo("connected");
}
?>