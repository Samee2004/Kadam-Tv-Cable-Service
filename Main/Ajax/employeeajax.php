<?php
include("../../config/connect.php");
if(
    !empty($_POST["FisrtName"]) && !empty($_POST["MiddeName"]) && !empty($_POST["LastName"]) && !empty($_POST["email"]) && !empty($_POST["contact"])  && !empty($_POST["flat"]) && !empty($_POST["building"]) && !empty($_POST["streetAddress"]) && !empty($_POST["role"]) && !empty($_POST["city"])
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
    $role=$_POST["role"];
    $city  = $_POST["city"];
   $registerquery="INSERT INTO `employee` (`emp_email`, `emp_password`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_flat`, `emp_building`, `emp_street`, `emp_city`, `emp_phone`, `emp_role`) VALUES ('$email', '$contact', '$FisrtName', '$MiddeName', '$LastName', '$flat', '$building', '$streetAddress', '$city', '$contact', '$role')";

   $exutequery=mysqli_query($con,$registerquery);
   if($exutequery)
   {
    echo("1");
   }
   else{
    echo("2");
   }
}

if(
    !empty($_POST["delete_employee_id"])
)
{
    $delete_employee_id=$_POST["delete_employee_id"];

   $deletequery="DELETE FROM `employee` WHERE `employee`.`emp_email` = '$delete_employee_id'";

   $exutedeletequery=mysqli_query($con,$deletequery);
   if($exutedeletequery)
   {
    echo("1");
   }
   else{
    echo("2");
   }
}
if (!empty($_POST["get_employee_id"])) {
    $employee_id=$_POST["get_employee_id"];
    $get_employee = "SELECT * FROM `employee` WHERE emp_email='$employee_id'";
    $exuteget_employee=mysqli_query($con,$get_employee);
    if (mysqli_num_rows($exuteget_employee) == 1) {
        $employee_data = array(); // Array to store employee data
        while ($row_employee = mysqli_fetch_assoc($exuteget_employee)) {
            // Remove the emp_password field from each row
            unset($row_employee['emp_password']);
            $employee_data[] = $row_employee; // Append the modified row to the array
        }
        echo json_encode($employee_data); // Convert the array to JSON and send it
    } else {
        // Handle the case where no or multiple rows are returned
        echo json_encode(array("message" => "No employee data found or multiple rows returned"));
    }
}
if (
    !empty($_POST["updateFirstName"]) && 
    !empty($_POST["updateMiddleName"]) && 
    !empty($_POST["updateLastName"]) && 
    !empty($_POST["updateEmail"]) && 
    !empty($_POST["updateContact"]) &&  
    !empty($_POST["updateFlat"]) && 
    !empty($_POST["updateBuilding"]) && 
    !empty($_POST["updateStreetAddress"]) && 
    !empty($_POST["updateRole"]) && 
    !empty($_POST["updateCity"])
) {
    $updateFirstName = $_POST["updateFirstName"];
    $updateMiddleName = $_POST["updateMiddleName"];
    $updateLastName = $_POST["updateLastName"];
    $updateEmail = $_POST["updateEmail"];
    $updateContact = $_POST["updateContact"];
    $updateFlat = $_POST["updateFlat"];
    $updateBuilding = $_POST["updateBuilding"];
    $updateStreetAddress = $_POST["updateStreetAddress"];
    $updateRole = $_POST["updateRole"];
    $updateCity = $_POST["updateCity"];

    $updateQuery = "UPDATE `employee` SET 
                    `emp_fname` = '$updateFirstName', 
                    `emp_mname` = '$updateMiddleName', 
                    `emp_lname` = '$updateLastName', 
                    `emp_flat` = '$updateFlat', 
                    `emp_building` = '$updateBuilding', 
                    `emp_street` = '$updateStreetAddress', 
                    `emp_city` = '$updateCity', 
                    `emp_phone` = '$updateContact', 
                    `emp_role` = '$updateRole' 
                    WHERE `emp_email` = '$updateEmail'";

    $executeQuery = mysqli_query($con, $updateQuery);
    if ($executeQuery) {
        echo "1"; // Success
    } else {
        echo "2"; // Failure
    }
} 


?>