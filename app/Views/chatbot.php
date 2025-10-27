<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Chatbot Tiket Layanan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f8f8; padding: 40px; }
        .chat-container {
            max-width: 700px; margin: auto; background: #fff;
            border-radius: 12px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .chat-box {
            height: 400px; overflow-y: auto; border: 1px solid #ddd;
            padding: 15px; border-radius: 10px; background: #fafafa;
        }
        .msg { margin: 10px 0; padding: 10px 15px; border-radius: 10px; max-width: 70%; }
        .user { background: #007bff; color: #fff; margin-left: auto; text-align: right; }
        .bot { background: #e6e6e6; color: #000; margin-right: auto; }
        .input-area { display: flex; margin-top: 15px; }
        .input-area input { flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 8px; }
        .input-area button {
            margin-left: 10px; padding: 10px 20px; border: none;
            background: #007bff; color: #fff; border-radius: 8px; cursor: pointer;
        }
        .input-area button:hover { background: #0056b3; }
    </style>
</head>
<body>
<div class="chat-container">
    <h2>💬 Chatbot Tiket Layanan</h2>
    <div id="chatBox" class="chat-box"></div>

    <div class="input-area">
        <input type="text" id="userInput" placeholder="Ketik pesan..." />
        <button onclick="sendMessage()">Kirim</button>
    </div>
</div>

<script>
async function sendMessage() {
    const input = document.getElementById('userInput');
    const message = input.value.trim();
    if (!message) return;

    const chatBox = document.getElementById('chatBox');
    chatBox.innerHTML += `<div class="msg user">${message}</div>`;
    input.value = '';
    chatBox.scrollTop = chatBox.scrollHeight;

    // Kirim ke backend CI4
    const res = await fetch('/chatbot/sendMessage', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'message=' + encodeURIComponent(message)
    });

    const data = await res.json();
    chatBox.innerHTML += `<div class="msg bot">${data.reply}</div>`;
    chatBox.scrollTop = chatBox.scrollHeight;
}
</script>
</body>
</html>
