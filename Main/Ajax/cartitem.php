<?php
include("../../config/connect.php");
if(!empty($_POST["data"])){
    $data = $_POST["data"];
    // Example fixing the error
$decodedData = json_decode($data, true);

    // Check if decoding was successful
    if ($decodedData !== null) {
        // Access individual elements
        $cart = $decodedData['cart'];
        if (empty($cart)) {
            // If the cart is empty, display a message
            echo "Your cart is empty!!";
        } else {
        // Loop through the cart items
        foreach ($cart as $item) {
          $type= $item['type'];
          if($type=="c"){
            $chan_id = $item['chan_id'];

            $get_channel = "SELECT * FROM `channels` WHERE chan_id = '$chan_id' ";
            $execute_get_channel = mysqli_query($con,$get_channel);
            if(mysqli_num_rows($execute_get_channel)>0)
            {
                while($row=mysqli_fetch_assoc($execute_get_channel))
                {
                    ?>
                <div class="flex p-6 my-6 rounded-lg bg-white  shadow-md">
                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                          <img src="<?php echo($row["chan_img"]); ?>" alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch." class="h-full w-full object-fit object-center">
                        </div>
                        <div class="ml-4 flex flex-1 flex-col">
                          <div>
                            <div class="flex justify-between text-base font-medium text-gray-900">
                              <h3>
                                <a href="#"><?php echo($row["Chan_name"]); ?></a>
                              </h3>
                              <p class="ml-4">₹<span class="item_price"><?php echo($row["chan_price"]); ?> </span></p>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Language: 
                                <?php 
                                 $chan_language=$row["chan_language"];
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
                            <p class="mt-1 text-sm text-gray-500">Genre:  
                            <?php 
                                    $genre=$row["chan_genre"];
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
                          </div>

                          <div class="flex flex-1 items-end justify-between text-sm">
                            <p class="text-gray-500">Quality: <?php echo($row["chan_quality"]); ?></p>

                            <div class="flex">
                              <button type="button" onclick="deletefromcart(<?php echo $row['chan_id']; ?>,'c')" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                      <?php
                    
                }
            }
          }
          if($type=="p"){
            $chan_id = $item['chan_id'];

            $get_packages = "SELECT * FROM `packages` WHERE pack_id = '$chan_id' ";
            $execute_get_packages = mysqli_query($con,$get_packages);
            if(mysqli_num_rows($execute_get_packages)>0)
            {
                while($row_of_packages=mysqli_fetch_assoc($execute_get_packages))
                {
                    ?>
                <div class="flex p-6 my-6 rounded-lg bg-white  shadow-md">
                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                          <!-- <img src="<?php //echo($row["chan_img"]); ?>" alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch." class="h-full w-full object-fit object-center"> -->
                        </div>
                        <div class="ml-4 flex flex-1 flex-col">
                          <div>
                            <div class="flex justify-between text-base font-medium text-gray-900">
                              <h3>
                                <a href="#"><?php echo($row_of_packages["pack_name"]); ?></a>
                              </h3>
                              <p class="ml-4">₹<span class="item_price"><?php echo($row_of_packages["pack_price"]); ?> </span></p>
                            </div>
                            <p class="text-sm font-semibold text-gray-400">Upto <?php $get_number_of_channels = "SELECT * FROM `package_has_channel` WHERE `phc_package_id` = '$chan_id' ";
                            // printing numbeer of channels using mysqli_num_rows which show number of rows in package_has_channels
                            echo(mysqli_num_rows(mysqli_query($con,$get_number_of_channels))); ?> channels</p>
                            
                          </div>

                          <div class="flex flex-1 items-end justify-end text-sm">
                            <div class="flex">
                              <button type="button" onclick="deletefromcart(<?php echo $row_of_packages['pack_id']; ?>,'p')" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                      <?php
                    
                }
            }
          }
            
          
            

            // Use the values as needed
            // echo "Channel ID: $chan_id, User Email: $user_email, Type: $type<br>";
        }
    }
    } else {
        // Handle JSON decoding error
        echo 'Error decoding JSON data.';
    }



}


?>