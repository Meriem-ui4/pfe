@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<!-- Hero Section - Design minimaliste blanc avec accents verts -->
<section class="relative bg-white overflow-hidden">
    <div class="container mx-auto px-4 py-24 md:py-32">
        <div class="grid gap-16 lg:grid-cols-2 items-center">
            <div class="flex flex-col space-y-6">
                <div class="inline-block px-4 py-1 rounded-md bg-gray-50 text-sm font-medium text-green-600 border border-gray-100 mb-2">
                    Premier opérateur en Algérie
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-gray-900">
                    Connectez-vous avec <span class="text-green-600">Mobilis</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-xl">
                    Découvrez nos solutions innovantes et restez connecté partout en Algérie avec la meilleure couverture réseau.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="#chatbot" class="inline-flex items-center justify-center px-6 py-3 rounded-md bg-green-600 text-white font-medium transition-all hover:bg-green-700 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                        </svg>
                        Discuter avec notre chatbot
                    </a>
                    <a href="{{ route('reclamation.create') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-md bg-white text-gray-800 font-medium transition-all hover:bg-gray-50 shadow-sm border border-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                        Soumettre une réclamation
                    </a>
                </div>
            </div>
            <div class="relative hidden lg:block">
                <!-- Image principale avec effet d'ombre subtil -->
                <div class="relative z-10 rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('img/mob.jpg') }}" alt="Utilisateur Mobilis" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Séparateur subtil -->
    <div class="w-full h-px bg-gray-100"></div>
</section>


<!-- Section Statistiques -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-8 bg-white rounded-lg shadow-sm">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">+15M</div>
                <div class="w-10 h-px bg-green-600 mx-auto mb-3"></div>
                <p class="text-gray-600 font-medium">Clients satisfaits</p>
            </div>
            <div class="text-center p-8 bg-white rounded-lg shadow-sm">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">98%</div>
                <div class="w-10 h-px bg-green-600 mx-auto mb-3"></div>
                <p class="text-gray-600 font-medium">Couverture nationale</p>
            </div>
            <div class="text-center p-8 bg-white rounded-lg shadow-sm">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">4G+</div>
                <div class="w-10 h-px bg-green-600 mx-auto mb-3"></div>
                <p class="text-gray-600 font-medium">Technologie avancée</p>
            </div>
            <div class="text-center p-8 bg-white rounded-lg shadow-sm">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">24/7</div>
                <div class="w-10 h-px bg-green-600 mx-auto mb-3"></div>
                <p class="text-gray-600 font-medium">Support client</p>
            </div>
        </div>
    </div>
</section>


<!-- Section CTA  -->
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center bg-white p-12 rounded-lg shadow-sm">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Prêt à rejoindre la famille Mobilis ?</h2>
            <div class="w-16 h-px bg-green-600 mx-auto mb-6"></div>
            <p class="text-xl text-gray-600 mb-10">Découvrez nos offres exceptionnelles et profitez du meilleur réseau en Algérie.</p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="#" class="inline-flex items-center justify-center px-8 py-4 rounded-md bg-green-600 text-white font-medium transition-all hover:bg-green-700 shadow-sm">
                    Découvrir nos offres
                </a>
                <a href="{{ route('reclamation.create') }}" class="inline-flex items-center justify-center px-8 py-4 rounded-md bg-white text-gray-800 font-medium transition-all hover:bg-gray-50 shadow-sm border border-gray-200">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du menu mobile
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Fermer le menu quand on clique sur un lien
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
            });
        });
    }
    
    // Fonctionnalité du chatbot
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');
    
    if (chatForm && chatInput && chatMessages) {
        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const message = chatInput.value.trim();
            if (message === '') return;
            
            // Ajouter le message de l'utilisateur
            addMessage(message, 'user');
            chatInput.value = '';
            
            // Simuler une réponse du chatbot après un court délai
            setTimeout(function() {
                const responses = [
                    "Je vous remercie pour votre message. Un conseiller va vous contacter prochainement.",
                    "Bien sûr, je peux vous aider avec cela. Pourriez-vous me donner plus de détails ?",
                    "Pour cette demande spécifique, je vous invite à contacter notre service client au 666.",
                    "Mobilis propose plusieurs forfaits adaptés à vos besoins. Souhaitez-vous en savoir plus ?",
                    "Je suis désolé, je n'ai pas compris votre demande. Pourriez-vous reformuler ?"
                ];
                
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                addMessage(randomResponse, 'bot');
            }, 1000);
        });
        
        function addMessage(message, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex items-start mb-4' + (sender === 'user' ? ' justify-end' : '');
            
            if (sender === 'user') {
                messageDiv.innerHTML = `
                    <div class="mr-3 bg-gray-50 rounded-lg py-2 px-4 shadow-sm max-w-md">
                        <p class="text-gray-700">${message}</p>
                    </div>
                    <div class="flex-shrink-0 bg-green-600 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                `;
            } else {
                messageDiv.innerHTML = `
                    <div class="flex-shrink-0 bg-green-100 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <div class="ml-3 bg-gray-50 rounded-lg py-2 px-4 shadow-sm max-w-md">
                        <p class="text-gray-700">${message}</p>
                    </div>
                `;
            }
            
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    }
});
</script>
@endsection

