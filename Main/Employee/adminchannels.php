<!-- <?php
// session_start();
// if(isset( $_SESSION["email"])){
//     if(isset( $_SESSION["type"]) && $_SESSION["type"] === "A"){
//         echo($_SESSION["email"]);
//     }else{
//         echo("<script>window.location='emp_login.php';</script>");
//     }
// }else{
//     echo("<script>window.location='emp_login.php';</script>");
// }
?> -->



 <?php 
session_start(); 
include("../../config/connect.php");
if(isset($_SESSION["email"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["type"])  )
{
    $email = $_SESSION["email"];
    $firstname=$_SESSION["firstname"];
    $lastname=$_SESSION["lastname"];
}else{
    echo ("<script>location.href='emp_login.php'</script>");

}
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
   <!-- navigation -->
   <?php include("./layout/emp_nav.php"); ?>
      <div class="flex flex-col flex-1">
      <!-- header -->
      <?php include("./layout/emp_header.php"); ?>



        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-0 mx-auto grid">
          <!-- add channel modal -->
 
          <!-- component -->
 <!-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> -->

<!-- add channel modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Channel
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Channel Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type channel name" required="">
                        <span id="nameError" class="text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-1 ">
                        <label for="chan_language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Language</label>
                        <select id="chan_language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select language</option>
                            <?php
                                $getlanguagequery="SELECT * FROM `language`";
                                $result=mysqli_query($con,$getlanguagequery);
                                if(mysqli_num_rows($result)>0)
                                {
                                    while($row=mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php
                                        echo($row["lang_id"]);
                                        ?>"><?php
                                        echo($row["lang_name"]);
                                        ?>
                                        </option>
                                        <?php
            
                                    }
                                }
                            ?>
                        </select>
                        <span id="languageyError" class="text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-1 ">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select genre</option>
                            <?php
                                $getgenrequery="SELECT * FROM `genre`";
                                $result=mysqli_query($con,$getgenrequery);
                                if(mysqli_num_rows($result)>0)
                                {
                                    while($row=mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php
                                        echo($row["gen_id"]);
                                        ?>"><?php
                                        echo($row["gen_name"]);
                                        ?>
                                        </option>
                                        <?php
            
                                    }
                                }
                            ?>
                        </select>
                        <span id="categoryError" class="text-red-500"></span>
                    </div>
                    
                    <div class="col-span-2 sm:col-span-1 ">
                        <label for="chan_quality" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quality</label>
                        <select id="chan_quality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select Quality</option>
                            <option value="SD">SD</option>
                            <option value="HD">HD</option>
                        </select>
                        <span id="chan_qualityError" class="text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-1 ">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Channel Price</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="₹" required="">
                        <span id="priceError" class="text-red-500"></span>
                    </div>
                    
                    <div class="col-span-2">
                        
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-28 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" />
                            </label>
                            <span id="imgError" class="text-red-500"></span>
                        </div> 
                        <img src="" alt="" id="preview1Image1">
                        <input type="text" id="dataURL"class="hidden">
                    </div>
                </div>
                <button id="submit_chann" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new product
                </button>
            </form>
        </div>
    </div>
</div> 

<!-- update channel modal-->
<div id="update-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                   Update Channel
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="update-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="update_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Channel Name</label>
                        <input type="text" name="name" id="update_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type channel name" required="">
                        <span id="update_nameError" class="text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-1 ">
                        <label for="update_chan_language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Language</label>
                        <select id="update_chan_language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select language</option>
                            <?php
                                $getlanguagequery="SELECT * FROM `language`";
                                $result=mysqli_query($con,$getlanguagequery);
                                if(mysqli_num_rows($result)>0)
                                {
                                    while($row=mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php
                                        echo($row["lang_id"]);
                                        ?>"><?php
                                        echo($row["lang_name"]);
                                        ?>
                                        </option>
                                        <?php
            
                                    }
                                }
                            ?>
                        </select>
                        <span id="update_languageyError" class="text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-1 ">
                        <label for="update_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                        <select id="update_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select genre</option>
                            <?php
                                $getgenrequery="SELECT * FROM `genre`";
                                $result=mysqli_query($con,$getgenrequery);
                                if(mysqli_num_rows($result)>0)
                                {
                                    while($row=mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php
                                        echo($row["gen_id"]);
                                        ?>"><?php
                                        echo($row["gen_name"]);
                                        ?>
                                        </option>
                                        <?php
            
                                    }
                                }
                            ?>
                        </select>
                        <span id="update_categoryError" class="text-red-500"></span>
                    </div>
                    
                    <div class="col-span-2 sm:col-span-1 ">
                        <label for="update_chan_quality" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quality</label>
                        <select id="update_chan_quality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select Quality</option>
                            <option value="SD">SD</option>
                            <option value="HD">HD</option>
                        </select>
                        <span id="update_chan_qualityError" class="text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-1 ">
                        <label for="update_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Channel Price</label>
                        <input type="number" name="price" id="update_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="₹" required="">
                        <span id="update_priceError" class="text-red-500"></span>
                    </div>
                    
                    <div class="col-span-2">
                        
                        <div class="flex items-center justify-center w-full">
                            <label for="update_dropzone-file" class="flex flex-col items-center justify-center w-full h-28 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="update_dropzone-file" type="file" class="hidden" />
                            </label>
                        </div> 
                        <input type="text" name="" id="channelid" class="hidden">
                        <img src="" alt="" id="update_preview1Image1">
                        <input type="text" id="update_dataURL"class="hidden">
                    </div>
                </div>
                <button id="update_submit_chann" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Update channel
                </button>
            </form>
        </div>
    </div>
</div> 

<section class="h-screen bg-gray-100 px-2 text-gray-600 antialiased" x-data="app">
    <div class="flex h-full flex-col justify-center">
        <!-- Table -->
        <div class="mx-auto w-full max-w-full rounded-sm border border-gray-200 bg-white shadow-lg">
            <header class="border-b border-gray-100 px-5 py-4 flex justify-between items-center">
                <div class="font-semibold text-gray-800">Manage Channels</div>
                <div class="flex">
                    <div>
                    <input type="text" class="w-full backdrop-blur-sm bg-white/20 py-2 pl-10 pr-4 rounded-lg focus:outline-none border-2 border-gray-300 focus:border-violet-300 transition-colors duration-300" placeholder="Search...">

                    </div>
                     <div>
                     <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class=" ml-3  text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Add Channels
                    </button>

                    <button id="update-button" data-modal-target="update-modal" data-modal-toggle="update-modal" class="hidden ml-3  text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Update Channels
                    </button>
                     </div>
                </div>
                
            </header>

            <div class="overflow-x-auto p-3">
                <table class="w-full table-auto">
                    <thead class="bg-gray-50 text-xs font-semibold uppercase text-gray-400">
                        <tr>
                            <th></th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Channel Name</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Language</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Genre</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Quality</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Price</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Action</div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-sm">
                        <?php
                            $getchannel="SELECT * FROM channels";
                            $exutequery=mysqli_query($con,$getchannel);
                            if(mysqli_num_rows($exutequery)>0)
                            {

                                while($row_of_channels=mysqli_fetch_assoc($exutequery))
                                {
                                    
                                    ?>
                                    <tr>
                            <td class="p-2">
                                <img src="<?php  echo($row_of_channels["chan_img"]); ?>" alt="" class="h-8 mx-auto">
                            </td>
                            <td class="p-2">
                                <div class="text-center font-medium text-gray-800"><?php echo($row_of_channels["Chan_name"]); ?></div>
                            </td>
                            <td class="p-2">
                                <div class="text-center font-medium text-gray-800">
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
                                </div>

                            </td>
                            <td class="p-2">
                                <div class="text-center font-medium text-gray-800">
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
                                </div>
                            </td>
                            <td class="p-2">
                                <div class="text-center font-medium text-purple-500"><?php echo($row_of_channels["chan_quality"]); ?></div>
                            </td>
                            <td class="p-2">
                                <div class="text-center font-medium text-purple-500">₹<?php echo($row_of_channels["chan_price"]); ?></div>
                            </td>
                            <td class="p-2">
                                <div class="flex justify-center">
                                    <button type="button"  onclick="delete_chan(<?php echo $row_of_channels['chan_id']; ?>)">
                                        <svg class="h-8 w-8 rounded-full p-1 text-gray-800 hover:bg-gray-100 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        
                                    </button>
                                    <button type="button" onclick="update_chan(<?php echo $row_of_channels['chan_id']; ?>,'<?php  echo($row_of_channels['chan_img']); ?>', '<?php echo($row_of_channels['Chan_name']); ?>', '<?php echo($row_of_channels['chan_language']); ?>', <?php echo($genre); ?>, '<?php echo($row_of_channels['chan_quality']); ?>', <?php echo($row_of_channels['chan_price']); ?> )">
                                    <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" fill="#000000" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                        <title>edit</title>
                                                        <path d="M17.438 22.469v-4.031l2.5-2.5v7.344c0 1.469-1.219 2.688-2.656 2.688h-14.625c-1.469 0-2.656-1.219-2.656-2.688v-14.594c0-1.469 1.188-2.688 2.656-2.688h14.844v0.031l-2.5 2.469h-11.5c-0.531 0-1 0.469-1 1.031v12.938c0 0.563 0.469 1 1 1h12.938c0.531 0 1-0.438 1-1zM19.813 7.219l2.656 2.656 1.219-1.219-2.656-2.656zM10.469 16.594l2.625 2.656 8.469-8.469-2.625-2.656zM8.594 21.094l3.625-0.969-2.656-2.656z"></path>
                                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php
                                }
                            }                            
                        ?>
                        
                    </tbody>
                </table>
            </div>

            <!-- total amount -->


            <div class="flex justify-end">
                <!-- send this data to backend (note: use class 'hidden' to hide this input) -->
                <input type="hidden" class="border border-black bg-gray-50" x-model="selected" />
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
      $('#dropzone-file').change(function(){
        const file = this.files[0];
        
        if (file){
          const reader = new FileReader();
          reader.onload = function(event) {
            const img = new Image();
            img.onload = function() {
              const canvas = document.createElement('canvas');
              const maxWidth = 800; // Maximum width for the compressed image
              const maxHeight = 600; // Maximum height for the compressed image

              let width = img.width;
              let height = img.height;

              if (width > height) {
                if (width > maxWidth) {
                  height *= maxWidth / width;
                  width = maxWidth;
                }
              } else {
                if (height > maxHeight) {
                  width *= maxHeight / height;
                  height = maxHeight;
                }
              }

              canvas.width = width;
              canvas.height = height;
              const ctx = canvas.getContext('2d');
              ctx.drawImage(img, 0, 0, width, height);

              canvas.toBlob(function(blob) {
                const reader = new FileReader();
                reader.onloadend = function() {
                  const base64String = reader.result;
                  console.log(base64String );
                  $("#dataURL").val(base64String);
                   $('#preview1Image1').attr('src', base64String);
                };
                reader.readAsDataURL(blob);

                // Return the processed file blob here
                // For demonstration, let's log the blob to the console
                console.log(blob);
              }, 'image/webp', 0.9);
            };
            img.src = event.target.result; //event.target.result is a property that is commonly used in conjunction with the FileReader API in JavaScript. When you use a FileReader to read the content of a file, such as an image, the result of the read operation is accessible through the result property.
          };

          reader.readAsDataURL(file);
        }
      });


      $('#update_dropzone-file').change(function(){
        const file = this.files[0];
        
        if (file){
          const reader = new FileReader();
          reader.onload = function(event) {
            const img = new Image();
            img.onload = function() {
              const canvas = document.createElement('canvas');
              const maxWidth = 800; // Maximum width for the compressed image
              const maxHeight = 600; // Maximum height for the compressed image

              let width = img.width;
              let height = img.height;

              if (width > height) {
                if (width > maxWidth) {
                  height *= maxWidth / width;
                  width = maxWidth;
                }
              } else {
                if (height > maxHeight) {
                  width *= maxHeight / height;
                  height = maxHeight;
                }
              }

              canvas.width = width;
              canvas.height = height;
              const ctx = canvas.getContext('2d');
              ctx.drawImage(img, 0, 0, width, height);

              canvas.toBlob(function(blob) {
                const reader = new FileReader();
                reader.onloadend = function() {
                  const base64String = reader.result;
                  console.log(base64String );
                  $("#update_dataURL").val(base64String);
                   $('#update_preview1Image1').attr('src', base64String);
                };
                reader.readAsDataURL(blob);

                // Return the processed file blob here
                // For demonstration, let's log the blob to the console
                console.log(blob);
              }, 'image/webp', 0.9);
            };
            img.src = event.target.result; //event.target.result is a property that is commonly used in conjunction with the FileReader API in JavaScript. When you use a FileReader to read the content of a file, such as an image, the result of the read operation is accessible through the result property.
          };

          reader.readAsDataURL(file);
        }
      });
    });
  </script>
<script src="../../js/addchannel.js"></script>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>

