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
    <title>Packages</title>
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
  <input type="text" id="user_email" value="<?php echo($email); ?>" class="hidden">

    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >

      <div class="flex flex-col flex-1">
      <!-- header -->
      <?php include("./layouts/header/cust_header.php"); ?>



        <main class="h-full pb-1 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-0 mx-auto grid">
          <!-- add your code below -->

          <!-- modal no stb warning-->

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">You do not have a Set-Top-Box connection, so you cannot access channels or packages.</h3>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Please obtain a Set-Top-Box connection to enjoy our channel offerings and packages.</h3>
                <a href="setupbox.php" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Ok, get STB
                  </a>
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                  No, cancel
                </button>
            </div>
        </div>
    </div>
</div>

          <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
    <div class="text-center pb-1">
        <h2 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900">
            Check our best packages available
        </h2>
        <h2 class="text-sm text-grey-900 mt-5">
                    Channel availability will be subject to headend capacity and technical feasibility in respective locations.
            NCF will be applied basis number of channels selected by the subscriber as per the TRAI regulation.
            Below Rates are exclusive of Taxes. GST is payable by the Subscriber as applicable.
            Prices mentioned here are subject to change by Broadcasters.
            For more details please contact your local cable operator.
        </h2>
    </div>
    <!-- component -->
<section class="text-gray-600 body-font bg-gray-50 mt-5  flex justify-center items-center">
  <div class="container px-5 pb-5 mx-auto">
    <div class="flex flex-wrap -m-4 text-center">
    <?php
                    $get_packages = "SELECT * FROM `packages`";
                    $execute_get_packages = mysqli_query($con,$get_packages);
                    if(mysqli_num_rows($execute_get_packages)>0){
                        while($row = mysqli_fetch_assoc($execute_get_packages)){
                            $pack_id = $row["pack_id"];
                            // query to get number of channels using package id
                            ?>
                                <div class="p-4 sm:w-1/2 lg:w-1/3 w-full hover:scale-105 duration-500">
                                  <div class=" flex items-center  justify-center p-4  rounded-lg bg-white shadow-indigo-50 shadow-md">
                                    <div>
                                      <h2 class="text-yellow-600 text-lg font-bold"><?php echo $row["pack_name"] ?></h2>
                                      <h3 class="mt-2 text-xl font-bold text-gray-900 text-center"> ₹ <?php echo $row["pack_price"] ?> / Month</h3>
                                      <p class="text-sm font-semibold text-gray-400">Upto <?php $get_number_of_channels = "SELECT * FROM `package_has_channel` WHERE `phc_package_id` = '$pack_id' ";
                                                      // printing numbeer of channels using mysqli_num_rows which show number of rows in package_has_channels
                                                      echo(mysqli_num_rows(mysqli_query($con,$get_number_of_channels))); ?> channels</p>
                                      <button type="button" 
                                      <?php
                                          $custcheckstb ="SELECT * FROM `installs` WHERE `cust_email`= '$email'";
                                          $execute_custcheckstb= mysqli_query($con,$custcheckstb);
                                          if(mysqli_num_rows($execute_custcheckstb)==1)
                                          {
                                            ?>
                                            onclick="addtocart(<?php echo $row_of_channels['chan_id']; ?>,'c')"
                                            <?php
                                          }
                                          else {
                                            ?>
                                            data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            <?php
                                            
                                          }
                                              ?>
                                      onclick="addtocart(<?php echo $pack_id; ?>,'p')" class="text-sm mt-6 px-4 py-2 bg-gray-900 text-white rounded-lg  tracking-wider hover:bg-yellow-600 outline-none">Add to cart</button>
                                      <a href="viewpackchan.php?id=<?php echo $pack_id; ?>&name=<?php echo $row["pack_name"] ?>&price=<?php echo $row["pack_price"] ?>" class="text-sm mt-6 px-4 py-2 bg-gray-900 text-white rounded-lg  tracking-wider hover:bg-yellow-600 outline-none">View Channels</a>

                                    </div>
                                  </div>
                                </div>

                            <?php
                        }
                    }
                    include("./botchat.php")
                            ?>

      
    </div>
</section>
    
          
        </main>
      </div>
    </div>
  </body>
</html>











