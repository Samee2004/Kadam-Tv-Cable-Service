<?php
include("../../config/connect.php");

if (!empty($_POST["packagename"]) && !empty($_POST["packageprice"]) &&  !empty($_POST["channels"])) {
    $packagename = $_POST["packagename"];
    $packageprice = $_POST["packageprice"];
    $channels = $_POST["channels"];
    $insert_package = "INSERT INTO `packages` (`pack_name`, `pack_price`) VALUES ('$packagename', '$packageprice')";
    $execute_insert_package = mysqli_query($con,$insert_package);
    if($execute_insert_package){
        $package_insertId = mysqli_insert_id($con);
        $count = 0;
        foreach ($channels as $value) {
            $dynamicVariableName = "insert_package_channel" . $count;
                $$dynamicVariableName = "INSERT INTO `package_has_channel` (`phc_package_id`, `phc_channel_id`) VALUES ('$package_insertId', '$value')";
                if(mysqli_query($con,$$dynamicVariableName)){
                    $count = $count + 1;
                }
        }
        if($count==count($channels)){
            echo(1);
        }else{
            echo(2);
        }
    }else{
        echo(2);
    }
}

if (!empty($_POST["Updatedpackagename"]) && !empty($_POST["Updatedpackageprice"]) &&  !empty($_POST["Updatedchannels"]) && !empty($_POST["packageid"])) {
    $packagename = $_POST["Updatedpackagename"];
    $packageprice = $_POST["Updatedpackageprice"];
    $channels = $_POST["Updatedchannels"];
    $id = $_POST["packageid"];
    $update_package = "UPDATE `packages` SET `pack_name` = '$packagename',`pack_price` = '$packageprice' WHERE `packages`.`pack_id` = '$id' ";
    $execute_update_package = mysqli_query($con,$update_package);
    if($execute_update_package){
        $delete_already_in_package_channels = "DELETE FROM `package_has_channel` WHERE `phc_package_id` = '$id' ";
        if(mysqli_query($con,$delete_already_in_package_channels))
        {
            $count = 0;
            foreach ($channels as $value) {
                $dynamicVariableName = "insert_package_channel" . $count;
                    $$dynamicVariableName = "INSERT INTO `package_has_channel` (`phc_package_id`, `phc_channel_id`) VALUES (' $id', '$value')";
                    if(mysqli_query($con,$$dynamicVariableName)){
                        $count = $count + 1;
                    }
            }
            if($count==count($channels)){
                echo(1);
            }else{
                echo(2);
            }
        }else{
            echo(2); 
        }
    }else{
        echo(2);
    }
}
if (!empty($_POST["delete_package_id"])) {
    $package_id = $_POST["delete_package_id"];
    $delete_package = "DELETE FROM `packages`  WHERE `pack_id` = '$package_id' ";
    $execute_delete_package = mysqli_query($con,$delete_package);
    if($execute_delete_package){
            echo(1);
    }else{
        echo(2);
    }
}
?>
