<?php 
session_start(); 
include("../../config/connect.php");
if(isset($_SESSION["email"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["type"])  )
{
    $email = $_SESSION["email"];
    $firstname=$_SESSION["firstname"];
    $lastname=$_SESSION["lastname"];
}else{
    echo ("<script>location.href='emp_login.php'</script>");

}
if(!isset($_GET["id"])){
  echo ("<script>location.href='Package.php'</script>");
}
if(empty($_GET["id"])){
  echo ("<script>location.href='Package.php'</script>");
}
$pack_id = $_GET["id"];
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blank - Windmill Dashboard</title>
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
    <script src="https://unpkg.com/alpinejs" defer></script>
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
          <div class="flex min-h-screen items-center justify-center">
            <div class="relative flex flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
              <h4 class="block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                Edit Package
              </h4>
              <form class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96">
                <?php
                $get_package_details = "SELECT * FROM `packages` WHERE `pack_id` = '$pack_id' ";
                $execute_get_package_details = mysqli_query($con,$get_package_details);
                if(mysqli_num_rows($execute_get_package_details)>0){
                  while($row_of_packages=mysqli_fetch_assoc($execute_get_package_details))
                  {
                    $package_name = $row_of_packages["pack_name"];
                    $package_price = $row_of_packages["pack_price"];
                  }
                }

                ?>
                                  <div class="flex flex-col space-y-4">
                                  <input type="text" name="package_id" id="package_id" value="<?php echo $pack_id; ?>" readonly class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Sony">

                                          <div>
                                              <label for="packagename" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Package Name</label>
                                              <input type="text" name="packagename" id="packagename" value="<?php echo $package_name; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Sony">
                                              <div id="packagenameError" class="text-red-500 text-sm error-message"></div>
                                          </div>
                                          <div>
                                              <label for="packageprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Package Price</label>
                                              <input type="number"  name="packageprice" id="packageprice" value="<?php echo $package_price; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$299">
                                              <div id="packagepriceError" class="text-red-500 text-sm error-message"></div>
                                          </div>
                                          <div>
                                                


                                              <label for="channels" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Channels</label>
                                              <div class="w-full">
                                                  <select multiple x-data="multiselect" name="channels[]" id="channels">
                                                  <?php
                                                    // Fetch package channels
                                                    $get_package_channels = "SELECT phc_channel_id FROM `package_has_channel` WHERE phc_package_id = '$pack_id' ";
                                                    $execute_get_package_channels = mysqli_query($con, $get_package_channels);
                                                    $package_channels = array();
                                                    if (mysqli_num_rows($execute_get_package_channels) > 0) {
                                                        while ($row_of_package_channels = mysqli_fetch_assoc($execute_get_package_channels)) {
                                                            $package_channels[] = $row_of_package_channels["phc_channel_id"];
                                                            echo $row_of_package_channels["phc_channel_id"];
                                                        }
                                                    }

                                                    // Fetch all channels
                                                    $get_channel_details = "SELECT * FROM `channels`,`genre`,`language` WHERE `genre`.`gen_id`=`channels`.`chan_genre` AND `language`.`lang_id` = `channels`.`chan_language`";
                                                    $execute_get_channel_details = mysqli_query($con, $get_channel_details);
                                                    if (mysqli_num_rows($execute_get_channel_details) > 0) {
                                                        while ($row_of_channels = mysqli_fetch_assoc($execute_get_channel_details)) {
                                                            ?>
                                                            <option value="<?php echo $row_of_channels["chan_id"]; ?>" <?php echo (in_array($row_of_channels["chan_id"], $package_channels)) ? 'selected' : 'heheh'; ?>><?php echo $row_of_channels["Chan_name"]; ?> <?php echo $row_of_channels["lang_name"]; ?> <?php echo $row_of_channels["gen_name"]; ?> <?php echo $row_of_channels["chan_quality"]; ?></option>
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
                                          <button type="button" id="packageUpdateSubmit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                              Update
                                          </button>
                                      </div>
                                  </form>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script>
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

$('#packageUpdateSubmit').click(function(event) {
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
        var packageid = $('#package_id').val();
        // Prevent form submission if the form is not valid
        if (!isValid) {
            event.preventDefault();
        }else{
            $.ajax({
                url: "../Ajax/packagesajax.php", // Replace with the actual URL of your server-side script
                type: "POST",
                data: {
                    Updatedpackagename: packagename,
                    Updatedpackageprice: packageprice,
                    Updatedchannels:channels,
                    packageid : packageid
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

