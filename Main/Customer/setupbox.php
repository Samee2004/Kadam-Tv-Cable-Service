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
    <title>Set-top Box</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
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
                  
        <div class="  grid grid-cols-1 lg:grid-cols-2 gap-4">

        <!-- Right Pane -->
        <div class="w-full bg-gray-100  flex items-center justify-center">
                <div class="max-w-md w-full p-6">
                <h1 class="text-3xl font-semibold mb-6 text-black text-center">New Set-top Connection</h1>
                <h1 class="text-sm font-semibold mb-6 text-gray-500 text-center">Join to Our Community with all time access and free </h1>
                
                <form  class="space-y-4">
                    <!-- Your form elements go here -->
                    <input type="text" value="<?php echo($email); ?>" class="hidden" id="user_email">

                    <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Requesting Date</label>
                    <input type="text" id="stbdate" name="stbdate" class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    <span id="dateError" class="text-red-500 hidden">Please enter a date.</span>
    
                </div>
                    <div>
                    <label for="time" class="block text-sm font-medium text-gray-700">Requesting Time</label>
                    <input type="text" id="stbtime" name="stbtime" class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    <span id="timeError" class="text-red-500 hidden">Please enter a time.</span>
    
                </div>
                    <div>
                    <button type="button"id="signupBtn" class="w-full bg-black text-white p-2 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">Submit</button>
                    </div>
                </form>
                
                </div>
            </div>
            <!-- Left Pane -->
            <div class=" bg-white text-black w-full">
                <div class="max-w-full text-left flex flex-col space-y-4">
                    <?php
                        $get_req = "SELECT * FROM `installs` WHERE cust_email='$email'";
                        $execute_req = mysqli_query($con,$get_req);
                        if(mysqli_num_rows($execute_req)>0)
                        {
                            while ($row = mysqli_fetch_assoc($execute_req)) {
                                ?>
                            <div class="max-w-full rounded-xl shadow-md text-black border">
                                <div class="p-4 bg-white">
                                    <div>
                                    <h2 class="mb-4 text-xl font-bold text-black">
                                    <?php echo($row["installs_status"]); ?>
                                    </h2>
                                    <p class="text-black">
                                      Requested Date :  <?php echo($row["installs_req_date"]); ?>
                                    </p>
                                    <p class="text-black">
                                      Requested Time :  <?php echo($row["installs_req_time"]); ?>
                                    </p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        }
                        
                    ?>
                </div>
            </div>
            
        </div>


        

          </div>
        </main>
      </div>
    </div>
  </body>
</html>

<script src="../../js/settopbox.js"></script>
    

