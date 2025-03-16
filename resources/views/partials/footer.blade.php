<footer class="w-full border-t bg-white py-6 md:py-12">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-xl">
                <img src="{{ asset('img/logo.ico') }}" alt="Mobilis Logo" class="w-21 h-11 rounded-md" >
                </a>
                <p class="text-sm text-gray-500">
                    Votre opérateur de confiance depuis 2003.
                </p>
            </div>
            
            <div class="space-y-4">
                <h3 class="text-sm font-medium">Liens rapides</h3>
                <nav class="flex flex-col space-y-2">
                    <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-gray-900">Accueil</a>
                    <a href="#chatbot" class="text-sm text-gray-500 hover:text-gray-900">Chatbot</a>
                    <a href="#reclamation" class="text-sm text-gray-500 hover:text-gray-900">Réclamation</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-900">Contact</a>
                </nav>
            </div>
            
            <div class="space-y-4">
                <h3 class="text-sm font-medium">Nos services</h3>
                <nav class="flex flex-col space-y-2">
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-900">Forfaits mobiles</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-900">Internet</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-900">Services à valeur ajoutée</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-gray-900">Roaming</a>
                </nav>
            </div>
            
            <div class="space-y-4">
                <h3 class="text-sm font-medium">Contact</h3>
                <div class="flex flex-col space-y-2 text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+213 XXX XXX XXX</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>contact@mobilis.dz</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Alger, Algérie</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-8 border-t pt-8">
            <p class="text-center text-sm text-gray-500">
                © {{ date('Y') }} Mobilis. Tous droits réservés.
            </p>
        </div>
    </div>
</footer>