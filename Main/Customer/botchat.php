<!-- component -->
<div class="fixed bottom-0 right-0 mb-4 mr-8
">
        <button id="open-chat" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-800 transition duration-300 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Chat with us
        </button>
    </div>
    <div id="chat-container" class="hidden fixed bottom-16 right-4 w-96">
        <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
            <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center">
                <p class="text-lg font-semibold">Bot</p>
                <button id="close-chat" class="text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="chatbox" class="p-4 h-80 overflow-y-auto flex flex-col">
              
<!-- Chat messages will be displayed here -->    
<div class="flex items-start gap-2.5">
   <img class="w-8 h-8 rounded-full object-cover" src="https://e7.pngegg.com/pngimages/498/917/png-clipart-computer-icons-desktop-chatbot-icon-blue-angle.png" alt="Bonnie Green image">
   <div class="flex flex-col gap-1">
      <div class="flex flex-col w-full max-w-[326px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
         <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <span class="text-sm font-semibold text-gray-900 dark:text-white">Chatbot</span>
         </div>
         <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">Namaste! Welcome to website of Kadam Cable Services of INDigital, I am your online Digital Assistant,</p><p>How may I assist you?</p>

         <div class="max-w-full flex flex-col rounded-lg shadow-sm">
            <button onclick="sendData(1,'general')" type="button" class="py-3 px-4 inline-flex items-center gap-x-2 rounded-t-md text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                About General?
            </button>
            <button onclick="sendData(1,'tech')" type="button" class="-mt-px py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                About Technical?
            </button>
            <button onclick="sendData(1,'sub pay')" type="button" class="-mt-px py-3 px-4 inline-flex items-center gap-x-2 rounded-b-md text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                About subcription & payment?
            </button>
            <button onclick="sendData(1,'others')" type="button" class="-mt-px py-3 px-4 inline-flex items-center gap-x-2 rounded-b-md text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Others?
            </button>
        </div>
         
      </div>
   </div>
   
</div>

              <!-- <div class="mb-2 text-right flex-1 flex-col w-auto">
                <p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">hello</p>
                <button type="button" onclick="sendData(1,'Register')" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Alternative</button>

              </div>
              <div class="mb-2">
                <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">This is a response from the chatbot.</p>
              </div>
              <div class="mb-2 text-right">
                <p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">this example of chat</p>
              </div>
              <div class="mb-2">
                <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">This is a response from the chatbot.</p>
              </div>
              <div class="mb-2 text-right">
                <p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">design with tailwind</p>
              </div>
              <div class="mb-2">
                <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">This is a response from the chatbot.</p>
              </div>-->
            </div> 
            <div class="p-4 border-t flex">
                <input id="user-input" type="text" placeholder="Type a message" class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button id="send-button" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Send</button>
            </div>
        </div>
    </div>
    <script>
        const chatbox = document.getElementById("chatbox");
const chatContainer = document.getElementById("chat-container");
const userInput = document.getElementById("user-input");
const sendButton = document.getElementById("send-button");
const openChatButton = document.getElementById("open-chat");
const closeChatButton = document.getElementById("close-chat");

let isChatboxOpen = true; // Set the initial state to open

// Function to toggle the chatbox visibility
function toggleChatbox() {
    chatContainer.classList.toggle("hidden");
    isChatboxOpen = !isChatboxOpen; // Toggle the state
}

// Add an event listener to the open chat button
openChatButton.addEventListener("click", toggleChatbox);

// Add an event listener to the close chat button
closeChatButton.addEventListener("click", toggleChatbox);

// Add an event listener to the send button
// sendButton.addEventListener("click", function () {
//     const userMessage = userInput.value;
//     if (userMessage.trim() !== "") {
//         $.ajax({
//                     type: 'POST',
//                     url: 'botajax.php',
//                     data: 'value=' + userMessage,
//                     success: function(data) {
//                         $('#body').append(data);
//                         addUserMessage(userMessage);
//                         respondToUser(userMessage);
//                         userInput.value = "";
//                         // $text.animate({ scrollTop: $text[0].scrollHeight }, 'slow');

//                     },
//                     error: function (error) {
//                     alert('error; ' + eval(error));
//                   }
                    
//                 })
        
//     }
// });

// userInput.addEventListener("keyup", function (event) {
//     if (event.key === "Enter") {
//         const userMessage = userInput.value;
//         addUserMessage(userMessage);
//         respondToUser(userMessage);
//         userInput.value = "";
//     }
// });

function addUserMessage(message) {
    const messageElement = document.createElement("div");
    messageElement.classList.add("mb-2", "text-right");
    messageElement.innerHTML = `<p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">${message}</p>`;
    chatbox.appendChild(messageElement);
    chatbox.scrollTop = chatbox.scrollHeight;
}

function addBotMessage(message) {
    // const messageElement = document.createElement("div");
    // messageElement.classList.add("mb-2");
    // messageElement.innerHTML = `<p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">${message}</p>`;
    const mssg = message;
    chatbox.append(messageElement);
    chatbox.scrollTop = chatbox.scrollHeight;
}

// function respondToUser(userMessage) {
//     // Replace this with your chatbot logic
//     setTimeout(() => {
//         addBotMessage("This is a response from the chatbot.");
//     }, 500);
// }
function sendData(value,msg){
    $value = value;
    $msg = msg;
    addUserMessage(msg);
        

        $.ajax({
                    type: 'POST',
                    url: '../Ajax/botajax.php',
                    data: 'value=' + $value,
                    success: function(data) {
                        $("#chatbox").append(data);
                        chatbox.scrollTop = chatbox.scrollHeight;

                    },
                    error: function (error) {
                    alert('error; ' + eval(error));
                  }
                    
                })
  }
</script>