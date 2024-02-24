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
$sub_id = $_GET["id"];
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subcription</title>
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
                  <div class="p-5">
                    <div>
                        <p class="text-[#00153B] text-2xl text-center leading-[24px] font-bold">
                                    View Subscribed Channels and Packages
                        </p>
                    </div>
                    <div class="my-5">
                        <p class="text-lg font-bold mb-4">
                            Subscribed Channels
                        </p>
                        <div class="flex flex-wrap m-4 text-center">

                            <?php
                            $getchannel = "SELECT * FROM `channels`, `language`, `genre`, `subscription`, `subscribeforchannel` WHERE `subscription`.`sub_id`=`subscribeforchannel`.`subchan_id` AND `channels`.`chan_language`=`language`.`lang_id` AND `genre`.`gen_id`=`channels`.`chan_genre` AND `subscribeforchannel`.`channel_id`=`channels`.`chan_id` AND `subscription`.`sub_id`= '$sub_id' ";
                            $exutequery = mysqli_query($con, $getchannel);
                            if (mysqli_num_rows($exutequery) > 0) {
                                while ($row_of_channels = mysqli_fetch_assoc($exutequery)) {
                                    ?>
                                        <div class="p-4 sm:w-1/2 lg:w-1/3 w-full hover:scale-105 duration-500 channel_name">
                                            <div class=" flex items-center  justify-between p-4  rounded-lg bg-white shadow-indigo-50 shadow-md">
                                            <div>
                                                <h2 class="text-yellow-500 text-xl font-bold text-left ">
                                                <?php echo $row_of_channels["Chan_name"]; ?>
                                                </h2>
                                                <h3 class="mt-2 text-lg font-bold text-gray-900 text-left">Rs. 
                                                <?php echo $row_of_channels["chan_price"]; ?>
                                                </h3>
                                                <p class="text-sm font-semibold text-gray-400 text-left">Genre : 
                                                <span class="channelgenre">
                                                    <?php echo $row_of_channels["gen_name"]; ?>
                                                </span>
                                                    
                                                </p>
                                                <p class="text-sm font-semibold text-gray-400 text-left">Language :
                                                <span class="languagename">
                                                    <?php echo $row_of_channels["lang_name"]; ?>
                                                </span> 
                                                
                                                </p>
                                                <p class="text-sm font-semibold text-gray-400 text-left">Quality : 
                                                <span class="channelquality">
                                                <?php echo $row_of_channels["chan_quality"]; ?>
                                                </span>
                                                    
                                                </p>
                                                
                                            </div>
                                            <div
                                                class="bg-gradient-to-tr from-yellow-500 to-yellow-400 w-32 h-32  rounded-full  border-white  border-dashed border-2  flex justify-center items-center "
                                                style="background-size:cover; background-image:url('')"
                                                >
                                                <div>
                                                <img src="<?php echo $row_of_channels[
                                                    "chan_img"
                                                ]; ?>" alt="">
                                                
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                
                            <?php
                                }
                            }else{
                                ?>
                                <h1>
                                    No Channels Subscribed
                                </h1>
                                <?php
                            }
                            
                            ?>
                        </div>
                    </div>
                    <div class="my-5">
                        <p class="text-lg font-bold mb-4">
                            Subscribed Packages
                        </p>
                        <div class="flex flex-wrap m-4 text-center">

                            <?php
                            $getchannel = "SELECT * FROM `packages`,`subscription`,`subscribeforpackage` WHERE `subscription`.`sub_id`=`subscribeforpackage`.`subpack_id` AND `subscribeforpackage`.`package_id`=`packages`.`pack_id` AND `subscription`.`sub_id`=1";
                            $exutequery_package = mysqli_query($con, $getchannel);
                            if (mysqli_num_rows($exutequery_package) > 0) {
                                while ($row_of_packages = mysqli_fetch_assoc($exutequery_package)) {
                                    ?>
                                         <div class="p-4 sm:w-1/2 lg:w-1/3 w-full hover:scale-105 duration-500">
                                            <div class=" flex items-center  justify-center p-4  rounded-lg bg-white shadow-indigo-50 shadow-md">
                                                <div>
                                                <h2 class="text-yellow-600 text-lg font-bold"><?php echo $row_of_packages["pack_name"] ?></h2>
                                                <h3 class="mt-2 text-xl font-bold text-gray-900 text-center"> ₹ <?php echo $row_of_packages["pack_price"] ?> / Month</h3>
                                                <p class="text-sm font-semibold text-gray-400">Upto <?php
                                                $pack_id = $row_of_packages["pack_id"];
                                                $get_number_of_channels = "SELECT * FROM `package_has_channel` WHERE `phc_package_id` = '$pack_id' ";
                                                                // printing numbeer of channels using mysqli_num_rows which show number of rows in package_has_channels
                                                                echo(mysqli_num_rows(mysqli_query($con,$get_number_of_channels))); ?> channels</p>
                                                                <div class="my-5">
                                                                <a href="viewpackchan.php?id=<?php echo $pack_id; ?>&name=<?php echo $row_of_packages["pack_name"] ?>&price=<?php echo $row_of_packages["pack_price"] ?>" class="text-sm mt-8 px-4 py-2 bg-gray-900 text-white rounded-lg  tracking-wider hover:bg-yellow-600 outline-none">View Channels</a>

                                                                </div>

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

