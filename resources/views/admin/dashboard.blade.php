@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête du Dashboard -->
        <div class="flex justify-between items-center mb-8 border-b border-gray-800 pb-4">
            <h1 class="text-2xl font-bold">Tableau de Bord des Réclamations</h1>
            <div class="flex space-x-4">
                <div class="bg-gray-800 rounded-md px-4 py-2">
                    <span class="text-sm text-gray-400">Période</span>
                    <select id="period-selector" class="ml-2 bg-gray-700 border-none rounded text-sm">
                        <option value="7">7 derniers jours</option>
                        <option value="30" selected>30 derniers jours</option>
                        <option value="90">90 derniers jours</option>
                        <option value="365">Année</option>
                    </select>
                </div>
                <a href="{{ route('admin.reclamations') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Voir les réclamations
                </a>
            </div>
        </div>

        <!-- Cartes de statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-gray-400 text-sm font-medium mb-2">Total des Réclamations</h3>
                <div class="flex items-center">
                    <span class="text-3xl font-bold" id="total-reclamations">{{ $totalReclamations }}</span>
                    <span class="ml-2 text-sm text-green-400" id="total-growth">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ $growthRate }}%
                    </span>
                </div>
                <p class="text-gray-500 text-xs mt-1">vs période précédente</p>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-gray-400 text-sm font-medium mb-2">Réclamations Résolues</h3>
                <div class="flex items-center">
                    <span class="text-3xl font-bold" id="resolved-count">{{ $resolvedCount }}</span>
                    <span class="ml-2 text-sm text-green-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ $resolvedGrowth }}%
                    </span>
                </div>
                <p class="text-gray-500 text-xs mt-1">vs période précédente</p>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-gray-400 text-sm font-medium mb-2">Réclamations Non Résolues</h3>
                <div class="flex items-center">
                    <span class="text-3xl font-bold" id="unresolved-count">{{ $unresolvedCount }}</span>
                    <span class="ml-2 text-sm text-red-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                        {{ $unresolvedGrowth }}%
                    </span>
                </div>
                <p class="text-gray-500 text-xs mt-1">vs période précédente</p>
            </div>

            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-gray-400 text-sm font-medium mb-2">Réclamations Supprimées</h3>
                <div class="flex items-center">
                    <span class="text-3xl font-bold" id="deleted-count">{{ $deletedCount }}</span>
                    <span class="ml-2 text-sm text-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        {{ $deletedGrowth }}%
                    </span>
                </div>
                <p class="text-gray-500 text-xs mt-1">vs période précédente</p>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Graphique de performance -->
            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-lg font-medium mb-4">Performance des Réclamations</h3>
                <div class="flex justify-between mb-6">
                    <div class="text-center">
                        <div class="relative inline-block" style="width: 150px; height: 150px;">
                            <canvas id="resolvedGauge"></canvas>
                            <div class="absolute inset-0 flex items-center justify-center flex-col">
                                <span class="text-2xl font-bold">{{ $resolvedPercentage }}%</span>
                                <span class="text-xs text-gray-400">Résolues</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="relative inline-block" style="width: 150px; height: 150px;">
                            <canvas id="unresolvedGauge"></canvas>
                            <div class="absolute inset-0 flex items-center justify-center flex-col">
                                <span class="text-2xl font-bold">{{ $unresolvedPercentage }}%</span>
                                <span class="text-xs text-gray-400">Non Résolues</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 text-center">
                    <div>
                        <p class="text-gray-400 text-sm">Temps moyen de résolution</p>
                        <p class="text-xl font-bold">{{ $avgResolutionTime }} heures</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Taux de résolution</p>
                        <p class="text-xl font-bold">{{ $resolutionRate }}%</p>
                    </div>
                </div>
            </div>

            <!-- Graphique par type de réclamation -->
            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-lg font-medium mb-4">Réclamations par Type</h3>
                <div class="h-64">
                    <canvas id="typeChart"></canvas>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Graphique d'évolution dans le temps -->
            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-lg font-medium mb-4">Évolution des Réclamations</h3>
                <div class="h-64">
                    <canvas id="timelineChart"></canvas>
                </div>
            </div>

            <!-- Graphique de statut des réclamations -->
            <div class="bg-gray-800 rounded-lg p-6 shadow-lg">
                <h3 class="text-lg font-medium mb-4">Statut des Réclamations</h3>
                <div class="flex justify-center h-64">
                    <canvas id="statusPieChart"></canvas>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="flex items-center">
                        <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                        <span class="text-sm">Résolues ({{ $resolvedPercentage }}%)</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 rounded-full bg-blue-500 mr-2"></span>
                        <span class="text-sm">Non Résolues ({{ $unresolvedPercentage }}%)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stockage des données pour JavaScript -->
