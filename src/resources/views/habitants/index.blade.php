<x-app-layout>
    <x-slot name="header">
        <div class="bg-white rounded-lg shadow-sm p-4">
            <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-3">
                <span class="text-3xl">👥</span>
                Liste des Habitants
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-6">
            
            <!-- Bouton Ajouter -->
            <div class="mb-6">
                <a href="{{ route('habitants.create') }}" 
                   class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-lg transition-colors shadow-sm">
                    <span class="text-lg">+</span>
                    Ajouter un Habitant
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
                            <h3 class="text-xl font-bold text-white">Liste des Habitants</h3>
                            <p class="text-blue-100 text-sm">Gérez les informations de vos résidents</p>
                        </div>
                    </div>
                </div>

                <!-- Contenu du tableau -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Nom</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Prénom</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Téléphone</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Maison</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($habitants as $habitant)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $habitant->nom }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $habitant->prenom }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $habitant->telephone }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $habitant->maison->rue }}</td>
                               <td class="px-6 py-4 text-center">
    <div class="flex items-center justify-center gap-3">
        <a href="{{ route('habitants.edit', $habitant->id) }}" 
           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg text-xs font-medium transition-colors">
            Modifier
        </a>
        <button onclick="if(confirm('Voulez-vous vraiment supprimer {{ $habitant->nom }} {{ $habitant->prenom }} ?')) { document.getElementById('delete-form-{{ $habitant->id }}').submit(); }" 
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-xs font-medium transition-colors">
            Supprimer
        </button>
        <form id="delete-form-{{ $habitant->id }}" action="{{ route('habitants.destroy', $habitant->id) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Message si aucun résultat -->
                    @if($habitants->isEmpty())
                        <div class="text-center py-12">
                            <div class="inline-flex p-6 bg-gray-100 rounded-xl mb-4">
                                <span class="text-4xl text-gray-400">👥</span>
                            </div>
                            <h3 class="text-lg font-medium text-gray-600 mb-1">Aucun habitant trouvé</h3>
                            <p class="text-gray-500 text-sm">Commencez par ajouter votre premier habitant.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Pagination -->
            @if(method_exists($habitants, 'links'))
                <div class="mt-6">
                    {{ $habitants->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>