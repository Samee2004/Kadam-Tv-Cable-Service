
<!-- chatbot -->

<div class="fixed bottom-0 right-0 mb-4 mr-2 ">
        <button id="open-chat" class="border-2 border-black-600 bg-amber-700 text-white  rounded-lg hover:bg-amber-600 transition duration-300 flex items-center">
        
        <svg fill="#050505" width="60px" height="50px" viewBox="-2.4 -2.4 28.80 28.80" id="conversation-alt" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line" transform="matrix(1, 0, 0, 1, 0, 0)" stroke="#050505"><g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="1.44"><path id="secondary" d="M17,4v8a1,1,0,0,1-1,1H7L3,17V4A1,1,0,0,1,4,3H16A1,1,0,0,1,17,4Z" style="fill: #c9b21d; stroke-width:1.08;"></path><path id="primary" d="M8,17h9l4,4V7a1,1,0,0,0-1-1H17" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width:1.08;"></path><path id="primary-2" data-name="primary" d="M17,4v8a1,1,0,0,1-1,1H7L3,17V4A1,1,0,0,1,4,3H16A1,1,0,0,1,17,4Z" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width:1.08;"></path></g><g id="SVGRepo_iconCarrier"><path id="secondary" d="M17,4v8a1,1,0,0,1-1,1H7L3,17V4A1,1,0,0,1,4,3H16A1,1,0,0,1,17,4Z" style="fill: #c9b21d; stroke-width:1.08;"></path><path id="primary" d="M8,17h9l4,4V7a1,1,0,0,0-1-1H17" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width:1.08;"></path><path id="primary-2" data-name="primary" d="M17,4v8a1,1,0,0,1-1,1H7L3,17V4A1,1,0,0,1,4,3H16A1,1,0,0,1,17,4Z" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width:1.08;"></path></g></svg>        
        
    </button>
        
    </div>
    <div id="chat-container" class="hidden fixed bottom-16 right-4 w-96">
        <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
            <div class="p-4 border-b bg-amber-800 text-white rounded-t-lg flex justify-between items-center">
                <p class="text-lg font-semibold">Chat with us...</p>
                <button id="close-chat" class="text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="chatbox" class="p-4 h-80 overflow-y-auto">
              <!-- Chat messages will be displayed here -->
              <div class="mb-2 text-right">
                <p class="bg-amber-800 text-white rounded-lg py-2 px-4 inline-block">hello</p>
              </div>
              <div class="mb-2">
                <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">This is a response from the chatbot.</p>
              </div>
              <div class="mb-2 text-right">
                <p class="bg-amber-800 text-white rounded-lg py-2 px-4 inline-block">this example of chat</p>
              </div>
              <div class="mb-2">
                <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">This is a response from the chatbot.</p>
              </div>
              <div class="mb-2 text-right">
                <p class="bg-amber-800 text-white rounded-lg py-2 px-4 inline-block">design with tailwind</p>
              </div>
              <div class="mb-2">
                <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">This is a response from the chatbot.</p>
              </div>
            </div>
            <div class="p-4 border-t flex">
                <input id="user-input" type="text" placeholder="Type a message" class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-amber-600">
                <button id="send-button" class="bg-amber-700 text-white px-4 py-2 rounded-r-md hover:bg-amber-600 transition duration-300">Send</button>
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
sendButton.addEventListener("click", function () {
    const userMessage = userInput.value;
    if (userMessage.trim() !== "") {
        console.log(userMessage);
        addUserMessage(userMessage);
        // respondToUser(userMessage);
        userInput.value = "";
    }
});

userInput.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        const userMessage = userInput.value;
        addUserMessage(userMessage);
        // respondToUser(userMessage);
        userInput.value = "";
    }
});

function addUserMessage(message) {
    const messageElement = document.createElement("div");
    messageElement.classList.add("mb-2", "text-right");
    messageElement.innerHTML = `<p class="bg-amber-800 text-white rounded-lg py-2 px-4 inline-block">${message}</p>`;
    chatbox.appendChild(messageElement);
    chatbox.scrollTop = chatbox.scrollHeight;
    $.ajax({
                type: 'POST',
                url: '../ajax/chatbotajax.php',
                data:'value='+message,
                success: function(data) {
                    console.log(data);
                    addBotMessage(data);
                },
                error: function() {
                    console.log(response.status);
                },
            })
}

function addBotMessage(message) {
    const messageElement = document.createElement("div");
    messageElement.classList.add("mb-2");
    messageElement.innerHTML = `<p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">${message}</p>`;
    chatbox.appendChild(messageElement);
    chatbox.scrollTop = chatbox.scrollHeight;
}

// function respondToUser(userMessage) {
//     // Replace this with your chatbot logic
//     setTimeout(() => {
//         addBotMessage("This is a response from the chatbot.");
//     }, 500);
// }

// Automatically open the chatbox on page load
// toggleChatbox();
</script>