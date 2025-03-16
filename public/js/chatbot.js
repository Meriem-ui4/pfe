document.addEventListener('DOMContentLoaded', function() {
    const chatInput = document.getElementById('chat-input');
    const sendButton = document.getElementById('send-message');
    const chatMessages = document.getElementById('chat-messages');
    
    function sendMessage() {
        const message = chatInput.value.trim();
        if (!message) return;
        
        // Add user message
        appendMessage(message, 'user');
        
        // Clear input
        chatInput.value = '';
        
        // Send to server
        fetch('/chatbot/message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ message })
        })
        .then(response => response.json())
        .then(data => {
            // Add bot response
            appendMessage(data.message, 'bot');
        })
        .catch(error => {
            console.error('Error:', error);
            appendMessage('Désolé, une erreur s\'est produite. Veuillez réessayer plus tard.', 'bot');
        });
    }
    
    function appendMessage(message, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex justify-${sender === 'user' ? 'end' : 'start'}`;
        
        const messageContent = document.createElement('div');
        messageContent.className = `max-w-[80%] rounded-lg px-4 py-2 ${
            sender === 'user' 
                ? 'bg-blue-600 text-white' 
                : 'bg-gray-100'
        }`;
        messageContent.textContent = message;
        
        messageDiv.appendChild(messageContent);
        chatMessages.appendChild(messageDiv);
        
        // Scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    // Event listeners
    sendButton.addEventListener('click', sendMessage);
    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
});