<?php 
session_start(); 
if(isset($_SESSION["email"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["type"])  )
{
   if($_SESSION["type"]=="a"){
    $email = $_SESSION["email"];
    $firstname=$_SESSION["firstname"];
    $lastname=$_SESSION["lastname"];
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
                                <div class="text-2xl font-semibold">Rs. <?php
                                $get_totalpayment="SELECT SUM(`pay_amount`) AS total_payment FROM `payment` WHERE DATE(`pay_date`) = CURDATE()";
                                $result_get_totalpayment = mysqli_query($con,$get_totalpayment);
                                if (mysqli_num_rows($result_get_totalpayment)>0) {
                                    while ($row_of_get_subsribers=mysqli_fetch_assoc($result_get_totalpayment)) {
                                        echo $row_of_get_subsribers["total_payment"];
                                    }
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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
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
                                $get_totalsubpack="SELECT DISTINCT s.sub_cust_id FROM subscription s JOIN subscribeforpackage sc ON s.sub_id = sc.subpack_id WHERE s.sub_start_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
                                $result_get_totalcomplaint = mysqli_query($con,$get_totalcomplaint);
                                if (mysqli_num_rows($result_get_totalcomplaint)>0) {
                                    while ($row_of_get_totalcomplaint=mysqli_fetch_assoc($result_get_totalcomplaint)) {
                                        echo $row_of_get_totalcomplaint["complaint_count"];
                                    }
                                }
                                ?></div>
                            </div>
                            <span class="text-gray-400 text-sm">Subscribers of Packages</span>
                        </div>
                        <div class="rounded-md border border-dashed border-gray-200 p-4">
                            <div class="flex items-center mb-0.5">
                                <div class="text-xl font-semibold">4</div>
                                <span class="p-1 rounded text-[12px] font-semibold bg-rose-500/10 text-rose-500 leading-none ml-1">-$130</span>
                            </div>
                            <span class="text-gray-400 text-sm">Recharge</span>
                        </div>
                    </div>
                    <div>
                        <canvas id="order-chart"></canvas>
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
                              <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Amount</th>
                              <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="text-gray-700 dark:text-gray-100">
                              <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">Admin</th>
                              <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">1</td>
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
                              <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">1</td>
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
                              <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">3</td>
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
                              <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">400</td>
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
                            
                    <div class="flex justify-between mb-4 items-start">
                        


                        <!-- <div class="font-medium">Activities in a Month</div>
                    </div>
                    <div class="">
                        <table class="w-full min-w-[50px]">
                            <tbody>
                                <tr>
                                    <td class="py-2  border-b border-b-gray-50">
                                        <span class="text-[14px] font-medium text-gray-600">Subscribers of Channels</span>
                                    </td>
                                    <td class="py-2  border-b border-b-gray-50">
                                    <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                                    </td>
                                    <td class="py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">17.45</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2  border-b border-b-gray-50">
                                        <span class="text-[14px] font-medium text-gray-600">Subscribers of Packages</span>
                                    </td>
                                    <td class="py-2  border-b border-b-gray-50">
                                    <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                                    </td>
                                    <td class="py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">17.45</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2  border-b border-b-gray-50">
                                        <span class="text-[14px] font-medium text-gray-600">Recharge</span>
                                    </td>
                                    <td class="py-2  border-b border-b-gray-50">
                                    <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                                    </td>
                                    <td class="py-2 border-b border-b-gray-50">
                                        <span class="text-[13px] font-medium text-gray-400">17.45</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->
            </div>
            <div class="">
                

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
            </div>
        </div>

          </div>
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>

  </body>
</html>

