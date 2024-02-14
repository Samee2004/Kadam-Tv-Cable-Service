<?php
include('../../config/connect.php');
if(!empty($_POST['value']))
{

    $value  = mysqli_real_escape_string($con, $_POST['value']);
    $sql= "SELECT * FROM chatbot WHERE id = '$value' ";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            
                ?>
                <div class="flex items-start gap-2.5">
   <img class="w-8 h-8 rounded-full object-cover" src="https://e7.pngegg.com/pngimages/498/917/png-clipart-computer-icons-desktop-chatbot-icon-blue-angle.png" alt="Bonnie Green image">
   <div class="flex flex-col gap-1">
      <div class="flex flex-col w-full max-w-[326px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
         <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">Chatbot</span>
         </div>
         <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
         <?php echo($row["qts"]); ?>

         </p>

         <div class="max-w-full flex flex-col rounded-lg shadow-sm">
         <?php
                            $id = $row["id"];
                            $getButtons = "SELECT * FROM chatbot_button WHERE qt_id = '$id' ";
                            $result_for_buttons = mysqli_query($con,$getButtons);
                            if(mysqli_num_rows($result_for_buttons)>0)
                            {
                                while($row_details = mysqli_fetch_assoc($result_for_buttons))
                                {
                                    ?>
                                    <button onclick="sendData(<?php echo($row_details['cb_number']); ?>,'<?php echo($row_details['cb_name']); ?>')" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 rounded-t-md text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    <?php
                                        echo($row_details['cb_name']);
                                    ?>
                                    </button>
                                    <?php
                                }
                            }
                        ?>
           
        </div>
         
      </div>
   </div>
   
</div>
            
                    
                <?php 
           
        }
    }
    else{
        echo("Not able to understand");
    }
}

    //

?>