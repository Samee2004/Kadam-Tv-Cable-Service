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
    	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
        <script src="https://unpkg.com/alpinejs" defer></script>
        <script src="../../js/addpackages.js"></script>

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
        <main class="h-full overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-0 mx-auto grid">
          <!-- add your code below -->
            <section class="antialiased bg-gray-100 text-gray-600 h-screen p-4 overflow-hidden">
                <div class="flex flex-col justify-center h-full">
                    <!-- Table -->
                    <div class="w-full  mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                    <header class="border-b border-gray-100 px-5 py-4 flex space-y-3 flex-col md:flex-row justify-between items-center">
                <div class="font-semibold text-gray-800">Manage Packages</div>
                <div class="flex space-y-4 flex-col md:flex-row md:space-y-0 md:space-x-4 space-x-0">
                    <div>
                    <input type="text" id="searchpackage" class="w-full backdrop-blur-sm bg-white/20 py-2 pl-10 pr-4 rounded-lg focus:outline-none border-2 border-gray-300 focus:border-violet-300 transition-colors duration-300" placeholder="Search...">

                    </div>
                     <div>
                     <button id="addbutton" data-modal-target="AddPackageModal" data-modal-toggle="AddPackageModal" class="text-white inline-flex w-full items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Add new package
                            </button>
                     </div>
                </div>
                
            </header>
                        
                        <div class="p-3">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full" id="packageTable">
                                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                        <tr>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left">Name</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left">No of channels</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left">Price</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center">Action</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm divide-y divide-gray-100" id="packageTable">
                                        <?php
                                            $get_packages = "SELECT * FROM `packages`";
                                            $execute_get_packages = mysqli_query($con,$get_packages);
                                            if(mysqli_num_rows($execute_get_packages)>0){
                                                while($row = mysqli_fetch_assoc($execute_get_packages)){
                                                    ?>
                                                    <tr>
                                                        <td class="p-2 whitespace-nowrap">
                                                            <div class="">
                                                                <!-- package name -->
                                                                <div class="text-base font-semibold package-name"><?php echo $row["pack_name"] ?></div>
                                                            </div>
                                                        </td>
                                                        <td class="p-2 whitespace-nowrap">
                                                            <!-- no of channels  -->
                                                            <div class="text-left">
                                                                <?php
                                                                // assign package id with a variable
                                                                    $pack_id = $row["pack_id"];
                                                                    // query to get number of channels using package id
                                                                    $get_number_of_channels = "SELECT * FROM `package_has_channel` WHERE `phc_package_id` = '$pack_id' ";
                                                                    // printing numbeer of channels using mysqli_num_rows which show number of rows in package_has_channels
                                                                    echo(mysqli_num_rows(mysqli_query($con,$get_number_of_channels)));
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td class="p-2 whitespace-nowrap">
                                                            <div class="text-left font-medium "><b>₹ <?php echo $row["pack_price"] ?></b> </div>
                                                        </td>
                                                        <td class="p-2 whitespace-nowrap">
                                                            <div class="text-center flex flex-row space-x-4 items-center justify-center">
                                                                <a href="adviewchanpack.php?id=<?php echo $pack_id ; ?>"  class="openModel font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                </a>
                                                                <a href="updatepackage.php?id=<?php echo $pack_id ; ?>"  class="openModel font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                                </svg>
                                                                </a>
                                                                    <!-- delete button -->
                                                                <button type="button" onclick="deletePackage(<?php echo $pack_id ; ?>)" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="openModel font-medium text-red-600 dark:text-blue-500 hover:underline">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
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
                        </div>
                    </div>
                </div>
            </section>
          </div>
            <div id="AddPackageModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Add Package
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="AddPackageModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form>
                            <div class="flex flex-col space-y-4">
                                <div>
                                    <label for="packagename" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Package Name</label>
                                    <input type="text" name="packagename" id="packagename"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Sony">
                                    <div id="packagenameError" class="text-red-500 text-sm error-message"></div>
                                </div>
                                <div>
                                    <label for="packageprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Package Price</label>
                                    <input type="number"  name="packageprice" id="packageprice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$299">
                                    <div id="packagepriceError" class="text-red-500 text-sm error-message"></div>
                                </div>
                                <div>
                                    
                                    <label for="channels" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Channels</label>
                                    <div class="w-full">
                                        <select multiple x-data="multiselect" name="channels[]" id="channels">
                                            <?php
                                                // get channels all details
                                                $get_channel_details = "SELECT * FROM `channels`,`genre`,`language` WHERE `genre`.`gen_id`=`channels`.`chan_genre` AND `language`.`lang_id` = `channels`.`chan_language`;";
                                                $execute_get_channel_details = mysqli_query($con,$get_channel_details);
                                                if(mysqli_num_rows($execute_get_channel_details)>0)
                                                {
                                                    while($row_of_channels = mysqli_fetch_assoc($execute_get_channel_details))
                                                    {
                                                        ?>
                                                             <option value="<?php  echo $row_of_channels["chan_id"]; ?>"><?php  echo $row_of_channels["Chan_name"]; ?> <?php  echo $row_of_channels["lang_name"]; ?> <?php  echo $row_of_channels["gen_name"]; ?> <?php  echo $row_of_channels["chan_quality"]; ?> </option>
                                                        <?php
                                                       
                                                    }
                                                }

                                            ?>
                                        </select>
                                    </div>
                                    <div id="channelsError" class="text-red-500 text-sm error-message"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end space-x-4 mt-4">
                                <button type="button" id="packageAddSubmit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

           
                                                <!-- delete modal -->
            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <input type="text" name="delete_package_id" id="delete_package_id" class="hidden">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
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

        </main>
      </div>
    </div>
    <script>
        // delete js
        function deletePackage(packageid) {
            console.log(packageid);
            $("#delete_package_id").val("");
            $("#delete_package_id").val(packageid);
        }
        $("#ConfirmedSubmit").click(function () {
            var delete_package_id = $("#delete_package_id").val();
            $.ajax({
                url: "../Ajax/packagesajax.php", // Replace with the actual URL of your server-side script
                type: "POST",
                data: {
                    delete_package_id : delete_package_id
                  // Add more data as needed
                },
                success: function (response) {
                  // Handle the response from the server
                  console.log(response);
                  if (response == 1) {
                    Toastify({
                      text: "Package delete Successfully",
                      duration: 3000,
                      destination: "https://github.com/apvarun/toastify-js",
                      newWindow: true,
                      close: true,
                      gravity: "top", // `top` or `bottom`
                      position: "center", // `left`, `center` or `right`
                      stopOnFocus: true, // Prevents dismissing of toast on hover
                      style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                      }, // Callback after click
                    }).showToast();
        
                    $("#description").val("");
                    window.location.reload();
                  } else {
                    Toastify({
                      text: " Failed to delete package",
                      duration: 3000,
                      destination: "https://github.com/apvarun/toastify-js",
                      newWindow: true,
                      close: true,
                      gravity: "top", // `top` or `bottom`
                      position: "center", // `left`, `center` or `right`
                      stopOnFocus: true, // Prevents dismissing of toast on hover
                      style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                      }, // Callback after click
                    }).showToast();
                  }
                },
                error: function (error) {
                  // Handle errors
                  console.error(error);
                },
              });
        })
        document.addEventListener("alpine:init", () => {
  Alpine.data("multiselect", () => ({
    style: {
      wrapper: "w-full relative",
      select:
        "border w-full border-gray-300 rounded-lg py-2 px-2 text-sm flex gap-2 items-center cursor-pointer bg-white",
      menuWrapper:
        "w-full rounded-lg py-1.5 text-sm mt-1 shadow-lg absolute bg-white z-10",
      menu: "max-h-52 overflow-y-auto",
      textList: "overflow-x-hidden text-ellipsis grow whitespace-nowrap",
      trigger: "px-2 py-2 rounded bg-neutral-100",
      badge: "py-1.5 px-3 rounded-full bg-neutral-100",
      search:
        "px-3 py-2 w-full border-0 border-b-2 border-neutral-100 pb-3 outline-0 mb-1",
      optionGroupTitle:
        "px-3 py-2 text-neutral-400 uppercase font-bold text-xs sticky top-0 bg-white",
      clearSearchBtn: "absolute p-3 right-0 top-1 text-neutral-600",
      label: "hover:bg-neutral-50 cursor-pointer flex py-2 px-3"
    },

    icons: {
      times:
        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><g xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-width="2"><path d="M6 18L18 6M18 18L6 6"/></g></svg>',
      arrowDown:
        '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><path xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-width="2" d="M5 10l7 7 7-7"/></svg>'
    },

    init() {
      const style = this.style;

      const originalSelect = this.$el;
      originalSelect.classList.add("hidden");

      const wrapper = document.createElement("div");
      wrapper.className = style.wrapper;
      wrapper.setAttribute("x-data", "newSelect");

      const newSelect = document.createElement("div");
      newSelect.className = style.select;
      newSelect.setAttribute("x-bind", "selectTrigger");

      const textList = document.createElement("span");
      textList.className = style.textList;

      const triggerBtn = document.createElement("button");
        triggerBtn.className = style.trigger;
        triggerBtn.innerHTML = this.icons.arrowDown;
        triggerBtn.type = "button"; // Adding type attribute with value "button"


      const countBadge = document.createElement("span");
      countBadge.className = style.badge;
      countBadge.setAttribute("x-bind", "countBadge");

      newSelect.append(textList);
      newSelect.append(countBadge);
      newSelect.append(triggerBtn);

      const menuWrapper = document.createElement("div");
      menuWrapper.className = style.menuWrapper;
      menuWrapper.setAttribute("x-bind", "selectMenu");

      const menu = document.createElement("div");
      menu.className = style.menu;

      const search = document.createElement("input");
      search.className = style.search;
      search.setAttribute("x-bind", "search");
      search.setAttribute("placeholder", "Search");

      const clearSearchBtn = document.createElement("button");
      clearSearchBtn.className = style.clearSearchBtn;
      clearSearchBtn.setAttribute("x-bind", "clearSearchBtn");
      clearSearchBtn.innerHTML = this.icons.times;

      menuWrapper.append(search);
      menuWrapper.append(menu);
      menuWrapper.append(clearSearchBtn);

      originalSelect.parentNode.insertBefore(
        wrapper,
        originalSelect.nextSibling
      );

      const itemGroups = originalSelect.querySelectorAll("optgroup");

      if (itemGroups.length > 0) {
        itemGroups.forEach((itemGroup) => processItems(itemGroup));
      } else {
        processItems(originalSelect);
      }

      function processItems(parent) {
        const items = parent.querySelectorAll("option");
        const subMenu = document.createElement("ul");
        const groupName = parent.getAttribute("label") || null;

        if (groupName) {
          const groupTitle = document.createElement("h5");
          groupTitle.className = style.optionGroupTitle;
          groupTitle.innerText = groupName;
          groupTitle.setAttribute("x-bind", "groupTitle");
          menu.appendChild(groupTitle);
        }

        items.forEach((item) => {
          const li = document.createElement("li");
          li.setAttribute("x-bind", "listItem");

          const checkBox = document.createElement("input");
          checkBox.classList.add("mr-3", "mt-1");
          checkBox.type = "checkbox";
          checkBox.value = item.value;
          checkBox.id = originalSelect.name + "_" + item.value;

          const label = document.createElement("label");
          label.className = style.label;
          label.setAttribute("for", checkBox.id);
          label.innerText = item.innerText;

          checkBox.setAttribute("x-bind", "checkBox");

          if (item.hasAttribute("selected")) {
            checkBox.checked = true;
          }
          label.prepend(checkBox);
          li.append(label);
          subMenu.appendChild(li);
        });
        menu.appendChild(subMenu);
      }

      wrapper.appendChild(newSelect);
      wrapper.appendChild(menuWrapper);

      Alpine.data("newSelect", () => ({
        open: false,
        showCountBadge: false,
        items: [],
        selectedItems: [],
        filterBy: "",
        init() {
          this.regenerateTextItems();
        },

        regenerateTextItems() {
          this.selectedItems = [];
          this.items.forEach((item) => {
            const checkbox = item.querySelector("input[type=checkbox]");
            const text = item.querySelector("label").innerText;
            if (checkbox.checked) {
              this.selectedItems.push(text);
            }
          });

          if (this.selectedItems.length > 1) {
            this.showCountBadge = true;
          } else {
            this.showCountBadge = false;
          }

          if (this.selectedItems.length === 0) {
            textList.innerHTML = '<span class="text-neutral-400">select</span>';
          } else {
            textList.innerText = this.selectedItems.join(", ");
          }
        },

        selectTrigger: {
          ["@click"]() {
            this.open = !this.open;

            if (this.open) {
              this.$nextTick(() =>
                this.$root.querySelector("input[x-bind=search]").focus()
              );
            }
          }
        },
        selectMenu: {
          ["x-show"]() {
            return this.open;
          },
          ["x-transition"]() {},
          ["@keydown.escape.window"]() {
            this.open = false;
          },
          ["@click.away"]() {
            this.open = false;
          },
          ["x-init"]() {
            this.items = this.$el.querySelectorAll("li");
            this.regenerateTextItems();
          }
        },
        checkBox: {
          ["@change"]() {
            const checkBox = this.$el;

            if (checkBox.checked) {
              originalSelect
                .querySelector("option[value='" + checkBox.value + "']")
                .setAttribute("selected", true);
            } else {
              originalSelect
                .querySelector("option[value='" + checkBox.value + "']")
                .removeAttribute("selected");
            }
            this.regenerateTextItems();
          }
        },
        countBadge: {
          ["x-show"]() {
            return this.showCountBadge;
          },
          ["x-text"]() {
            return this.selectedItems.length;
          }
        },
        search: {
          ["@keydown.escape.stop"]() {
            this.filterBy = "";
            this.$el.blur();
          },
          ["@keyup"]() {
            this.filterBy = this.$el.value;
          },
          ["x-model"]() {
            return this.filterBy;
          }
        },
        clearSearchBtn: {
          ["@click"]() {
            this.filterBy = "";
          },
          ["x-show"]() {
            return this.filterBy.length > 0;
          }
        },
        listItem: {
          ["x-show"]() {
            return (
              this.filterBy === "" ||
              this.$el.innerText
                .toLowerCase()
                .startsWith(this.filterBy.toLowerCase())
            );
          }
        },
        groupTitle: {
          ["x-show"]() {
            if (this.filterBy === "") return true;

            let atLeastOneItemIsShown = false;

            this.$el.nextElementSibling
              .querySelectorAll("li")
              .forEach((item) => {
                console.log(this.filterBy);
                if (
                  item.innerText
                    .toLowerCase()
                    .startsWith(this.filterBy.toLowerCase())
                )
                  atLeastOneItemIsShown = true;
              });
            return atLeastOneItemIsShown;
          }
        }
      }));
    }
  }));
});

