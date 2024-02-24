<?php
include("../../config/connect.php");

if (!empty($_POST["serialnum"]) && !empty($_POST["stbprice"])) {
    $serialnum = $_POST["serialnum"];
    $stbprice = $_POST["stbprice"];

    $insert_stb="INSERT INTO `settopbox` (`stb_number`, `stb_price`, `stb_status`) VALUES ('$serialnum', '$stbprice', 'Available')";
    if(mysqli_query($con,$insert_stb))
        {
            echo("1");
}
else {
    echo("2");
}
}

if (!empty($_POST["delete_stb_id"])) {
    $delete_stb_id = $_POST["delete_stb_id"];
    $delete_stb = "DELETE FROM `settopbox` WHERE `settopbox`.`stb_number` = '$delete_stb_id'";
   
    $execute_delete_stb = mysqli_query($con,$delete_stb);
    if($execute_delete_stb){
            echo(1);
    }else{
        echo(2);
    }
}

if (!empty($_POST["updateserialnum"]) && !empty($_POST["updatestbprice"]) && !empty($_POST["updatestatus"])) {
    $updateserialnum = $_POST["updateserialnum"];
    $updatestbprice = $_POST["updatestbprice"];
    $updatestatus = $_POST["updatestatus"];

    $update_stb = "UPDATE `settopbox` SET `stb_price` = '$updatestbprice',`stb_status` = '$updatestatus' WHERE `settopbox`.`stb_number` = '$updateserialnum'";
   
    $execute_update_stb = mysqli_query($con,$update_stb);
    if($execute_update_stb){
            echo(1);
    }else{
        echo(2);
    }
}
?>