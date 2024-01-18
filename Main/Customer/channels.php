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
            <div class="flex flex-wrap m-4 text-center">

                    <?php
                            $getchannel="SELECT * FROM channels";
                            $exutequery=mysqli_query($con,$getchannel);
                            if(mysqli_num_rows($exutequery)>0)
                            {

                                while($row_of_channels=mysqli_fetch_assoc($exutequery))
                                {

                                ?>
                                    <div class="p-4 sm:w-1/2 lg:w-1/3 w-full hover:scale-105 duration-500">
                                        <div class=" flex items-center  justify-between p-4  rounded-lg bg-white shadow-indigo-50 shadow-md">
                                        <div>
                                            <h2 class="text-yellow-500 text-xl font-bold text-left">
                                            <?php echo($row_of_channels["Chan_name"]); 
                                            ?>
                                            </h2>
                                            <h3 class="mt-2 text-lg font-bold text-gray-900 text-left">Rs. 
                                            <?php echo($row_of_channels["chan_price"]);
                                            ?>
                                            </h3>
                                            <p class="text-sm font-semibold text-gray-400 text-left">Genre:
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
                                            </p>
                                            <p class="text-sm font-semibold text-gray-400 text-left">Language:
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
                                            </p>
                                            <p class="text-sm font-semibold text-gray-400 text-left">Quality:
                                                <?php echo($row_of_channels["chan_quality"]); 
                                                ?>
                                            </p>
                                            <button type="button" onclick="addtocart(<?php echo $row_of_channels['chan_id']; ?>)" class="text-sm mt-6 px-4 py-2 bg-black text-white rounded-lg  tracking-wider hover:bg-yellow-600 outline-none">Add to cart</button>
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
                        ?>
            </div>

          </div>
        </main>
      </div>
    </div>
    <!-- <script src="../../js/channels.js"></script> -->
  </body>
</html>

