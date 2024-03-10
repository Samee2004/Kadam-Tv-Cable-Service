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
    <title>Employee Management</title>
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
          
                   
<!-- add channel modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add New Employee
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="space-y-4 md:space-y-6 mb-10 p-4">
          <!-- Email input -->
          <div class="w-full">
                      <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee First Name</label>
                      <input type="text" name="first-name" id="first-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Employee First Name" required="">
                      <span id="FirstError" class="text-red-500"></span>
                    </div>
                <div class="w-full">
                      <label for="middle-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee Middle Name</label>
                      <input type="text" name="middle-name" id="middle-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Employee Middle Name" required="">
                      <span id="MiddleError" class="text-red-500"></span>
                    </div>
                <div class="w-full">
                      <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee Full Name</label>
                      <input type="text" name="last-name" id="last-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Employee Last Name" required="">
                      <span id="LastError" class="text-red-500"></span>    
                </div>
                <!-- Email input -->
                <div class="w-full">
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee Email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                      <span id="emailError" class="text-red-500"></span>
                </div>          
                <div class="w-full">
                      <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee Contact</label>
                      <input type="number" name="contact" id="contact" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="985****6" required="">
                      <span id="contactError" class="text-red-500"></span>
                </div>
                
                  
          <!-- flat and building -->
            <div class="flex">
            <div class="w-full mr-1">
                      <label for="flat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Flat</label>
                      <input type="text" name="flat" id="flat" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="wing-Flat" required="">
                      <span id="flatError" class="text-red-500"></span>
                </div>
                <div class="w-full ml-1">
                      <label for="building" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Building/Chawl/other</label>
                      <input type="text" name="building" id="building" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bluiding/chawl/other" required="">
                      <span id="buildingError" class="text-red-500"></span>
                </div>
            </div>
                <div>
                      <label for="street-address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Street Address</label>
                      <input type="text" name="street-address" id="street-address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Street Address" required="">
                      <span id="streetAddressError" class="text-red-500"></span>
                </div>
                <div>
                      <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">City</label>
                      <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="City" required="">
                      <span id="cityError" class="text-red-500"></span>
                </div>
                <div>
                  <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Role</label>
                  <select id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Choose role</option>
                        <option value="a">Admin</option>
                        <option value="m">Manager</option>
                        <option value="t">Technicain</option>
                  </select>
                  <span id="roleError" class="text-red-500"></span>
                </div>
               
          <!-- Submit button -->
          <button type="button" id="registerForm" class="w-full border text-white bg-black hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
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
                   Update Employee
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="update-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="space-y-4 md:space-y-6 mb-10 p-4">
          <!-- Email input -->
                    <div class="w-full">
                      <label for="update-first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee First Name</label>
                      <input type="text" name="update-first-name" id="update-first-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Employee First Name" required="">
                      <span id="UpdateFirstError" class="text-red-500"></span>
                    </div>
                <div class="w-full">
                      <label for="update-middle-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee Middle Name</label>
                      <input type="text" name="middle-name" id="update-middle-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Employee Middle Name" required="">
                      <span id="UpdateMiddleError" class="text-red-500"></span>
                    </div>
                <div class="w-full">
                      <label for="update-last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee Full Name</label>
                      <input type="text" name="update-last-name" id="update-last-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Employee Last Name" required="">
                      <span id="UpdateLastError" class="text-red-500"></span>    
                </div>
                <!-- Email input -->
                <div class="w-full">
                      <label for="update-email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee Email</label>
                      <input type="email" name="update-email" id="update-email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                      <span id="UpdateemailError" class="text-red-500"></span>
                </div>          
                <div class="w-full">
                      <label for="update-contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Employee Contact</label>
                      <input type="number" name="update-contact" id="update-contact" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="985****6" required="">
                      <span id="UpdatecontactError" class="text-red-500"></span>
                </div>
                
                  
          <!-- flat and building -->
            <div class="flex">
            <div class="w-full mr-1">
                      <label for="update-flat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Flat</label>
                      <input type="text" name="update-flat" id="update-flat" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="wing-Flat" required="">
                      <span id="UpdateflatError" class="text-red-500"></span>
                </div>
                <div class="w-full ml-1">
                      <label for="update-building" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Building/Chawl/other</label>
                      <input type="text" name="update-building" id="update-building" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bluiding/chawl/other" required="">
                      <span id="UpdatebuildingError" class="text-red-500"></span>
                </div>
            </div>
                <div>
                      <label for="update-street-address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Street Address</label>
                      <input type="text" name="update-street-address" id="update-street-address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Street Address" required="">
                      <span id="UpdatestreetAddressError" class="text-red-500"></span>
                </div>
                <div>
                      <label for="update-city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">City</label>
                      <input type="text" name="update-city" id="update-city" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="City" required="">
                      <span id="UpdatecityError" class="text-red-500"></span>
                </div>
                <div>
                  <label for="update-role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Role</label>
                  <select id="update-role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Choose role</option>
                        <option value="a">Admin</option>
                        <option value="m">Manager</option>
                        <option value="t">Technicain</option>
                  </select>
                  <span id="UpdateroleError" class="text-red-500"></span>
                </div>
               
          <!-- Submit button -->
          <button type="button" id="UpdateForm" class="w-full border text-white bg-black hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
            </form>
        </div>
    </div>
