
<x-app-layout>
    <div class="flex h-screen font-sans bg-gradient-to-br from-slate-50 to-blue-50">

        <!-- Sidebar améliorée -->
        <aside class="w-72 bg-white text-slate-700 flex flex-col border-r border-gray-200 shadow-2xl relative overflow-hidden">
            <!-- Décoration de fond -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-100 to-transparent rounded-full -translate-y-16 translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-indigo-100 to-transparent rounded-full translate-y-12 -translate-x-12"></div>
            
            <div class="p-6 relative z-10">
                <!-- Header avec avatar -->
                <div class="mb-8 text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-3 shadow-lg">
                        <span class="material-icons text-white text-2xl">admin_panel_settings</span>
                    </div>
                    <h1 class="text-xl font-bold text-gray-800">Administrateur</h1>
                    <p class="text-sm text-gray-500 mt-1">Tableau de bord</p>
                </div>

                <!-- Navigation améliorée -->
                <nav class="flex flex-col space-y-2">
                    <a href="{{ route('habitants.index') }}" 
                       class="group flex items-center px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-blue-600 hover:to-indigo-600 hover:text-white transition-all duration-300 hover:shadow-lg hover:scale-105 active:scale-95">
                        <div class="w-10 h-10 bg-blue-100 group-hover:bg-white/20 rounded-lg flex items-center justify-center mr-3 transition-colors duration-300">
                            <span class="material-icons text-blue-600 group-hover:text-white">people</span>
                        </div>
                        <span class="font-medium">Habitants</span>
                        <span class="material-icons ml-auto opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                    </a>
                    
                    <a href="{{ route('maisons.index') }}" 
                       class="group flex items-center px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-emerald-600 hover:to-teal-600 hover:text-white transition-all duration-300 hover:shadow-lg hover:scale-105 active:scale-95">
                        <div class="w-10 h-10 bg-emerald-100 group-hover:bg-white/20 rounded-lg flex items-center justify-center mr-3 transition-colors duration-300">
                            <span class="material-icons text-emerald-600 group-hover:text-white">home</span>
                        </div>
                        <span class="font-medium">Maisons</span>
                        <span class="material-icons ml-auto opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                    </a>
                    
                    <a href="{{ route('quartiers.index') }}" 
                       class="group flex items-center px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-amber-600 hover:to-orange-600 hover:text-white transition-all duration-300 hover:shadow-lg hover:scale-105 active:scale-95">
                        <div class="w-10 h-10 bg-amber-100 group-hover:bg-white/20 rounded-lg flex items-center justify-center mr-3 transition-colors duration-300">
                            <span class="material-icons text-amber-600 group-hover:text-white">location_city</span>
                        </div>
                        <span class="font-medium">Quartiers</span>
                        <span class="material-icons ml-auto opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                    </a>
                    
                    <a href="{{ route('deleguequartiers.index') }}" 
                       class="group flex items-center px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-purple-600 hover:to-violet-600 hover:text-white transition-all duration-300 hover:shadow-lg hover:scale-105 active:scale-95">
                        <div class="w-10 h-10 bg-purple-100 group-hover:bg-white/20 rounded-lg flex items-center justify-center mr-3 transition-colors duration-300">
                            <span class="material-icons text-purple-600 group-hover:text-white">badge</span>
                        </div>
                        <span class="font-medium">Délégués</span>
                        <span class="material-icons ml-auto opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                    </a>
                    
                    <a href="{{ route('proprietaires.index') }}" 
                       class="group flex items-center px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-red-600 hover:to-pink-600 hover:text-white transition-all duration-300 hover:shadow-lg hover:scale-105 active:scale-95">
                        <div class="w-10 h-10 bg-red-100 group-hover:bg-white/20 rounded-lg flex items-center justify-center mr-3 transition-colors duration-300">
                            <span class="material-icons text-red-600 group-hover:text-white">account_balance</span>
                        </div>
                        <span class="font-medium">Propriétaires</span>
                        <span class="material-icons ml-auto opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                    </a>
                </nav>
                
                <!-- Footer sidebar -->
                <div class="mt-12 pt-6 border-t border-gray-200">
                    <div class="text-xs text-gray-400 text-center">
                        <p>Version 1.0</p>
                        <p class="mt-1">© 2024 Dashboard</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main content amélioré -->
        <main class="flex-1 overflow-auto p-8">
            <!-- Header avec breadcrumb et actions -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <nav class="flex items-center text-sm text-gray-500 mb-2">
                        <span class="material-icons text-sm mr-1">home</span>
                        <span>Dashboard</span>
                    </nav>
                    <h1 class="text-3xl font-bold text-gray-800">Tableau de bord</h1>
                </div>
                <div class="flex space-x-3">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition flex items-center">
                        <span class="material-icons text-sm mr-2">refresh</span>
                        Actualiser
                    </button>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
                        <span class="material-icons text-sm mr-2">add</span>
                        Nouveau
                    </button>
                </div>
            </div>

            <!-- Welcome card améliorée -->
            <div class="relative bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white rounded-2xl shadow-2xl p-8 mb-8 overflow-hidden">
                <!-- Éléments décoratifs -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-24 -translate-x-24"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-4xl font-bold mb-3 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                                Bienvenue, {{ Auth::user()?->name ?? 'Administrateur' }} 👋
                            </h2>
                            <p class="text-xl text-blue-100 mb-6">Voici un aperçu global de votre plateforme de gestion.</p>
                            <div class="flex space-x-4">
                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                                    <p class="text-sm text-blue-100">Dernière connexion</p>
                                    <p class="font-semibold">{{ now()->format('d/m/Y à H:i') }}</p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2">
                                    <p class="text-sm text-blue-100">Statut</p>
                                    <p class="font-semibold flex items-center">
                                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                                        En ligne
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="hidden lg:block">
                            <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <span class="material-icons text-4xl">dashboard</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section statistiques rapides -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500 hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Habitants</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $data[0] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons text-blue-600">people</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-emerald-500 hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Maisons</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $data[1] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons text-emerald-600">home</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-amber-500 hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Quartiers</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $data[2] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons text-amber-600">location_city</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Délégués</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $data[3] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons text-purple-600">badge</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Graphique Chart.js amélioré -->
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">Statistiques globales</h3>
                        <p class="text-gray-500 mt-1">Vue d'ensemble des données de la plateforme</p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition">
                            <span class="material-icons">download</span>
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <canvas id="statsChart" height="100"></canvas>
                </div>
            </div>
        </main>
    </div>

    <!-- Chart.js avec configuration améliorée -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('statsChart').getContext('2d');
        const statsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Nombre',
                    data: @json($data),
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',   // Blue
                        'rgba(16, 185, 129, 0.8)',   // Emerald
                        'rgba(245, 158, 11, 0.8)',   // Amber
                        'rgba(139, 92, 246, 0.8)',   // Purple
                        'rgba(239, 68, 68, 0.8)',    // Red
                    ],
                    borderColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(245, 158, 11, 1)',
                        'rgba(139, 92, 246, 1)',
                        'rgba(239, 68, 68, 1)',
                    ],
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
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
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        precision: 0,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6B7280',
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: { 
                        grid: {
                            display: false
                        },
                        ticks: { 
                            color: '#6B7280',
                            font: { 
                                size: 14,
                                weight: '500'
                            }
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        });
    </script>

    <!-- Material Icons et polices -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Animation pour les hover effects */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .animate-slide-in {
            animation: slideIn 0.3s ease-out;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</x-app-layout>
