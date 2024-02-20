<?php 
session_start(); 
if(isset($_SESSION["email"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["type"])  )
{
  if ($_SESSION["type"]=="c") {
    $email = $_SESSION["email"];
    $firstname=$_SESSION["firstname"];
    $lastname=$_SESSION["lastname"];
  }
  else{
    echo ("<script>location.href='Login.php'</script>");

}
}else{
    echo ("<script>location.href='Login.php'</script>");

}
include("../../config/connect.php");
date_default_timezone_set('Asia/Kolkata');
$currentDate = date("Y-m-d");
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blank - Channels list</title>
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
          

<!-- dropdown -->
<div class="flex mt-4 space-y-4 md:space-y-0 md:space-x-4 md:flex-row flex-col items-center  justify-center	 ">

<form class="w-full">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white ">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-black-500 focus:border-black-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black-500 dark:focus:border-black-500" placeholder="Search Channel name" required>
        <button id="search_button" type="button" class="text-white absolute end-2.5 bottom-2.5 bg-purple-700 hover:bg-purple-800  font-medium rounded-lg text-sm px-4 py-2 dark:bg-black-600 dark:hover:bg-black-700 dark:focus:ring-black-800">Search</button>
    </div>
</form>
<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white max-w-lg bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Filter 
  <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg>
</button>
</div>


<!-- Filter Dropdown menu -->
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow max-w-4xl dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 mr-6 " aria-labelledby="dropdownDefaultButton">
      <li>
        <div id="accordion-nested-parent" data-accordion="collapse">
          <div class="grid max-w-screen-xl px-4 py-5 mx-auto text-gray-900 dark:text-white sm:grid-cols-2 md:grid-cols-3 md:px-6">
            <ul aria-labelledby="mega-menu-full-dropdown-button">
                <li>
                  <div  class="block p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 h-80 overflow-y-scroll">
                  <div class="font-semibold">
                    Language
                  </div>
                    <?php
                      $getlanguagequery="SELECT * FROM `language`";
                      $result=mysqli_query($con,$getlanguagequery);
                      if(mysqli_num_rows($result)>0)
                      {
                        while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <div class="flex itdems-center mb-4">
                      <input id="default-checkbox" type="checkbox" value="<?php
                          echo($row["lang_name"]);
                        ?>" class="filterlanguage w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="default-checkbox" class="ms-2 text-sm text-gray-900 dark:text-gray-300">
                      <?php
                          echo($row["lang_name"]);
                        ?>
                      </label>
                        
                    </div>
                      <?php
                        }
                       }
                    ?>       
                </div>
              </li>
            </ul>
            <ul aria-labelledby="mega-menu-full-dropdown-button" class="ml-4">
                <li>
                <div  class="block p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 h-80 overflow-y-scroll">
                  <div class="font-semibold">
                    Genre
                  </div>
                  <?php
                    $getgenrequery="SELECT * FROM `genre`";
                      $result=mysqli_query($con,$getgenrequery);
                        if(mysqli_num_rows($result)>0)
                          {
                            while($row=mysqli_fetch_assoc($result)){
                  ?>
                  <div class="flex itdems-center mb-4">
                      <input id="default-checkbox" type="checkbox" value="<?php echo($row["gen_name"]); ?>" class="filter_genre w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="default-checkbox" class="ms-2 text-sm text-gray-900 dark:text-gray-300">
                        <?php
                        echo($row["gen_name"]);
                        ?>
                     </label>
                    
                  </div>                   
                    <?php
                        }
                      }
                    ?>     
                </div>
              </li>
            </ul>
          
            <ul aria-labelledby="mega-menu-full-dropdown-button">
                <li>
                  <div  class="block p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                  <div class="font-semibold">
                    Quality
                  </div>
                  <div class="flex items-center mb-4">
                    <input id="default-checkbox" type="checkbox" value="SD" class="filter_quality w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="default-checkbox" class="ms-2 text-sm text-gray-900 dark:text-gray-300">
                        SD
                      </label>
                  </div>
                  <div class="flex items-center">
                    <input id="checked-checkbox" type="checkbox" value="HD" class="filter_quality w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="checked-checkbox" class="ms-2 text-sm text-gray-900 dark:text-gray-300">
                    HD
                  </label>
                  </div>
                </div>
              </li>
            </ul>
            
        </div>
             
        </div>
      </li>
    </ul>
