<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
<body>
<section class="h-screen">
  <div class="container h-full px-6 py-24">
    <div
      class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
      <!-- Left column container with background-->
      <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
        <img src="bg.jpg" alt="Phone image" />
      </div>

      <!-- Right column container with form -->
      <div class="md:w-8/12 lg:ml-6 lg:w-5/12">
      <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center mb-3">
                  Create an account
              </h1>
        <form class="space-y-4 md:space-y-6 mb-10">
          <!-- Email input -->
          <div class="w-full">
                      <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your First Name</label>
                      <input type="text" name="first-name" id="first-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your First Name" required="">
                      <span id="FirstError" class="text-red-500"></span>
                    </div>
                <div class="w-full">
                      <label for="middle-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your Middle Name</label>
                      <input type="text" name="middle-name" id="middle-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Middle Name" required="">
                      <span id="MiddleError" class="text-red-500"></span>
                    </div>
                <div class="w-full">
                      <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your Full Name</label>
                      <input type="text" name="last-name" id="last-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Last Name" required="">
                      <span id="LastError" class="text-red-500"></span>    
                </div>
                <!-- Email input -->
                <div class="w-full">
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your Email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                      <span id="emailError" class="text-red-500"></span>
                </div>          
                <div class="w-full">
                      <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your Contact</label>
                      <input type="tel" name="contact" id="contact" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="985****6" required="">
                      <span id="contactError" class="text-red-500"></span>
                </div>
                <!-- Password input -->
                <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Password</label> 
                      <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"style="color: green;">"Password must be at least 8 characters"</a></div>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                      <span id="passwordError" class="text-red-500"></span>
                  </div>
                  <div>
                      <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Confirm password</label>
                      <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                      <span id="confirmPasswordError" class="text-red-500"></span>
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
                  <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pincode</label>
                  <select id="pincode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose your pincode</option>
                        <option value="US">400042</option>
                        <option value="CA">400041</option>
                  </select>
                  <span id="pincodeError" class="text-red-500"></span>
                </div>
               
          <!-- Submit button -->
          <button type="submit" id="registerForm" class="w-full border text-white bg-black hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
          <div class="login_signup">Already have an account? <a href="Login.php" id="login" style="color: blue;">Login</a></div>

          
        </form>
      </div>
    </div>
  </div>
</section>

<script src="../../js/register.js">

</script>

</body>
</html>
