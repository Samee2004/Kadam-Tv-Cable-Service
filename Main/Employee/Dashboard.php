<?php 
session_start(); 
if(isset($_SESSION["email"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["type"])  )
{
   if($_SESSION["type"]=="a"){
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
    <title>Packages</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
          
                   
          <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold"><?php 
                                $get_subcribers="SELECT COUNT(*) AS subscription_count FROM subscription GROUP BY sub_cust_id";
                                $result_get_subscribers = mysqli_query($con,$get_subcribers);
                                if (mysqli_num_rows($result_get_subscribers)>0) {
                                    while ($row_of_get_subsribers=mysqli_fetch_assoc($result_get_subscribers)) {
                                        echo $row_of_get_subsribers["subscription_count"];
                                    }
                                }
                                ?></div>
                            </div>
                            <div class="text-sm font-medium text-gray-400">No. of Subscribers</div>
                        </div>
                    </div>

                    <a href="/gebruikers" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold"><?php
                                $get_totalpayment="SELECT SUM(`pay_amount`) AS total_payment FROM `payment` WHERE DATE(`pay_date`) = CURDATE()";
                                $result_get_totalpayment = mysqli_query($con,$get_totalpayment);
                                if (mysqli_num_rows($result_get_totalpayment)>0) {
                                    while ($row_of_get_subsribers=mysqli_fetch_assoc($result_get_totalpayment)) {
                                        $total_payment = $row_of_get_subsribers["total_payment"];
                                        if ($total_payment==NULL ) {
                                            echo(0);
                                        }else{
                                            echo($total_payment);
                                        }
                                    }
                                }
                                else {
                                    echo(0);
                                }

                                ?>
                                </div>
                                <!-- <div class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">+30%</div> -->
                            </div>
                            <div class="text-sm font-medium text-gray-400">Payments in a Day</div>
                        </div>
                         <!-- <div class="dropdown">
                            <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                            <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                <li>
                                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                </li>
                            </ul>
                        </div>  -->
                    </div>
                    <a href="/dierenartsen" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1">
                                <?php
                                $get_totalcomplaint="SELECT COUNT(*) AS complaint_count FROM `complaint` WHERE `complaint_date` BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE()";
                                $result_get_totalcomplaint = mysqli_query($con,$get_totalcomplaint);
                                if (mysqli_num_rows($result_get_totalcomplaint)>0) {
                                    while ($row_of_get_totalcomplaint=mysqli_fetch_assoc($result_get_totalcomplaint)) {
                                        echo $row_of_get_totalcomplaint["complaint_count"];
                                    }
                                }
                                ?>
                                </div>
                            <div class="text-sm font-medium text-gray-400">No. of complaints in a week</div>
                        </div> 
                    </div>
                    <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                </div>
            </div>
            
                    <div>
                        <div class="min-w-screen mx-auto bg-white-800 text-gray-500 rounded shadow-xl py-5 px-5 w-full mb-5 " x-data="{chartData:chartData()}" x-init="chartData.fetch()">
                            <!-- <div class="flex flex-wrap items-end">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold leading-tight">Income</h3>
                                </div> -->
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div class=" border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                    <div class="flex justify-between mb-4 items-start">
                        <div class="font-medium">Statistics of a Month</div>
                         
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold">
                                <?php
                                $get_totalsubchan="SELECT COUNT(DISTINCT s.sub_cust_id) AS customer_count FROM subscription s JOIN subscribeforchannel sc ON s.sub_id = sc.subchan_id WHERE s.sub_start_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
                                $result_get_totalsubchan = mysqli_query($con,$get_totalsubchan);
                                if (mysqli_num_rows($result_get_totalsubchan)>0) {
                                    while ($row_of_get_totalsubchan=mysqli_fetch_assoc($result_get_totalsubchan)) {
                                        echo $row_of_get_totalsubchan["customer_count"];
                                    }
                                }
                                ?> 
                                </div>
                            </div>
                            <span class="text-gray-400 text-sm">Subscribers of Channels</span>
                        </div>
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold"><?php
                                $get_totalsubpack="SELECT COUNT(DISTINCT s.sub_cust_id) AS customer_count FROM subscription s JOIN subscribeforpackage sc ON s.sub_id = sc.subpack_id WHERE s.sub_start_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
                                $result_get_totalsubpack = mysqli_query($con,$get_totalsubpack);
                                if (mysqli_num_rows($result_get_totalsubpack)>0) {
                                    while ($row_of_get_totalsubpack=mysqli_fetch_assoc($result_get_totalsubpack)) {
                                        echo $row_of_get_totalsubpack["customer_count"];
                                    }
                                }
                                ?></div>
                            </div>
                            <span class="text-gray-400 text-sm">Subscribers of Packages</span>
                        </div>
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold"><?php
                                $get_totalsubrechar="SELECT COUNT(DISTINCT sub_cust_id) AS customer_count FROM subscription, rechargeforsubscription WHERE subscription.sub_id=rechargeforsubscription.recharge_sub_id AND sub_start_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH);";
                                $result_get_totalsubrechar = mysqli_query($con,$get_totalsubrechar);
                                if (mysqli_num_rows($result_get_totalsubrechar)>0) {
                                    while ($row_of_get_totalsubrechar=mysqli_fetch_assoc($result_get_totalsubrechar)) {
                                        echo $row_of_get_totalsubrechar["customer_count"];
                                    }
                                }
                                ?></div>
                            </div>
                            <span class="text-gray-400 text-sm">Recharge</span>
                        </div>
                    </div>
                                <!-- <div class="relative" @click.away="chartData.showDropdown=false">
                                    <button class="text-xs hover:text-gray-300 h-6 focus:outline-none" @click="chartData.showDropdown=!chartData.showDropdown">
                                        <span x-text="chartData.options[chartData.selectedOption].label"></span><i class="ml-1 mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="bg-gray-700 shadow-lg rounded text-sm absolute top-auto right-0 min-w-full w-32 z-30 mt-1 -mr-3" x-show="chartData.showDropdown" style="display: none;" x-transition:enter="transition ease duration-300 transform" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease duration-300 transform" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4">
                                        <span class="absolute top-0 right-0 w-3 h-3 bg-gray-700 transform rotate-45 -mt-1 mr-3"></span>
                                        <div class="bg-gray-700 rounded w-full relative z-10 py-1">
                                            <ul class="list-reset text-xs">
                                                <template x-for="(item,index) in chartData.options">
                                                    <li class="px-4 py-2 hover:bg-gray-600 hover:text-white transition-colors duration-100 cursor-pointer" :class="{'text-white':index==chartData.selectedOption}" @click="chartData.selectOption(index);chartData.showDropdown=false">
                                                        <span x-text="item.label"></span>
                                                    </li>
                                                </template>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="flex flex-wrap items-end mb-5">
                                <h4 class="text-2xl lg:text-3xl text-white font-semibold leading-tight inline-block mr-2" x-text="'$'+(chartData.data?chartData.data[chartData.date].total.comma_formatter():0)">0</h4>
                                <span class="inline-block" :class="chartData.data&&chartData.data[chartData.date].upDown<0?'text-red-500':'text-green-500'"><span x-text="chartData.data&&chartData.data[chartData.date].upDown<0?'▼':'▲'">0</span> <span x-text="chartData.data?chartData.data[chartData.date].upDown:0">0</span>%</span>
                            </div> -->
                            <!-- <div id="line-chart" class="max-w-screen mx-auto"></div> -->

                        </div>
                    </div>
                </div>

                <div class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                    <div class="rounded-t mb-0 px-0 border-0">
                      <div class="flex flex-wrap items-center px-4 py-2">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                          <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Total Roles</h3>
                        </div>
                      </div>
                      <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                          <thead>
                            <tr>
                              <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Role</th>
                              <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Employee</th>
                              <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="text-gray-700 dark:text-gray-100">
                              <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Admin</th>
                              <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <?php 
                                    $sql = "SELECT COUNT(*) AS employee_count FROM employee WHERE emp_role = 'a'";
                                    $result = mysqli_query($con,$sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // Fetch the result row as an associative array
                                        $row = $result->fetch_assoc();
                                        // Get the count of employees
                                        $employeeCount = $row["employee_count"];
                                    
                                        // Output the count
                                        echo  $employeeCount;
                                    } else {
                                        echo "No employees found with role admin";
                                    }
                                ?>
                              </td>
                              <!-- <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <div class="flex items-center">
                                  <span class="mr-2">70%</span>
                                  <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                      <div style="width: 70%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600"></div>
                                    </div>
                                  </div>
                                </div>
                              </td> -->
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                              <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Manager</th>
                              <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?php 
                                    $sql = "SELECT COUNT(*) AS employee_count FROM employee WHERE emp_role = 'm'";
                                    $result = mysqli_query($con,$sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // Fetch the result row as an associative array
                                        $row = $result->fetch_assoc();
                                        // Get the count of employees
                                        $employeeCount = $row["employee_count"];
                                    
                                        // Output the count
                                        echo  $employeeCount;
                                    } else {
                                        echo "No employees found with role manager";
                                    }
                                ?></td>
                              <!-- <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <div class="flex items-center">
                                  <span class="mr-2">40%</span>
                                  <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                                      <div style="width: 40%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                                    </div>
                                  </div>
                                </div>
                              </td> -->
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                              <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Technician</th>
                              <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"><?php 
                                    $sql = "SELECT COUNT(*) AS employee_count FROM employee WHERE emp_role = 't'";
                                    $result = mysqli_query($con,$sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // Fetch the result row as an associative array
                                        $row = $result->fetch_assoc();
                                        // Get the count of employees
                                        $employeeCount = $row["employee_count"];
                                    
                                        // Output the count
                                        echo  $employeeCount;
                                    } else {
                                        echo "No employees found with role technican";
                                    }
                                ?></td>
                              <!-- <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <div class="flex items-center">
                                  <span class="mr-2">45%</span>
                                  <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-pink-200">
                                      <div style="width: 45%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                                    </div>
                                  </div>
                                </div>
                              </td> -->
                            </tr>
                            <tr class="text-gray-700 dark:text-gray-100">
                              <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Customers</th>
                              <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                              <?php 
                                    $sql = "SELECT COUNT(*) AS customer_count FROM customer ";
                                    $result = mysqli_query($con,$sql);
                                    
                                    if ($result->num_rows > 0) {
                                        // Fetch the result row as an associative array
                                        $row = $result->fetch_assoc();
                                        // Get the count of employees
                                        $customer_count = $row["customer_count"];
                                    
                                        // Output the count
                                        echo  $customer_count;
                                    } else {
                                        echo "No customers found";
                                    }
                                ?>
                              </td>
                              <!-- <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <div class="flex items-center">
                                  <span class="mr-2">60%</span>
                                  <div class="relative w-full">
                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                                      <div style="width: 60%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
                                    </div>
                                  </div>
                                </div>
                              </td> -->
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                            
                    <!-- <div class="flex justify-between mb-4 items-start">
                        


                        <div class="font-medium">Activities in a Month</div>
                    </div> -->
                    
                </div>
            </div>
            <!-- <div class="">
                

                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                    <div class="flex justify-between mb-4 items-start">
                        <div class="font-medium">Earnings</div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Service</th>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">Earning</th>
                                    <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                            <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">Create landing page</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
        </div>

          </div>
        </main>
      </div>
    </div>
   

<script>
    
const options = {
  chart: {
    height: "100%",
    maxWidth: "100%",
    type: "line",
    fontFamily: "Inter, sans-serif",
    dropShadow: {
      enabled: false,
    },
    toolbar: {
      show: false,
    },
  },
  tooltip: {
    enabled: true,
    x: {
      show: false,
    },
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    width: 6,
  },
  grid: {
    show: true,
    strokeDashArray: 6,
    padding: {
      left: 2,
      right: 2,
      top: 26
    },
  },
  series: [
    {
      name: "Channels",
      data: [6500, 6418, 6456, 6526, 6356, 6456, 6500, 6418, 6456, 6526, 6356, 6456, 6500, 6418, 6456, 6526, 6356, 6456, 6500, 6418, 6456, 6526, 6356, 6456],
      color: "#1A56DB",
    },
    {
      name: "Packages",
      data: [6456, 6356, 6526, 6332, 6418, 6500],
      color: "#7E3AF2",
    },
    {
      name: "Recharge",
      data: [4562, 6362, 2526, 6322, 6418, 100],
      color: "#8E3AF8",
    },
  ],
  legend: {
    show: false
  },
  stroke: {
    curve: 'smooth'
  },
  xaxis: {
    categories: ["2024-02-05","2024-02-06","2024-02-07","2024-02-08","2024-02-09","2024-02-10","2024-02-11","2024-02-12","2024-02-13","2024-02-14","2024-02-15","2024-02-16","2024-02-17","2024-02-18","2024-02-19","2024-02-20","2024-02-21","2024-02-22","2024-02-23","2024-02-24","2024-02-25","2024-02-26","2024-02-27","2024-02-28","2024-02-29","2024-03-01","2024-03-02","2024-03-03","2024-03-04","2024-03-05"],
    labels: {
      show: true,
      style: {
        fontFamily: "Inter, sans-serif",
        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
      }
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
}

if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
  const chart = new ApexCharts(document.getElementById("line-chart"), options);
  chart.render();
}

</script>
  </body>
</html>

