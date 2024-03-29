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
date_default_timezone_set('Asia/Kolkata');

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
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
  <input type="text" value="<?php echo($email); ?>" class="hidden" id="user_email">
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
                    $count = 1;
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
                                Subcription <?php echo $count; ?>
                            </p>
                            <p class="text-yellow-500 text-[50px] leading-[63px] font-bold">
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
                            
                            <div class="mt-[25px] w-full flex flex-wrap">
                              
                            <a href="viewsubcription.php?id=<?php echo($subscription_id);?>" class="text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                View Subscription 
                            </a>
                            <?php
                                $start_date = $row["sub_start_date"];
                                $end_date = $row["sub_end_date"];
                                $current_date = date("Y-m-d");

                                if ($start_date <= $current_date && $end_date >= $current_date)  {
                                ?>
                                    <!-- User is in subscription period -->
                                    <!-- Your code for whatever you want to display if the user is in subscription -->
                                <?php
                                } else {
                                    // User is not in subscription period, display recharge button
                                ?>
                                    <button type="button" onclick="PayRecharge(<?php echo $subscription_id; ?>,<?php echo($row['pay_amount'])?>)" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Recharge</button>
                                <?php
                                }
                            ?>


                        </div>
                        </div>
                        </div>
                        
                    </div>
                        <?php
                        $count=$count+1;
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
    <script src="../../js/subscribe.js"></script>
  </body>
</html>