$('#packageAddSubmit').click(function(event) {
       // Reset error messages
       $('.error-message').text('');
        
        // Check if the form is valid
        var isValid = true;

        // Validate Package Name
        var packagename = $('#packagename').val().trim();
        if (packagename === '') {
            $('#packagenameError').text('Please enter a package name.');
            isValid = false;
        }

        // Validate Package Price
        var packageprice = $('#packageprice').val().trim();
        if (packageprice === '') {
            $('#packagepriceError').text('Please enter a package price.');
            isValid = false;
        }

        // Validate Channels
        var channels = $('#channels').val();
        if (channels === null || channels.length === 0) {
            $('#channelsError').text('Please select at least one channel.');
            isValid = false;
        }

        // Prevent form submission if the form is not valid
        if (!isValid) {
            event.preventDefault();
        }else{
            $.ajax({
                url: "../Ajax/packagesajax.php", // Replace with the actual URL of your server-side script
                type: "POST",
                data: {
                    packagename: packagename,
                    packageprice: packageprice,
                    channels:channels
                  // Add more data as needed
                },
                success: function (response) {
                  // Handle the response from the server
                  console.log(response);
                  if (response == 1) {
                    Toastify({
                      text: "Package added Successfully",
                      duration: 3000,
                      destination: "https://github.com/apvarun/toastify-js",
                      newWindow: true,
                      close: true,
                      gravity: "top", // `top` or `bottom`
                      position: "center", // `left`, `center` or `right`
                      stopOnFocus: true, // Prevents dismissing of toast on hover
                      style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                      }, // Callback after click
                    }).showToast();
        
                    $("#description").val("");
                    window.location.reload();
                  } else {
                    Toastify({
                      text: " Failed to add package",
                      duration: 3000,
                      destination: "https://github.com/apvarun/toastify-js",
                      newWindow: true,
                      close: true,
                      gravity: "top", // `top` or `bottom`
                      position: "center", // `left`, `center` or `right`
                      stopOnFocus: true, // Prevents dismissing of toast on hover
                      style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                      }, // Callback after click
                    }).showToast();
                  }
                },
                error: function (error) {
                  // Handle errors
                  console.error(error);
                },
              });
        }
    });
    </script>
  </body>
</html>

