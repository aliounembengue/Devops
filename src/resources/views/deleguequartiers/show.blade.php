<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-6">
            
            <!-- Hero Header Section -->
            <div class="bg-white rounded-2xl shadow-lg mb-8 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                        <div class="flex items-center gap-6">
                            <div class="p-4 bg-white/20 rounded-xl">
                                <span class="text-4xl">🏘️</span>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-2">{{ $quartier->nomQuartier }}</h1>
                                <p class="text-blue-100">Quartier résidentiel</p>
                            </div>
                        </div>
                        
                        <a href="{{ route('deleguequartiers.create', ['quartier_id' => $quartier->id]) }}"
                           class="bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-lg transition-colors">
                            <span class="flex items-center gap-2">
                                <span>👨‍💼</span>
                                Ajouter Délégué
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                
                <!-- Left Column - Main Info -->
                <div class="xl:col-span-2 space-y-6">
                    
                    <!-- Description & Delegate Card -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="bg-gray-800 p-6">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white/10 rounded-lg">
                                    <span class="text-xl">📋</span>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Informations du quartier</h2>
                                    <p class="text-gray-300 text-sm">Description et délégué responsable</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6 space-y-6">
                            <!-- Description -->
                            <div class="p-6 bg-blue-50 rounded-xl border border-blue-100">
                                <div class="flex items-start gap-4">
                                    <div class="p-2 bg-blue-100 rounded-lg">
                                        <span class="text-xl text-blue-600">📝</span>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-800 mb-2">Description</h3>
                                        <p class="text-gray-600">
                                            {{ $quartier->description ?? 'Aucune description disponible pour ce quartier.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Delegate -->
                            <div class="p-6 bg-green-50 rounded-xl border border-green-100">
                                <div class="flex items-center gap-4">
                                    <div class="p-2 bg-green-100 rounded-lg">
                                        <span class="text-xl text-green-600">👨‍💼</span>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-800 mb-3">Délégué responsable</h3>
                                        @if($quartier->delegue?->habitant)
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                                    <span class="text-white font-medium">{{ substr($quartier->delegue->habitant->nom, 0, 1) }}</span>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-gray-800">{{ $quartier->delegue->habitant->nom }} {{ $quartier->delegue->habitant->prenom }}</p>
                                                    <p class="text-sm text-green-600">Délégué de quartier</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                                    <span class="text-gray-400">?</span>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 italic">Aucun délégué assigné</p>
                                                    <p class="text-sm text-gray-400">Position vacante</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inhabitants Grid -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="bg-purple-600 p-6">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-white/10 rounded-lg">
                                    <span class="text-xl">👥</span>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white">Habitants du quartier</h2>
                                    <p class="text-purple-100 text-sm">{{ $quartier->habitants->count() }} {{ $quartier->habitants->count() > 1 ? 'habitants' : 'habitant' }} enregistré{{ $quartier->habitants->count() > 1 ? 's' : '' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            @if($quartier->habitants->isEmpty())
                                <div class="text-center py-12">
                                    <div class="inline-flex p-6 bg-gray-100 rounded-xl mb-4">
                                        <span class="text-4xl text-gray-400">👨‍👩‍👧‍👦</span>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-600 mb-1">Aucun habitant</h3>
                                    <p class="text-gray-500 text-sm">Ce quartier n'a pas encore d'habitants enregistrés.</p>
                                </div>
                            @else
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($quartier->habitants as $habitant)
                                        <div class="p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                            <div class="text-center">
                                                <div class="inline-flex p-3 bg-purple-500 rounded-xl mb-3">
                                                    <span class="text-white font-medium">{{ substr($habitant->nom, 0, 1) }}</span>
                                                </div>
                                                <h3 class="font-medium text-gray-800">{{ $habitant->nom }} {{ $habitant->prenom }}</h3>
                                                <p class="text-purple-600 text-sm">Résident</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Column - Quick Stats -->
                <div class="space-y-6">
                    
                    <!-- Quick Stats Card -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="bg-indigo-600 p-4">
                            <div class="flex items-center gap-2">
                                <div class="p-1 bg-white/20 rounded">
                                    <span class="text-lg">📊</span>
                                </div>
                                <h3 class="font-semibold text-white">Statistiques</h3>
                            </div>
                        </div>
                        
                        <div class="p-4 space-y-3">
                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">👥</span>
                                    <span class="font-medium text-gray-700 text-sm">Habitants</span>
                                </div>
                                <span class="text-lg font-bold text-blue-600">{{ $quartier->habitants->count() }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">👨‍💼</span>
                                    <span class="font-medium text-gray-700 text-sm">Délégués</span>
                                </div>
                                <span class="text-lg font-bold text-green-600">{{ $quartier->delegue ? 1 : 0 }}</span>
                            </div>
                        </div>
                    </div>

                  
                        
                        <div class="p-4 space-y-3">
                            @if(!$quartier->delegue)
                                <div class="p-3 bg-amber-50 rounded-lg border-l-3 border-amber-400">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-amber-600">⚠️</span>
                                        <span class="font-medium text-amber-800 text-sm">Action requise</span>
                                    </div>
                                    <p class="text-amber-700 text-xs">Ce quartier n'a pas de délégué assigné.</p>
                                </div>
                            @endif
                            
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>