<?php 
session_start(); 
if(isset($_SESSION["email"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["type"])  )
{
    $email = $_SESSION["email"];
    $firstname=$_SESSION["firstname"];
    $lastname=$_SESSION["lastname"];
}else{
    echo ("<script>location.href='Login.php'</script>");

}
include("../../config/connect.php");
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blank - Windmill Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="../../js/init-alpine.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >

      <div class="flex flex-col flex-1">
      <!-- header -->
      <?php include("./layouts/header/cust_header.php"); ?>



        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-0 mx-auto grid">
          <!-- add your code below -->
          <div class="flex items-center justify-center p-5 ">
    <!-- Author: FormBold Team -->
    <div class="mx-auto w-full max-w-lg p-6 bg-white rounded-lg">
    <div class="w-full">
      <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center mb-3">
                  Update your details
              </h1>
        <form class="space-y-4 md:space-y-6 mb-10">
        <input type="text" id="user_email" class="hidden" value="<?php echo($email); ?>">

          <!-- Email input -->
          <?php
            $get_user_details = "SELECT * FROM `customer` WHERE `cust_email` = '$email' ";
            $result_of_query = mysqli_query($con,$get_user_details);
            if (mysqli_num_rows($result_of_query)==1) {
                while($row=mysqli_fetch_assoc($result_of_query))
                {
                    $cust_email = $row["cust_email"];
                    $cust_first_name = $row["cust_fname"];
                    $cust_middle_name = $row["cust_mname"];
                    $cust_last_name = $row["cust_lname"];
                    $cust_phone = $row["cust_phone"];
                    $cust_flat = $row["cust_flat"];
                    $cust_building = $row["cust_building"];
                    $cust_street = $row["cust_street"];
                    $cust_pincode = $row["cust_pincode"];
                }
            }

            ?>
          <div class="w-full">
                      <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your First Name</label>
                      <input type="text" name="first-name" value="<?php echo $cust_first_name ?>" id="first-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your First Name" required="">
                      <span id="FirstError" class="text-red-500"></span>
                    </div>
                <div class="w-full">
                      <label for="middle-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your Middle Name</label>
                      <input type="text" name="middle-name" value="<?php echo $cust_middle_name ?>" id="middle-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Middle Name" required="">
                      <span id="MiddleError" class="text-red-500"></span>
                    </div>
                <div class="w-full">
                      <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your Full Name</label>
                      <input type="text" name="last-name" value="<?php echo $cust_last_name ?>" id="last-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Last Name" required="">
                      <span id="LastError" class="text-red-500"></span>    
                </div>
                <!-- Email input -->
                <div class="w-full">
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your Email</label>
                      <input readonly type="email" name="email" value="<?php echo $cust_email ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                      <span id="emailError" class="text-red-500"></span>
                </div>          
                <div class="w-full">
                      <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your Contact</label>
                      <input type="tel" name="contact" id="contact" value="<?php echo $cust_phone ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="985****6" required="">
                      <span id="contactError" class="text-red-500"></span>
                </div>
                
        
          <!-- flat and building -->
            <div class="flex">
            <div class="w-full mr-1">
                      <label for="flat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Flat</label>
                      <input type="text" name="flat" id="flat" value="<?php echo $cust_flat ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="wing-Flat" required="">
                      <span id="flatError" class="text-red-500"></span>
                </div>
                <div class="w-full ml-1">
                      <label for="building" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Building/Chawl/other</label>
                      <input type="text" name="building" value="<?php echo $cust_building ?>" id="building" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bluiding/chawl/other" required="">
                      <span id="buildingError" class="text-red-500"></span>
                </div>
            </div>
                <div>
                      <label for="street-address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Street Address</label>
                      <input type="text" name="street-address" id="street-address" value="<?php echo $cust_street ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Street Address" required="">
                      <span id="streetAddressError" class="text-red-500"></span>
                </div>

                <div>
                  <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pincode</label>
                  <select id="pincode" value="<?php echo $cust_pincode ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose your pincode</option>
                        <option value="400042">400042</option>
                        <option value="400041">400041</option>
                  </select>
                  <span id="pincodeError" class="text-red-500"></span>
                </div>
               
          <!-- Submit button -->
          <button type="button" id="updateForm" class="w-full border text-white bg-black hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>

          
        </form>
      </div>
    </div>
</div>
          </div>
        </main>
      </div>
    </div>
    <script src="../../js/update.js"></script>
  </body>
</html>

