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
    <title>Subcription </title>
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
                  
         <!-- This is an example component -->
         <div class='flex min-h-screen pt-[30px] px-[40px]'>
            <div class="min-w-full">
                <p class="text-[#00153B] text-[20px] leading-[40px] font-semibold">
                    Your Subscription
                </p>
                <div class="mt-[20px] grid grid-cols-3 gap-[20px]">
                    <?php
                     $getsubscription="SELECT * FROM `subscription` , `payment` , `paidforsubscription` WHERE `subscription`.`sub_id`= `paidforsubscription`.`paid_sub_id`AND `paidforsubscription`.`paid_trans_id`=`payment`.`transaction_id` AND `subscription`.`sub_cust_id`='$email'";
                     $executegetsubscription= mysqli_query($con,$getsubscription);
                     if (mysqli_num_rows($executegetsubscription)> 0 ) {
                       while ($row= mysqli_fetch_assoc($executegetsubscription)) {
                        $subscription_id=$row["sub_id"];
                        ?>
                            <div key="1" class="w-full bg-[#fff] rounded-[10px] shadow-[0px 1px 2px #E1E3E5] border border-[#E1E3E5] divide-y">
                        <div class="pt-[15px] px-[25px] pb-[25px]">
                        <div> 
                            <p class="text-[#00153B] text-[19px] leading-[24px] font-bold">
                                Subcription 1
                            </p>
                            <p class="text-[#00153B] text-[50px] leading-[63px] font-bold">
                                ₹<?php echo($row["pay_amount"])?>
                            </p>
                        </div>
                        <div>
                            <p class="text-[#717F87] text-[18px] leading-[28px] font-medium">
                                <?php $get_number_of_channels = "SELECT * FROM `subscribeforchannel` WHERE `subchan_id` = '$subscription_id' ";
                                // printing numbeer of channels using mysqli_num_rows which show number of rows in package_has_channels
                                echo(mysqli_num_rows(mysqli_query($con,$get_number_of_channels))); ?> channels
                            </p>
                            <p class="text-[#717F87] text-[18px] leading-[28px] font-medium">
                            <?php $get_number_of_channels = "SELECT * FROM `subscribeforpackage` WHERE `subpack_id` = '$subscription_id' ";
                                // printing numbeer of channels using mysqli_num_rows which show number of rows in package_has_channels
                                echo(mysqli_num_rows(mysqli_query($con,$get_number_of_channels))); ?> Package
                            </p>
                            <p class="text-[#717F87] text-[18px] leading-[28px] font-medium">
                             <?php echo($row["sub_start_date"]);?> to <?php echo($row["sub_end_date"]); ?>
                            </p>
                            
                            <div class="mt-[25px]">
                            <button class="bg-[#006EF5] rounded-[5px] py-[15px] px-[25px] text-[#fff] text-[14px] leading-[17px] font-semibold">
                                View Subscription
                            </button>
                        </div>
                        </div>
                        </div>
                        
                    </div>
                        <?php
                       }
                     }
                     include("./botchat.php")
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












