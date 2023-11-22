<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>    
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
                      <label for="full-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Full Name</label>
                      <input type="text" name="full-name" id="full-name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc mnq xyz" required="">
                </div>
                <!-- Email input -->
                <div class="w-full">
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                      <span id="emailError" class="text-red-500"></span>
                </div>          
                <div class="w-full">
                      <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Contact</label>
                      <input type="tel" name="contact" id="contact" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="985****6" required="">
                      <span id="contactError" class="text-red-500"></span>
                </div>
                <!-- Password input -->
                <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label> 
                      <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"style="color: green;">"Password must be at least 8 characters"</a></div>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                      <span id="passwordError" class="text-red-500"></span>
                  </div>
                  <div>
                      <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                      <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                      <span id="confirmPasswordError" class="text-red-500"></span>
                  </div>
          <!-- Password input -->


          <!-- flat and building -->
            <div class="flex">
            <div class="w-full mr-1">
                      <label for="flat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Flat</label>
                      <input type="text" name="flat" id="flat" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="A-12" required="">
                      <span id="flatError" class="text-red-500"></span>
                </div>
                <div class="w-full ml-1">
                      <label for="building" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bluiding</label>
                      <input type="text" name="building" id="building" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="abc society" required="">
                </div>
            </div>
                <div>
                      <label for="street-address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street Address</label>
                      <input type="text" name="street-address" id="street-address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ndfsf Road, Mulund-E" required="">
                      <span id="streetAddressError" class="text-red-500"></span>
                </div>
               
          <!-- Submit button -->
          <button type="submit" class="w-full border text-black hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>


          
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function(){
    $("#registerForm").submit(function(e){
      var fullName = $("#full-name").val();
      var email = $("#email").val();
      var contact = $("#contact").val();
      var password = $("#password").val();
      var confirmPassword = $("#confirm-password").val();
      var flat = $("#flat").val();
      var building = $("#building").val();
      var streetAddress = $("#street-address").val();

      // Reset errors
      $("#fullNameError").text("");
      $("#emailError").text("");
      $("#contactError").text("");
      $("#passwordError").text("");
      $("#confirmPasswordError").text("");
      $("#flatError").text("");
      $("#buildingError").text("");
      $("#streetAddressError").text("");

      // Validate Full Name
      if (!fullName.trim()) {
        $("#fullNameError").text("Full Name is required");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Email
      var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailRegex.test(email)) {
        $("#emailError").text("Invalid email address");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Contact
      var contactRegex = /^[0-9]{10}$/;
      if (!contactRegex.test(contact)) {
        $("#contactError").text("Invalid contact number");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Password (you can add more conditions)
      if (password.length < 8) {
        $("#passwordError").text("Password must be at least 8 characters");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Confirm Password
      if (password !== confirmPassword) {
        $("#confirmPasswordError").text("Passwords do not match");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Flat
      if (!flat.trim()) {
        $("#flatError").text("Flat is required");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Building
      if (!building.trim()) {
        $("#buildingError").text("Building is required");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Street Address
      if (!streetAddress.trim()) {
        $("#streetAddressError").text("Street Address is required");
        e.preventDefault(); // Prevent form submission
      }
    });
  });
</script>
</body>
</html>
