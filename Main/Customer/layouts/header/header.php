<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <!--Icon from: http://www.potlabicons.com/ -->
            <!-- <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
              <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
              <path
                class="plane-take-off"
                d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
              />
            </svg> -->
            <!-- <img src="./cable-tv.png" class="h-12 fill-current inline" alt="" srcset=""> -->
            <svg class="h-12 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><g data-name="Smart TV"><path d="M61 3H3a3.009 3.009 0 0 0-3 3v29h26V23a3.999 3.999 0 0 1 4-4h14a3.999 3.999 0 0 1 4 4v12h16V6a3.009 3.009 0 0 0-3-3zM30 17a6.005 6.005 0 0 0-6 6 1 1 0 0 1-2 0 8.01 8.01 0 0 1 8-8 1 1 0 0 1 0 2zm0-4a10.017 10.017 0 0 0-10 10 1 1 0 0 1-2 0 12.01 12.01 0 0 1 12-12 1 1 0 0 1 0 2zm0-4a14.015 14.015 0 0 0-14 14 1 1 0 0 1-2 0A16.021 16.021 0 0 1 30 7a1 1 0 0 1 0 2zM48 43h3v3h-1a1 1 0 0 0 0 2h9a1 1 0 0 0 0-2h-1v-3h3a3.009 3.009 0 0 0 3-3v-3H48zm8 3h-3v-3h3zM0 40a3.009 3.009 0 0 0 3 3h3v3H5a1 1 0 0 0 0 2h9a1 1 0 0 0 0-2h-1v-3h13v-6H0zm11 6H8v-3h3zm0-7h4a1 1 0 0 1 0 2h-4a1 1 0 0 1 0-2zm-3 0a1 1 0 1 1-1 1 1.003 1.003 0 0 1 1-1zm-3 0a1 1 0 1 1-1 1 1.003 1.003 0 0 1 1-1z" style="fill:#1b1b1e"/><circle cx="37" cy="49" r="1" style="fill:#1b1b1e"/><path d="M44 21H30a2.006 2.006 0 0 0-2 2v36a2.006 2.006 0 0 0 2 2h14a2.006 2.006 0 0 0 2-2V23a2.006 2.006 0 0 0-2-2zm-8 6h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm3.7 17.64a.997.997 0 0 1-.45-.11 5.084 5.084 0 0 0-4.5 0 .997.997 0 1 1-.9-1.78 7.053 7.053 0 0 1 6.3 0 .993.993 0 0 1 .44 1.34 1.003 1.003 0 0 1-.89.55zM40 49a3 3 0 1 1-3-3 3.009 3.009 0 0 1 3 3zm-4-18h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm0 4h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm-5-12h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm0 4h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm0 4h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm0 4h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm0 4h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm-.25 6.85a.997.997 0 1 1 1.78.9 5.04 5.04 0 0 0 0 4.5.998.998 0 0 1-.44 1.34 1.064 1.064 0 0 1-.45.11.981.981 0 0 1-.89-.55 6.99 6.99 0 0 1 0-6.3zM33 59h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zm.85-3.75a.997.997 0 0 1 .9-1.78 5.084 5.084 0 0 0 4.5 0 .997.997 0 1 1 .9 1.78 6.99 6.99 0 0 1-6.3 0zM43 59h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zm.25-6.85a.981.981 0 0 1-.89.55 1.064 1.064 0 0 1-.45-.11.998.998 0 0 1-.44-1.34 5.04 5.04 0 0 0 0-4.5.997.997 0 1 1 1.78-.9 6.99 6.99 0 0 1 0 6.3zM43 41h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zm0-4h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zm0-4h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zm0-4h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2zm0-4h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2z" style="fill:#1b1b1e"/></g></svg>
            Kadam Cable Services 
            
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Home</a>
            </li>
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Plans</a>
            </li>
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Contact</a>
            </li>
          </ul>
          <a href="../Employee/emp_login.php" id="signup" style="color: blue;"><button
            id="navAction"
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
          >
            Staff Login
          </a></button>
          <a href="register.php" id="signup" style="color: blue;"><button
            id="navAction"
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
          >
            Register/Login
          </a></button>
        </div>
        <!-- <p>
          heyy
        </p> -->
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>

    <script>
      var scrollpos = window.scrollY;
      var header = document.getElementById("header");
      var navcontent = document.getElementById("nav-content");
      var navaction = document.getElementById("navAction");
      var brandname = document.getElementById("brandname");
      var toToggle = document.querySelectorAll(".toggleColour");

      document.addEventListener("scroll", function () {
        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        if (scrollpos > 10) {
          header.classList.add("bg-white");
          navaction.classList.remove("bg-white");
          navaction.classList.add("gradient");
          navaction.classList.remove("text-gray-800");
          navaction.classList.add("text-white");
          //Use to switch toggleColour colours
          for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-gray-800");
            toToggle[i].classList.remove("text-white");
          }
          header.classList.add("shadow");
          navcontent.classList.remove("bg-gray-100");
          navcontent.classList.add("bg-white");
        } else {
          header.classList.remove("bg-white");
          navaction.classList.remove("gradient");
          navaction.classList.add("bg-white");
          navaction.classList.remove("text-white");
          navaction.classList.add("text-gray-800");
          //Use to switch toggleColour colours
          for (var i = 0; i < toToggle.length; i++) {
            toToggle[i].classList.add("text-white");
            toToggle[i].classList.remove("text-gray-800");
          }

          header.classList.remove("shadow");
          navcontent.classList.remove("bg-white");
          navcontent.classList.add("bg-gray-100");
        }
      });
    </script>
    <script>
      /*Toggle dropdown list*/
      /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

      var navMenuDiv = document.getElementById("nav-content");
      var navMenu = document.getElementById("nav-toggle");

      document.onclick = check;
      function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
          // click NOT on the menu
          if (checkParent(target, navMenu)) {
            // click on the link
            if (navMenuDiv.classList.contains("hidden")) {
              navMenuDiv.classList.remove("hidden");
            } else {
              navMenuDiv.classList.add("hidden");
            }
          } else {
            // click both outside link and outside menu, hide menu
            navMenuDiv.classList.add("hidden");
          }
        }
      }
      function checkParent(t, elm) {
        while (t.parentNode) {
          if (t == elm) {
            return true;
          }
          t = t.parentNode;
        }
        return false;
      }
    </script>
</body>
</html>