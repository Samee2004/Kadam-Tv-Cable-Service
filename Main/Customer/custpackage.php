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
            <h2 class="text-gray-900 text-lg font-bold"><?php echo $row["pack_name"] ?></h2>
            <h3 class="mt-2 text-xl font-bold text-yellow-500 text-center"> ₹ <?php echo $row["pack_price"] ?></h3>
            <p class="text-sm font-semibold text-gray-400">Upto <?php $get_number_of_channels = "SELECT * FROM `package_has_channel` WHERE `phc_package_id` = '$pack_id' ";
                            // printing numbeer of channels using mysqli_num_rows which show number of rows in package_has_channels
                            echo(mysqli_num_rows(mysqli_query($con,$get_number_of_channels))); ?> channels</p>
            <button type="button" onclick="addtocart(<?php echo $pack_id; ?>,'p')" class="text-sm mt-6 px-4 py-2 bg-yellow-400 text-white rounded-lg  tracking-wider hover:bg-yellow-300 outline-none">Add to cart</button>
            <button class="text-sm mt-6 px-4 py-2 bg-yellow-400 text-white rounded-lg  tracking-wider hover:bg-yellow-300 outline-none">Add to cart</button>

          </div>
        </div>
      </div>

                            <?php
                        }
                    }
                            ?>

      
    </div>
</section>
    
          
        </main>
      </div>
    </div>
  </body>
</html>











