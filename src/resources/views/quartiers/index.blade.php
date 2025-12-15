<x-app-layout>
    <x-slot name="header">
        <div class="bg-white rounded-lg shadow-sm p-4">
            <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-3">
                <span class="text-3xl">🏘️</span>
                Liste des Quartiers
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-6">
            
            <!-- Header avec bouton -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Tous les Quartiers</h3>
                <a href="{{ route('quartiers.create') }}" 
                   class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-lg transition-colors shadow-sm">
                    <span class="text-lg">+</span>
                    Ajouter un Quartier
                </a>
            </div>

            <!-- Tableau -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                
                <!-- Header du tableau -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-white/20 rounded-xl">
                            <span class="text-2xl">📋</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Gestion des Quartiers</h3>
                            <p class="text-blue-100 text-sm">Administrez les quartiers de votre ville</p>
                        </div>
                    </div>
                </div>

                <!-- Contenu du tableau -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nom du Quartier</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($quartiers as $quartier)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $quartier->nomQuartier }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <a href="{{ route('quartiers.edit', $quartier->id) }}" 
                                               class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-xs font-medium transition-colors">
                                                Modifier
                                            </a>
                                            <form action="{{ route('quartiers.destroy', $quartier->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-xs font-medium transition-colors"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce quartier ?')">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Message si aucun résultat -->
                    @if($quartiers->isEmpty())
                        <div class="text-center py-12">
                            <div class="inline-flex p-6 bg-gray-100 rounded-xl mb-4">
                                <span class="text-4xl text-gray-400">🏘️</span>
                            </div>
                            <h3 class="text-lg font-medium text-gray-600 mb-1">Aucun quartier trouvé</h3>
                            <p class="text-gray-500 text-sm">Commencez par créer votre premier quartier.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>