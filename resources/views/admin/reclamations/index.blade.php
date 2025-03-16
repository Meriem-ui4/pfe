@extends('layouts.app')

@section('hide_footer', true)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Gestion des Réclamations</h1>
        <div class="bg-white rounded-full px-3 py-1 text-sm font-medium shadow-sm border">
            Total: {{ $reclamations->count() }} réclamations
        </div>
    </div>

    <!-- Onglets -->
    <div class="mb-6 border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
            <li class="mr-2">
                <a href="#non-consulte" class="inline-block p-4 border-b-2 border-blue-600 rounded-t-lg active text-blue-600" id="tab-non-consulte">
                    Messages Non Consultés
                    <span class="ml-1 px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                        {{ $reclamations->where('status', 'non_consulte')->count() }}
                    </span>
                </a>
            </li>
            <li class="mr-2">
                <a href="#resolu" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="tab-resolu">
                    Messages Résolus
                    <span class="ml-1 px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        {{ $reclamations->where('status', 'resolu')->count() }}
                    </span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Contenu des onglets -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <!-- Messages Non Consultés -->
        <div id="content-non-consulte" class="tab-content">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">prenom</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">téléphone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Supprimer</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($reclamations as $reclamation)
                            @if($reclamation->status == 'non_consulte')
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $reclamation->nom }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $reclamation->prenom}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reclamation->telephone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reclamation->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $reclamation->type }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                        @if(strlen($reclamation->message) > 50)
                                            <span class="truncate block">{{ substr($reclamation->message, 0, 50) }}...</span>
                                            <button type="button" class="mt-1 text-blue-600 hover:text-blue-800 text-xs font-medium" 
                                                    onclick="openModal('modal-{{ $reclamation->id }}')">
                                                Voir le message complet
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div id="modal-{{ $reclamation->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-modal="true" role="dialog">
                                                <div class="flex items-center justify-center min-h-screen p-4">
                                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeModal('modal-{{ $reclamation->id }}')"></div>
                                                    <div class="relative bg-white rounded-lg max-w-lg w-full mx-auto shadow-xl">
                                                        <div class="p-6">
                                                            <div class="flex items-start justify-between mb-4">
                                                                <h3 class="text-lg font-medium text-gray-900">Message Complet</h3>
                                                                <button type="button" class="text-gray-400 hover:text-gray-500" onclick="closeModal('modal-{{ $reclamation->id }}')">
                                                                    <span class="sr-only">Fermer</span>
                                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500 whitespace-pre-wrap">{{ $reclamation->message }}</p>
                                                            </div>
                                                            <div class="mt-6 flex justify-end">
                                                                <button type="button" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200" 
                                                                        onclick="closeModal('modal-{{ $reclamation->id }}')">
                                                                    Fermer
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            {{ $reclamation->message }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $reclamation->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="resolu">
                                            <button type="submit" class="px-3 py-1.5 bg-green-600 text-white text-xs font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                    onclick="return confirm('Confirmer la résolution de la réclamation ?')">
                                                Résoudre
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('reclamations.destroy', $reclamation->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none" 
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation ?')" 
                                                    title="Supprimer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        
                        @if($reclamations->where('status', 'non_consulte')->count() == 0)
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-sm text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="mt-2">Aucune réclamation non consultée</span>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Messages Résolus -->
        <div id="content-resolu" class="tab-content hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">prenom</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">téléphone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Supprimer</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($reclamations as $reclamation)
                            @if($reclamation->status == 'resolu')
                                <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $reclamation->nom }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $reclamation->prenom}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reclamation->telephone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reclamation->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $reclamation->type }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                        @if(strlen($reclamation->message) > 50)
                                            <span class="truncate block">{{ substr($reclamation->message, 0, 50) }}...</span>
                                            <button type="button" class="mt-1 text-blue-600 hover:text-blue-800 text-xs font-medium" 
                                                    onclick="openModal('modal-resolu-{{ $reclamation->id }}')">
                                                Voir le message complet
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div id="modal-resolu-{{ $reclamation->id }}" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-modal="true" role="dialog">
                                                <div class="flex items-center justify-center min-h-screen p-4">
                                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeModal('modal-resolu-{{ $reclamation->id }}')"></div>
                                                    <div class="relative bg-white rounded-lg max-w-lg w-full mx-auto shadow-xl">
                                                        <div class="p-6">
                                                            <div class="flex items-start justify-between mb-4">
                                                                <h3 class="text-lg font-medium text-gray-900">Message Complet</h3>
                                                                <button type="button" class="text-gray-400 hover:text-gray-500" onclick="closeModal('modal-resolu-{{ $reclamation->id }}')">
                                                                    <span class="sr-only">Fermer</span>
                                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500 whitespace-pre-wrap">{{ $reclamation->message }}</p>
                                                            </div>
                                                            <div class="mt-6 flex justify-end">
                                                                <button type="button" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200" 
                                                                        onclick="closeModal('modal-resolu-{{ $reclamation->id }}')">
                                                                    Fermer
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            {{ $reclamation->message }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $reclamation->updated_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="non_consulte">
                                            <button type="submit" class="px-3 py-1.5 bg-yellow-600 text-white text-xs font-medium rounded-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                                                    onclick="return confirm('Marquer cette réclamation comme non résolue ?')">
                                                Non résolu
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('reclamations.destroy', $reclamation->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none" 
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation ?')" 
                                                    title="Supprimer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        
                        @if($reclamations->where('status', 'resolu')->count() == 0)
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-sm text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <span class="mt-2">Aucune réclamation résolue</span>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Gestion des onglets
    document.addEventListener('DOMContentLoaded', function() {
        const tabNonConsulte = document.getElementById('tab-non-consulte');
        const tabResolu = document.getElementById('tab-resolu');
        const contentNonConsulte = document.getElementById('content-non-consulte');
        const contentResolu = document.getElementById('content-resolu');

        tabNonConsulte.addEventListener('click', function(e) {
            e.preventDefault();
            // Activer l'onglet
            tabNonConsulte.classList.add('border-blue-600', 'text-blue-600');
            tabNonConsulte.classList.remove('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
            tabResolu.classList.remove('border-blue-600', 'text-blue-600');
            tabResolu.classList.add('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
            
            // Afficher le contenu
            contentNonConsulte.classList.remove('hidden');
            contentResolu.classList.add('hidden');
        });

        tabResolu.addEventListener('click', function(e) {
            e.preventDefault();
            // Activer l'onglet
            tabResolu.classList.add('border-blue-600', 'text-blue-600');
            tabResolu.classList.remove('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
            tabNonConsulte.classList.remove('border-blue-600', 'text-blue-600');
            tabNonConsulte.classList.add('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
            
            // Afficher le contenu
            contentResolu.classList.remove('hidden');
            contentNonConsulte.classList.add('hidden');
        });
    });

    // Gestion des modals
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>
@endsection