</div> 

<!-- delete modal -->
<div id="delete-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <input type="text" name="delete_employee_id" id="delete_employee_id" class="">
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
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete the employee ?</h3>
                            <button id="ConfirmedSubmit" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="delete-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>
<section class="h-screen bg-gray-100 px-2 text-gray-600 antialiased" x-data="app">
    <div class="flex h-full flex-col justify-center">
        <!-- Table -->
        <div class="mx-auto w-full max-w-full rounded-sm border border-gray-200 bg-white shadow-lg">
            <header class="border-b border-gray-100 px-5 py-4 flex space-y-3 flex-col md:flex-row justify-between items-center">
                <div class="font-semibold text-gray-800">Manage Employee</div>
                <div class="flex space-y-4 flex-col md:flex-row md:space-y-0 md:space-x-4 space-x-0">
                    <div>
                    <input type="text" id="searchchannel" class="w-full backdrop-blur-sm bg-white/20 py-2 pl-10 pr-4 rounded-lg focus:outline-none border-2 border-gray-300 focus:border-violet-300 transition-colors duration-300" placeholder="Search...">

                    </div>
                     <div>
                     <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class=" ml-3  text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Add Employee
                    </button>

                    
                     </div>
                </div>
                
            </header>

            <div class="overflow-x-auto p-3">
                <table class="w-full table-auto " id="channelTable">
                    <thead class="bg-gray-50 text-xs font-semibold uppercase text-gray-400">
                        <tr>
                            
                            <th class="p-2">
                                <div class="text-center font-semibold">Name</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Email</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Phone</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Role</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Address</div>
                            </th>
                            <th class="p-2">
                                <div class="text-center font-semibold">Action</div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100 text-sm">
                        <?php
                            $get_employee = "SELECT * FROM `employee`";
                            $execute_employee = mysqli_query($con,$get_employee);
                            if (mysqli_num_rows($execute_employee)>0) {
                                # code...
                                while($row_of_employee = mysqli_fetch_assoc($execute_employee))
                                {
                                    ?>
                                    <tr>
                                    <td class="p-2">
                                       <?php  echo($row_of_employee["emp_fname"]); ?> <?php  echo($row_of_employee["emp_mname"]); ?> <?php  echo($row_of_employee["emp_lname"]); ?>
                                    </td>
                                    <td class="p-2">
                                       <?php  echo($row_of_employee["emp_email"]); ?> 
                                    </td>
                                    <td class="p-2">
                                       <?php  echo($row_of_employee["emp_phone"]); ?> 
                                    </td>
                                    <td class="p-2">
                                       <?php  echo($row_of_employee["emp_role"]); ?> 
                                    </td>
                                    <td class="p-2">
                                       <?php  echo($row_of_employee["emp_flat"]); ?> <?php  echo($row_of_employee["emp_building"]); ?>,<br> <?php  echo($row_of_employee["emp_street"]); ?> 
                                    </td>
                                    <td class="p-2">
                                <div class="flex justify-center">
                                    <button type="button" data-modal-target="delete-modal" data-modal-toggle="delete-modal" onclick="onDeleteButton('<?php echo $row_of_employee['emp_email']; ?>')">
                                        <svg class="h-8 w-8 rounded-full p-1 text-gray-800 hover:bg-gray-100 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                    <button type="button" data-modal-target="update-modal" data-modal-toggle="update-modal" onclick="onUpdateButton('<?php echo $row_of_employee['emp_email']; ?>')">
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


          </div>
        </main>
      </div>
    </div>
    <script src="../../js/addemployee.js"></script>
  </body>
</html>

