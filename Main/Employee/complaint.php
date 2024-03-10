<?php 
session_start(); 
if(isset($_SESSION["email"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["type"])  )
{
   if($_SESSION["type"]=="a" || $_SESSION["type"]=="m"){
    $email = $_SESSION["email"];
    $firstname=$_SESSION["firstname"];
    $lastname=$_SESSION["lastname"];
    $type=$_SESSION["type"];
   }
    else{
        echo ("<script>location.href='emp_login.php'</script>");
    }
}else{
    echo ("<script>location.href='emp_login.php'</script>");

}
include("../../config/connect.php");

?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Complaints</title>
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
        <main class="h-full overflow-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
            <div class="container px-0 mx-auto grid">
                <!-- add your code below -->
                <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4 overflow-hidden">
                    <div class="flex flex-col justify-center h-full">
                        <!-- Table -->
                        <div class="w-full  mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                            <header class="px-5 py-4 border-b border-gray-100">
                                <h2 class="font-semibold text-gray-800">Complaints</h2>
                            </header>
                            <div class="p-3">
                                <div class="overflow-x-auto">
                                    <table class="table-auto w-full">
                                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                            <tr>
                                                <th class="p-2 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Name</div>
                                                </th>
                                                <th class="p-2 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Description</div>
                                                </th>
                                                <th class="p-2 whitespace-nowrap">
                                                    <div class="font-semibold text-left">Status</div>
                                                </th>
                                                <th class="p-2 whitespace-nowrap">
                                                    <div class="font-semibold text-center">Action</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-sm divide-y divide-gray-100">
                                        <?php
                                        $get_complaints_query = "SELECT * FROM `complaint`,`customer` WHERE `complaint_cust` = `customer`.`cust_email` ";
                                        $result_of_complaint = mysqli_query($con,$get_complaints_query);
                                        if(mysqli_num_rows($result_of_complaint)>0)
                                        {
                                            while($row = mysqli_fetch_assoc($result_of_complaint))
                                            {
                                                
                                                ?>
                                            <tr>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="">
                                                        <div class="text-base font-semibold"><?php echo $row["cust_fname"] ?> <?php echo $row["cust_lname"] ?></div>
                                                        <div class="font-normal text-gray-500"><?php echo $row["complaint_cust"] ?></div>
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-left"> <?php echo $row["complaint_issue"] ?></div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-left font-medium "><b><?php echo $row["complaint_status"] ?></b> </div>
                                                    <div class="text-left ">
                                                        <?php
                                                            $employee_id = $row["complaint_emp"];
                                                            $get_employe_name = "SELECT * FROM `employee` WHERE emp_email = '$employee_id' ";
                                                            $excecute_get_emp_query=mysqli_query($con,$get_employe_name);
                                                            if(
                                                                mysqli_num_rows($excecute_get_emp_query)>0 
                                                            ){
                                                                while(
                                                                    $row_of_get_emp=mysqli_fetch_assoc($excecute_get_emp_query)
                                                                ){
                                                                    ?>
                                                                    <?php echo $row_of_get_emp["emp_fname"] ?> <?php echo $row_of_get_emp["emp_lname"] ?> 
                                                                <?php                           }
                                                            }
                                                            ?>
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-center">
                                                        <a href="#" type="button" onclick='OpenModal(<?php echo $row["complaint_id"] ?>)' data-modal-target="editUserModal" data-modal-toggle="editUserModal" class="openModel font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                            Assign Technican
                                                        </a>
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
                            </div>
                        </div>
                    </div>
                </section>
                <div id="editUserModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <form class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Assign Technican
                                </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editUserModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-12 sm:col-span-12">
                                        <input type="text" readonly  id="complaint_id">
                                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                        <select id="technican_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected hidden >Choose a Technican</option>
                                            <?php
                                                $get_technican = "SELECT * FROM `employee` WHERE emp_role = 't' ";
                                                $excecute_get_technican_query = mysqli_query($con,$get_technican);
                                                if(mysqli_num_rows($excecute_get_technican_query)>0)
                                                {
                                                    while ($row_of_techincain=mysqli_fetch_assoc($excecute_get_technican_query)) {
                                                        
                                                        echo($row_of_techincain["emp_email"]);
                                                        ?>
                                                        <option value="<?php echo($row_of_techincain["emp_email"]); ?>"> <?php echo($row_of_techincain["emp_fname"]); ?> <?php echo($row_of_techincain["emp_lname"]); ?> </option>
                                                        <?php 
                                                    }
                                                }
                                            ?>
                                            
                                        </select>
                                        <p id="technican-id-error" class="text-red-500"></p>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button type="button" id="assignbutt" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Assign
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
      </div>
    </div>
    <script src="../../js/ComplaintManager.js"></script>
  </body>
</html>

