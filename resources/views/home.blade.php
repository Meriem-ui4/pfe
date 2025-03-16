@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<!-- Hero Section avec animation et gradient dynamique -->
<section class="relative overflow-hidden bg-gradient-to-r from-green-400 to-green-300">
    <!-- Formes décoratives animées -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-white opacity-10 animate-pulse"></div>
        <div class="absolute top-1/2 right-0 w-64 h-64 rounded-full bg-white opacity-10 animate-pulse delay-700"></div>
        <div class="absolute bottom-0 left-1/3 w-48 h-48 rounded-full bg-white opacity-10 animate-pulse delay-1000"></div>
    </div>
    
    <div class="container relative mx-auto px-4 py-20 md:py-32 lg:py-40">
        <div class="grid gap-12 lg:grid-cols-2 items-center">
            <div class="flex flex-col space-y-6 text-white">
                <div class="inline-block px-4 py-1 rounded-full bg-white/20 backdrop-blur-sm text-sm font-medium">
                    Votre opérateur de confiance
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                    Connectez-vous à l'avenir avec <span class="text-yellow-300">Mobilis</span>
                </h1>
                <p class="text-lg md:text-xl opacity-90 max-w-xl">
                    Découvrez nos solutions innovantes et restez connecté partout en Algérie avec la meilleure couverture réseau.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="#chatbot" class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white text-green-600 font-medium transition-all hover:bg-yellow-300 hover:text-green-700 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                        </svg>
                        Discuter avec notre chatbot
                    </a>
                    <a href="#reclamation" class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-green-600 text-white font-medium transition-all hover:bg-green-700 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
                        Soumettre une réclamation
                    </a>
                </div>
            </div>
            <div class="relative hidden lg:block">
                <!-- Image principale avec effet de superposition -->
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl transform rotate-2 hover:rotate-0 transition-transform duration-500">
                    <img src="{{ asset('img/mob.jpg') }}" alt="Utilisateur Mobilis" class="w-full h-auto">
                </div>
                <!-- Éléments décoratifs autour de l'image -->
                <div class="absolute top-1/4 -left-10 z-0 w-20 h-20 rounded-lg bg-yellow-300 transform rotate-12"></div>
                <div class="absolute bottom-1/4 -right-8 z-0 w-16 h-16 rounded-full bg-green-500"></div>
            </div>
        </div>
    </div>
    
    <!-- Vague décorative en bas de la section -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto fill-white">
            <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Section Services avec cartes interactives -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Nos Services Premium</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Découvrez comment Mobilis peut transformer votre expérience de communication au quotidien.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte Service 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                <div class="h-48 bg-gradient-to-r from-green-400 to-green-500 relative overflow-hidden">
                    <img src="{{ asset('img/forfait-mobile.jpg') }}" alt="Forfaits Mobiles" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-bold">Forfaits Mobiles</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Des forfaits adaptés à tous vos besoins avec data, appels et SMS illimités.</p>
                    <a href="#" class="inline-flex items-center text-green-500 font-medium group-hover:text-green-600">
                        Découvrir nos offres
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Carte Service 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                <div class="h-48 bg-gradient-to-r from-green-400 to-green-500 relative overflow-hidden">
                    <img src="{{ asset('img/internet-haut-debit.jpg') }}" alt="Internet Haut Débit" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-bold">Internet Haut Débit</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Profitez d'une connexion ultra-rapide pour tous vos appareils.</p>
                    <a href="#" class="inline-flex items-center text-green-500 font-medium group-hover:text-green-600">
                        Explorer nos solutions
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Carte Service 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                <div class="h-48 bg-gradient-to-r from-green-400 to-green-500 relative overflow-hidden">
                    <img src="{{ asset('img/services-premium.jpg') }}" alt="Services Premium" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-bold">Services Premium</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Accédez à nos services exclusifs pour une expérience client exceptionnelle.</p>
                    <a href="#" class="inline-flex items-center text-green-500 font-medium group-hover:text-green-600">
                        Voir les avantages
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Statistiques avec compteurs animés -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-green-500 mb-2">+15M</div>
                <p class="text-gray-600">Clients satisfaits</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-green-500 mb-2">98%</div>
                <p class="text-gray-600">Couverture nationale</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-green-500 mb-2">4G+</div>
                <p class="text-gray-600">Technologie avancée</p>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-green-500 mb-2">24/7</div>
                <p class="text-gray-600">Support client</p>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- Script pour le menu mobile -->
<script>
document.addEventListener('DOMContentLoaded', function() {
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
});
</script>