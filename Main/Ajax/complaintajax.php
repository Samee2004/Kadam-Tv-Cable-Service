<?php
include("../../config/connect.php");

if (!empty($_POST["description"]) && !empty($_POST["userid"])) {
    date_default_timezone_set('Asia/Kolkata');
    $description = $_POST["description"];
    $userid = $_POST["userid"];
    $currentDate = date("Y-m-d");
    $complaintquery = "INSERT INTO `complaint` ( `complaint_issue`, `complaint_date`, `complaint_status`, `complaint_cust`) VALUES ('$description,', '$currentDate', 'Pending', '$userid')";
   
    $exutequery = mysqli_query($con, $complaintquery);

    if ($exutequery ) {
        echo "1";
    } else {
        echo "2";
    }
}
if (!empty($_POST["complaintId"]) && !empty($_POST["technicanId"])) {
    $complaintId = $_POST["complaintId"];
    $technicanId= $_POST["technicanId"];
    $update_assign = "UPDATE `complaint` SET `complaint_status` = 'Assigned',`complaint_emp`='$technicanId' WHERE `complaint`.`complaint_id` = ' $complaintId'";
    $exutequery_update_assign = mysqli_query($con,$update_assign);
    if($exutequery_update_assign){
        echo(1);
    }else{
        echo(2);
    }
}

if (!empty($_POST["ComplaintID"]) && !empty($_POST["Complaint_Status"])) {
    $complaintId = $_POST["ComplaintID"];
    $Complaint_Status= $_POST["Complaint_Status"];
    $update_assign = "UPDATE `complaint` SET `complaint_status` = '$Complaint_Status' WHERE `complaint`.`complaint_id` = ' $complaintId'";
    $exutequery_update_assign = mysqli_query($con,$update_assign);
    if($exutequery_update_assign){
        echo(1);
    }else{
        echo(2);
    }
}

if (!empty($_POST["Complaint_ID"]) && !empty($_POST["Complaint_status"]) && !empty($_POST["Complaint_notsolved"])) {
    $Complaint_Id = $_POST["Complaint_ID"];
    $Complaint_status= $_POST["Complaint_status"];
    $Complaint_notsolved= $_POST["Complaint_notsolved"];
    $update_assign = "UPDATE `complaint` SET `complaint_status` = '$Complaint_status', `complaint_notsolve` = '$Complaint_notsolved' WHERE `complaint`.`complaint_id` = ' $Complaint_Id'";
    $exutequery_update_assign = mysqli_query($con,$update_assign);
    if($exutequery_update_assign){
        echo(1);
    }else{
        echo(2);
    }
}

?>
