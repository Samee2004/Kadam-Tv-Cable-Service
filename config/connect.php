<?php
$hostname="localhost";
$username="root";
$password="";
$database="tv cable connection";
$con=mysqli_connect($hostname,$username,$password,$database);
if(mysqli_connect_errno()){
    echo("not connected");
}


// $hostname="localhost";
// $username="id20887981_samee2004";
// $password="Samee_kadam@21";
// $database="id20887981_tv_cable_connection";
// $con=mysqli_connect($hostname,$username,$password,$database);
// if(mysqli_connect_errno()){
//     echo("not connected");
// }
?>