</div>


            <div class="flex flex-wrap m-4 text-center">

                    <?php
                            $getchannel="SELECT * FROM channels";
                            $exutequery=mysqli_query($con,$getchannel);
                            if(mysqli_num_rows($exutequery)>0)
                            {

                                while($row_of_channels=mysqli_fetch_assoc($exutequery))
                                {

                                ?>
                                    <div class="p-4 sm:w-1/2 lg:w-1/3 w-full hover:scale-105 duration-500 channel_name">
                                        <div class=" flex items-center  justify-between p-4  rounded-lg bg-white shadow-indigo-50 shadow-md">
                                        <div>
                                            <h2 class="text-yellow-500 text-xl font-bold text-left ">
                                            <?php echo($row_of_channels["Chan_name"]); 
                                            ?>
                                            </h2>
                                            <h3 class="mt-2 text-lg font-bold text-gray-900 text-left">Rs. 
                                            <?php echo($row_of_channels["chan_price"]);
                                            ?>
                                            </h3>
                                            <p class="text-sm font-semibold text-gray-400 text-left">Genre : 
                                              <span class="channelgenre">
                                              <?php 
                                                        $genre=$row_of_channels["chan_genre"];
                                                        $getgenre="SELECT * FROM `genre` WHERE `gen_id` =$genre";
                                                        $exutegenre=mysqli_query($con,$getgenre);
                                                        if(mysqli_num_rows($exutegenre)>0)
                                                        {

                                                    while($row_of_genre=mysqli_fetch_assoc($exutegenre))
                                                    {
                                                        $genrename= $row_of_genre["gen_name"];
                                                        echo($row_of_genre["gen_name"]);
                                                    }
                                                }
                                                        ?>
                                              </span>
                                                
                                            </p>
                                            <p class="text-sm font-semibold text-gray-400 text-left">Language :
                                              <span class="languagename">
                                              <?php 
                                                    $chan_language=$row_of_channels["chan_language"];
                                                    $getlanguage="SELECT * FROM `language` WHERE `lang_id` =$chan_language";
                                                    $exutelanguage=mysqli_query($con,$getlanguage);
                                                    if(mysqli_num_rows($exutelanguage)>0)
                                                    {

                                                while($row_of_language=mysqli_fetch_assoc($exutelanguage))
                                                {
                                                    $languagename= $row_of_language["lang_name"];
                                                    echo($row_of_language["lang_name"]);
                                                }
                                            }
                                                ?>
                                              </span> 
                                               
                                            </p>
                                            <p class="text-sm font-semibold text-gray-400 text-left">Quality : 
                                              <span class="channelquality">
                                              <?php echo($row_of_channels["chan_quality"]); 
                                                ?>
                                              </span>
                                                
                                            </p>
                                            <?php
                                            $chan_id=$row_of_channels['chan_id'];
                                            
                                            $currentDate = date("Y-m-d", strtotime($currentDate));
                                            $subscribed= "SELECT * FROM `subscribechannel`,`subscribeforchannel` WHERE sub_cust_id='$email' AND `subscribeforchannel`.`subchan_id`=`subscribechannel`.`sub_chan_id` AND `subscribeforchannel`.`channel_id`= '$chan_id' AND `subscribechannel`.`sub_end_date`> '$currentDate' ";
                                            $exutequerysubcribed= mysqli_query($con,$subscribed);
                                            
                                            if(
                                              mysqli_num_rows($exutequerysubcribed)>0
                                              
                                            ){
                                               ?>

                                               <p class="text-sm mt-6 px-4 py-2 bg-black text-white rounded-lg  tracking-wider hover:bg-yellow-600 outline-none">Already subscribed</p>

                                               <?php
                                             

                                              
                                              }else{
                                              ?>
                                              
                                                <button type="button" onclick="addtocart(<?php echo $row_of_channels['chan_id']; ?>,'c')" class="text-sm mt-6 px-4 py-2 bg-black text-white rounded-lg  tracking-wider hover:bg-yellow-600 outline-none">
                                                  
                                                Add to cart
                                                </button>
                                              <?php
                                            }
                                            ?>
                                        </div>
                                        <div
                                            class="bg-gradient-to-tr from-yellow-500 to-yellow-400 w-32 h-32  rounded-full  border-white  border-dashed border-2  flex justify-center items-center "
                                            style="background-size:cover; background-image:url('')"
                                            >
                                            <div>
                                            <img src="<?php  echo($row_of_channels["chan_img"]); 
                                            ?>" alt="">
                                            
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
        </main>
      </div>
    </div>
    
    <script src="../../js/filterchan.js"></script>
  </body>
</html>

