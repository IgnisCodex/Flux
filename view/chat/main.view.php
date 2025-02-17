<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Chat with AJAX</title>
    <script>
        function fetchMessages() {
            fetch("get_messages.php")
                .then(response => response.json())
                .then(messages => {
                    let chatBox = document.getElementById("chat-box");
                    chatBox.innerHTML = "";
                    messages.reverse().forEach(msg => {
                        let messageElement = document.createElement("p");
                        messageElement.innerHTML = `<strong>${msg.username}:</strong> ${msg.message}`;
                        chatBox.appendChild(messageElement);
                    });
                    chatBox.scrollTop = chatBox.scrollHeight;
                });
        }

        function sendMessage() {
            let username = document.getElementById("username").value.trim();
            let message = document.getElementById("message").value.trim();
            if (username === "" || message === "") return;

            // Instantly display the message in the chat box
            let chatBox = document.getElementById("chat-box");
            let tempMessage = document.createElement("p");
            tempMessage.innerHTML = `<strong>${username}:</strong> ${message}`;
            chatBox.appendChild(tempMessage);
            chatBox.scrollTop = chatBox.scrollHeight;

            // Send the message to the server (background)
            let formData = new FormData();
            formData.append("username", username);
            formData.append("message", message);

            fetch("send_message.php", { method: "POST", body: formData })
                .then(() => document.getElementById("message").value = ""); // Clear input
        }

        setInterval(fetchMessages, 2000); // Fetch new messages every 2 seconds
        window.onload = fetchMessages; // Load messages when page opens
    </script>
</head>
<body>
    <h1>PHP Chat with AJAX</h1>
    <div id="chat-box"></div>
    <input id="username" type="text" placeholder="Enter your name">
    <input id="message" type="text" placeholder="Type a message">
    <button onclick="sendMessage()">Send</button>
</body>
</html>