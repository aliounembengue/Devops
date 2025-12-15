<x-app-layout>
    <x-slot name="header">
        <div class="bg-white rounded-lg shadow-sm p-4">
            <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-3">
                <span class="text-3xl">🏠</span>
                Liste des Maisons
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-6">
            
            <!-- Bouton Ajouter -->
            <div class="mb-6">
                <a href="{{ route('maisons.create') }}" 
                   class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-lg transition-colors shadow-sm">
                    <span class="text-lg">+</span>
                    Ajouter une Maison
                </a>
            </div>

            <!-- Tableau -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                
                <!-- Header du tableau -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-white/20 rounded-xl">
                            <span class="text-2xl">🏘️</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Liste des Maisons</h3>
                            <p class="text-blue-100 text-sm">Gérez les propriétés de votre quartier</p>
                        </div>
                    </div>
                </div>

                <!-- Contenu du tableau -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Surface</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Numéro de maison</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Quartier</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($maisons as $maison)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $maison->surface }} m²</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $maison->rue }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $maison->quartier->nomQuartier ?? 'Non défini' }}</td>
                                   <td class="px-6 py-4 text-center">
    <div class="flex items-center justify-center gap-3">
        <!-- Modifier -->
        <a href="{{ route('maisons.edit', $maison->id) }}" 
           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg text-xs font-medium transition-colors">
           Modifier
        </a>

        <!-- Supprimer -->
        <form action="{{ route('maisons.destroy', $maison->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-xs font-medium transition-colors"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette maison?')">
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
                    @if($maisons->isEmpty())
                        <div class="text-center py-12">
                            <div class="inline-flex p-6 bg-gray-100 rounded-xl mb-4">
                                <span class="text-4xl text-gray-400">🏠</span>
                            </div>
                            <h3 class="text-lg font-medium text-gray-600 mb-1">Aucune maison trouvée</h3>
                            <p class="text-gray-500 text-sm">Commencez par ajouter votre première maison.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>