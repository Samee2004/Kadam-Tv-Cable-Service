<?php 
session_start(); 
include("../../config/connect.php");
if(isset($_SESSION["email"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["type"])  )
{
    $email = $_SESSION["email"];
    $firstname=$_SESSION["firstname"];
    $lastname=$_SESSION["lastname"];
    $type=$_SESSION["type"];
}else{
    echo ("<script>location.href='emp_login.php'</script>");

}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chatbox</title>
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

          <!-- add your code below -->
<!-- add chatbot modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Que-Ans
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
                <div class="col-span-2  ">
                        <label for="chat_cat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="chat_cat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected value="" hidden >Select Category</option>
                                        <option value="1">
                                            General
                                        </option>
                                        <option value="2">
                                            Technical
                                        </option>
                                        <option value="3">
                                            Payment & Subscription
                                        </option>
                                        <option value="4">
                                            Others
                                        </option>
                                        
                        </select>
                        <span id="chat_catError" class="text-red-500"></span>
                    </div>

                    <div class="col-span-2">
                        <label for="chat_que" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Question</label>
                        <input type="text" name="chat_que" id="chat_que" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type question" required="">
                        <span id="chat_queError" class="text-red-500"></span>
                    </div>

                    <div class="col-span-2">
                        <label for="chat_ans" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter Answer</label>
                        <textarea id="chat_ans" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your answer here..."></textarea>
                        <span id="chat_ansError" class="text-red-500"></span>
                    </div>

                
                </div>
                <button id="submit_chann" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new question
                </button>
            </form>
        </div>
    </div>
</div>
<!-- update  modal-->
<div id="update-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                   Update Que-Ans
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
                        <label for="update_chat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="update_chat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected value="" hidden >Select Category</option>
                                        <option value="1">
                                            General
                                        </option>
                                        <option value="2">
                                            Technical
                                        </option>
                                        <option value="3">
                                            Payment & Subscription
                                        </option>
                                        <option value="4">
                                            Others
                                        </option>  
                        </select>
                        <span id="update_chatError" class="text-red-500"></span>
                    </div>
                    <div class="col-span-2">
                        <label for="update_que" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Question</label>
                        <input type="text" name="update_que" id="update_que" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type question" required="">
                        <span id="update_queError" class="text-red-500"></span>
                    </div>
                    <div class="col-span-2">
                        <label for="update_ans" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Answer</label>
                        <textarea id="update_ans" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your answer here..."></textarea>
                        <span id="update_ansError" class="text-red-500"></span>
                    </div>
                </div>
                <button id="update_submit_chat" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Update 
                </button>
            </form>
        </div>
    </div>
</div>
 <!-- delete modal -->
<div id="delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <input type="text" name="delete_package_id" id="delete_package_id" class="hidden">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this package?</h3>
                            <button data-modal-hide="popup-modal" id="ConfirmedSubmit" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
          
          <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4 overflow-hidden">
                    <div class="flex flex-col justify-center h-full">
                        <!-- Table -->
                        <div class="w-full  mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                            <header class=" flex items-center justify-between px-5 py-4 border-b border-gray-100">
                                <h2 class="font-semibold text-gray-800">Chatbot</h2>
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class=" ml-3  text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Add New Quetions
                    </button>
 
 
                            </header>
                            <div class="p-3">
                                <div class="overflow-x-auto">
                                    <table class="table-auto">
                                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                            <tr>
                                                <th class="p-2 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Category</div>
                                                </th>
                                                <th class="p-2 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Question</div>
                                                </th>
                                                <th class="p-2 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Answer</div>
                                                </th>
                                                <th class="p-2 whitespace-nowrap">
                                                    <div class="font-semibold text-center">Action</div>

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-sm divide-y divide-gray-100">
                                        <?php
                                        $get_chatbot_query = "SELECT qt_id FROM `chatbot_button` GROUP BY qt_id";
                                        $get_chatbot = mysqli_query($con,$get_chatbot_query);
                                        if(mysqli_num_rows($get_chatbot)>0)
                                        {
                                            while($row_of_qts = mysqli_fetch_assoc($get_chatbot))
                                            {
                                                $qt_cateogory = $row_of_qts["qt_id"];
                                                $get_qts_query = "SELECT * FROM chatbot_button WHERE qt_id='$qt_cateogory'";
                                                $result_qts = mysqli_query($con,$get_qts_query);
                                                if (mysqli_num_rows($result_qts)>0) {
                                                    while ($row_of_qts = mysqli_fetch_assoc($result_qts)) {
                                                        ?>
                                                        <tr>
                                                            <td class="p-2 whitespace-nowrap">
                                                                <div class="">
                                                                    <?php
                                                                        if ($qt_cateogory==1) {
                                                                            echo("General");
                                                                        }
                                                                        if ($qt_cateogory==2) {
                                                                            echo("Technical");
                                                                        }
                                                                        
                                                                    ?>
                                                                    <!-- <div class="text-base font-semibold"></div>
                                                                    <div class="font-normal text-gray-500"></div> -->
                                                                </div>
                                                            </td>
                                                            <td class="p-2 whitespace-nowrap">
                                                                <div class="text-left"> <?php echo($row_of_qts["cb_name"]); ?> </div>
                                                            </td>
                                                            <td class="p-2">
                                                                <div class="text-left font-medium ">
                                                                    <?php
                                                                    $qt_id = $row_of_qts["cb_id"];
                                                                    $get_answer_query = "SELECT * FROM `chatbot` WHERE id = '$qt_id' ";
                                                                    $get_answer_result = mysqli_query($con,$get_answer_query);
                                                                    if (mysqli_num_rows($get_answer_result)>0) {
                                                                        while ($result_answers = mysqli_fetch_assoc($get_answer_result)) {
                                                                            echo($result_answers["qts"]);
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>

                                                            <td class="p-2">
                                <div class="flex justify-center">
                                    <button type="button" data-modal-target="delete-modal" data-modal-toggle="delete-modal" onclick="delete_chat(<?php echo $qt_id; ?>)">
                                        <svg class="h-8 w-8 rounded-full p-1 text-gray-800 hover:bg-gray-100 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        
                                    </button>
                                    <button type="button" data-modal-target="update-modal" data-modal-toggle="update-modal" onclick="update_chat(<?php echo $qt_id; ?>,'<?php  echo($row_of_channels['chan_img']); ?>', '<?php echo($row_of_channels['Chan_name']); ?>', '<?php echo($row_of_channels['chan_language']); ?>', <?php echo($genre); ?>, '<?php echo($row_of_channels['chan_quality']); ?>', <?php echo($row_of_channels['chan_price']); ?> )">
                                    <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" fill="#000000" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                        <title>edit</title>
                                                        <path d="M17.438 22.469v-4.031l2.5-2.5v7.344c0 1.469-1.219 2.688-2.656 2.688h-14.625c-1.469 0-2.656-1.219-2.656-2.688v-14.594c0-1.469 1.188-2.688 2.656-2.688h14.844v0.031l-2.5 2.469h-11.5c-0.531 0-1 0.469-1 1.031v12.938c0 0.563 0.469 1 1 1h12.938c0.531 0 1-0.438 1-1zM19.813 7.219l2.656 2.656 1.219-1.219-2.656-2.656zM10.469 16.594l2.625 2.656 8.469-8.469-2.625-2.656zM8.594 21.094l3.625-0.969-2.656-2.656z"></path>
                                                        </svg>
                                    </button>
                                </div>
                            </td>


                                                            <!-- <td class="p-2 whitespace-nowrap">
                                                                <div class="text-center">
                                                                <button type="button" onclick="delete_chan(19)">
                                                                    <svg class="h-8 w-8 rounded-full p-1 text-gray-800 hover:bg-gray-100 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                                    </svg>
                                                                </button>

                                                                <button type="button"  data-modal-target="update-modal" data-modal-toggle="update-modal">
                                                                    <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" fill="#000000" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                                        <title>edit</title>
                                                                        <path d="M17.438 22.469v-4.031l2.5-2.5v7.344c0 1.469-1.219 2.688-2.656 2.688h-14.625c-1.469 0-2.656-1.219-2.656-2.688v-14.594c0-1.469 1.188-2.688 2.656-2.688h14.844v0.031l-2.5 2.469h-11.5c-0.531 0-1 0.469-1 1.031v12.938c0 0.563 0.469 1 1 1h12.938c0.531 0 1-0.438 1-1zM19.813 7.219l2.656 2.656 1.219-1.219-2.656-2.656zM10.469 16.594l2.625 2.656 8.469-8.469-2.625-2.656zM8.594 21.094l3.625-0.969-2.656-2.656z"></path>
                                                                    </svg>
                                                                </button>
                                                                    
                                                                </div>
                                                            </td> -->
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                   


          </div>
        </main>
      </div>
    </div>
    <script src="../../js/addchatbot.js"></script>
    <script src="../../js/updatechatbot.js"></script>
  </body>
</html>

