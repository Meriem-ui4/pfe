@extends('layouts.app')

@section('hide_footer', true)

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-6 sm:p-8">
            <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-gray-800">Formulaire de Réclamation</h1>
                <p class="text-gray-600 mt-2">Nous sommes à votre écoute. Partagez votre préoccupation avec nous.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded" role="alert">
                    <p class="font-medium">Succès!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('reclamations.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input 
                            type="text" 
                            name="nom" 
                            id="nom" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        @error('nom')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                        <input 
                            type="text" 
                            name="prenom" 
                            id="prenom" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        @error('prenom')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <input 
                            type="text" 
                            name="telephone" 
                            id="telephone" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        @error('telephone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type de Réclamation</label>
                    <select 
                        name="type" 
                        id="type" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        required
                    >
                        <option value="">Sélectionnez un type</option>
                        <option value="Technique">Technique</option>
                        <option value="Facturation">Facturation</option>
                        <option value="Service Client">Service Client</option>
                        <option value="Autre">Autre</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                    <textarea 
                        name="message" 
                        id="message" 
                        rows="5" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        required
                    ></textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between pt-4">
                    <div class="text-sm text-gray-600">
                        <span>* Tous les champs sont obligatoires</span>
                    </div>
                    <button 
                        type="submit" 
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                    >
                        Envoyer ma réclamation
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-6 sm:p-8">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-gray-900">Besoin d'aide?</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Si vous avez besoin d'assistance immédiate, n'hésitez pas à nous contacter directement au 
                        <a href="tel:+213XXXXXXXX" class="text-blue-600 hover:text-blue-800 font-medium">+213 XX XX XX XX</a>
                        ou par email à 
                        <a href="mailto:contact@mobilis.dz" class="text-blue-600 hover:text-blue-800 font-medium">contact@mobilis.dz</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

