<div id="chatbot" class="rounded-lg border bg-white p-6 shadow-sm">
    <div class="mb-4">
        <h2 class="text-xl font-bold">Chatbot Mobilis</h2>
        <p class="text-sm text-gray-500">
            Discutez avec notre assistant virtuel pour obtenir de l'aide
        </p>
    </div>
    <div class="h-[400px] flex flex-col">
        <div id="chat-messages" class="flex-1 overflow-y-auto mb-4 space-y-4 p-4 border rounded-md">
            <div class="flex justify-start">
                <div class="max-w-[80%] rounded-lg bg-gray-100 px-4 py-2">
                    Bonjour ! Je suis le chatbot de Mobilis. Comment puis-je vous aider aujourd'hui ?
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <input 
                id="chat-input" 
                type="text" 
                placeholder="Tapez votre message ici..." 
                class="flex-1 rounded-md border border-gray-300 px-3 py-2 text-sm"
            >
            <button 
                id="send-message" 
                class="inline-flex items-center justify-center rounded-md bg-blue-600 p-2 text-white hover:bg-blue-700"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                <span class="sr-only">Envoyer</span>
            </button>
        </div>
    </div>
</div>