<div id="dashboard-data" 
    data-resolved-percentage="{{ $resolvedPercentage }}"
    data-unresolved-percentage="{{ $unresolvedPercentage }}"
    data-resolved-count="{{ $resolvedCount }}"
    data-unresolved-count="{{ $unresolvedCount }}"
    data-type-labels="{{ json_encode($typeLabels) }}"
    data-type-resolved="{{ json_encode($typeResolvedData) }}"
    data-type-unresolved="{{ json_encode($typeUnresolvedData) }}"
    data-type-deleted="{{ json_encode($typeDeletedData) }}"
    data-timeline-labels="{{ json_encode($timelineLabels) }}"
    data-timeline-total="{{ json_encode($timelineTotalData) }}"
    data-timeline-resolved="{{ json_encode($timelineResolvedData) }}"
    data-timeline-unresolved="{{ json_encode($timelineUnresolvedData) }}"
    style="display: none;">
</div>

<!-- Inclusion de Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script JavaScript séparé -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Récupération des données depuis l'élément HTML
    var dataElement = document.getElementById('dashboard-data');
    
    // Extraction des données
    var dashboardData = {
        resolvedPercentage: parseInt(dataElement.getAttribute('data-resolved-percentage')),
        unresolvedPercentage: parseInt(dataElement.getAttribute('data-unresolved-percentage')),
        resolvedCount: parseInt(dataElement.getAttribute('data-resolved-count')),
        unresolvedCount: parseInt(dataElement.getAttribute('data-unresolved-count')),
        typeLabels: JSON.parse(dataElement.getAttribute('data-type-labels')),
        typeResolvedData: JSON.parse(dataElement.getAttribute('data-type-resolved')),
        typeUnresolvedData: JSON.parse(dataElement.getAttribute('data-type-unresolved')),
        typeDeletedData: JSON.parse(dataElement.getAttribute('data-type-deleted')),
        timelineLabels: JSON.parse(dataElement.getAttribute('data-timeline-labels')),
        timelineTotalData: JSON.parse(dataElement.getAttribute('data-timeline-total')),
        timelineResolvedData: JSON.parse(dataElement.getAttribute('data-timeline-resolved')),
        timelineUnresolvedData: JSON.parse(dataElement.getAttribute('data-timeline-unresolved'))
    };
    
    // Configuration des couleurs
    var colors = {
        green: '#10b981',
        blue: '#3b82f6',
        yellow: '#f59e0b',
        red: '#ef4444',
        purple: '#8b5cf6',
        gray: '#6b7280'
    };

    // Graphique de jauge pour les réclamations résolues
    new Chart(document.getElementById('resolvedGauge'), {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [dashboardData.resolvedPercentage, (100 - dashboardData.resolvedPercentage)],
                backgroundColor: [colors.green, '#374151'],
                borderWidth: 0,
                cutout: '80%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                }
            }
        }
    });

    // Graphique de jauge pour les réclamations non résolues
    new Chart(document.getElementById('unresolvedGauge'), {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [dashboardData.unresolvedPercentage, (100 - dashboardData.unresolvedPercentage)],
                backgroundColor: [colors.blue, '#374151'],
                borderWidth: 0,
                cutout: '80%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                }
            }
        }
    });

    // Graphique par type de réclamation
    new Chart(document.getElementById('typeChart'), {
        type: 'bar',
        data: {
            labels: dashboardData.typeLabels,
            datasets: [
                {
                    label: 'Résolues',
                    data: dashboardData.typeResolvedData,
                    backgroundColor: colors.green,
                    borderColor: colors.green,
                    borderWidth: 1
                },
                {
                    label: 'Non Résolues',
                    data: dashboardData.typeUnresolvedData,
                    backgroundColor: colors.blue,
                    borderColor: colors.blue,
                    borderWidth: 1
                },
                {
                    label: 'Supprimées',
                    data: dashboardData.typeDeletedData,
                    backgroundColor: colors.red,
                    borderColor: colors.red,
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: '#9ca3af'
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: '#9ca3af'
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: '#9ca3af'
                    }
                }
            }
        }
    });

    // Graphique d'évolution dans le temps
    new Chart(document.getElementById('timelineChart'), {
        type: 'line',
        data: {
            labels: dashboardData.timelineLabels,
            datasets: [
                {
                    label: 'Total',
                    data: dashboardData.timelineTotalData,
                    borderColor: colors.purple,
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Résolues',
                    data: dashboardData.timelineResolvedData,
                    borderColor: colors.green,
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    tension: 0.4
                },
                {
                    label: 'Non Résolues',
                    data: dashboardData.timelineUnresolvedData,
                    borderColor: colors.blue,
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: '#9ca3af'
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: '#9ca3af'
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: '#9ca3af'
                    }
                }
            }
        }
    });

    // Graphique de statut des réclamations
    new Chart(document.getElementById('statusPieChart'), {
        type: 'pie',
        data: {
            labels: ['Résolues', 'Non Résolues'],
            datasets: [{
                data: [dashboardData.resolvedCount, dashboardData.unresolvedCount],
                backgroundColor: [colors.green, colors.blue],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Gestion du changement de période
    document.getElementById('period-selector').addEventListener('change', function(e) {
        // Dans une application réelle, vous feriez une requête AJAX ici pour mettre à jour les données
        console.log('Période sélectionnée:', e.target.value);
        // Simuler un chargement
        alert('Changement de période à ' + e.target.value + ' jours. Dans une application réelle, les données seraient mises à jour via AJAX.');
    });
});
</script>
@endsection

