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

        // Loop through the cart items
        foreach ($cart as $item) {

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
                          <img src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch." class="h-full w-full object-cover object-center">
                        </div>
                        <div class="ml-4 flex flex-1 flex-col">
                          <div>
                            <div class="flex justify-between text-base font-medium text-gray-900">
                              <h3>
                                <a href="#"><?php echo($row["Chan_name"]); ?></a>
                              </h3>
                              <p class="ml-4">$32.00</p>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Blue</p>
                          </div>
                          <div class="flex flex-1 items-end justify-between text-sm">
                            <p class="text-gray-500">Qty 1</p>

                            <div class="flex">
                              <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                      <?php
                    
                }
            }
          
            $type = $item['type'];

            // Use the values as needed
            // echo "Channel ID: $chan_id, User Email: $user_email, Type: $type<br>";
        }
    } else {
        // Handle JSON decoding error
        echo 'Error decoding JSON data.';
    }



}


?>