<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            Ajouter un Quartier
        </h2>
    </x-slot>

    <div class="flex justify-center py-10">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h3 class="text-2xl font-semibold text-blue-900 mb-6 text-center">Nouveau Quartier</h3>
            
            <form action="{{ route('quartiers.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="nomQuartier" class="block text-gray-700 font-medium mb-2">Nom du Quartier :</label>
                    <input 
                        type="text" 
                        name="nomQuartier" 
                        id="nomQuartier" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Entrez le nom du quartier"
                        required>
                </div>

                <div>
                    <label for="description" class="block text-gray-700 font-medium mb-2">Description :</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Entrez une description du quartier"
                        rows="3"></textarea>
                </div>
                
                <button 
                    type="submit" 
                    class="w-full bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-800 transition">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
