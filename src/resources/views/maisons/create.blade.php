<x-app-layout>
    <x-slot name="header">
        <div class="bg-white rounded-lg shadow-sm p-4">
            <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-3">
                <span class="text-3xl">🏠</span>
                Ajouter une Maison
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-6">
            <div class="max-w-2xl mx-auto">
                
                <!-- Card principale -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    
                    <!-- Header du formulaire -->
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-white/20 rounded-xl">
                                <span class="text-2xl">🏘️</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">Informations de la maison</h3>
                                <p class="text-blue-100 text-sm">Remplissez tous les champs requis</p>
                            </div>
                        </div>
                    </div>

                    <!-- Formulaire -->
                    <div class="p-8">
                        <form action="{{ route('maisons.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Surface -->
                            <div class="space-y-2">
                                <label for="surface" class="flex items-center gap-2 text-gray-700 font-medium">
                                    <span class="text-orange-600">📐</span>
                                    Surface
                                </label>
                                <input type="text" name="surface" id="surface"
                                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                                       placeholder="Ex: 120 m²"
                                       required>
                            </div>

                            <!-- Numéro de maison -->
                            <div class="space-y-2">
                                <label for="rue" class="flex items-center gap-2 text-gray-700 font-medium">
                                    <span class="text-blue-600">🏠</span>
                                    Numéro de maison
                                </label>
                                <input type="text" name="rue" id="rue"
                                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                                       placeholder="Ex: 15 Rue de la Paix"
                                       required>
                            </div>

                            <!-- Quartier -->
                            <div class="space-y-2">
                                <label for="quartier_id" class="flex items-center gap-2 text-gray-700 font-medium">
                                    <span class="text-purple-600">🏘️</span>
                                    Quartier
                                </label>
                                <select name="quartier_id" id="quartier_id"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                                        required>
                                    <option value="">-- Sélectionnez un quartier --</option>
                                    @foreach($quartiers as $quartier)
                                        <option value="{{ $quartier->id }}">{{ $quartier->nomQuartier }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-100">
                                <button type="submit"
                                        class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    <span class="text-lg">✅</span>
                                    Enregistrer la maison
                                </button>
                                
                                <a href="{{ route('maisons.index') ?? '#' }}"
                                   class="flex-1 sm:flex-initial bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    <span class="text-lg">❌</span>
                                    Annuler
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Card d'information -->
                <div class="mt-6 bg-blue-50 rounded-xl border border-blue-200 p-6">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <span class="text-blue-600 text-xl">💡</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-blue-800 mb-1">Conseils de saisie</h4>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Indiquez la surface en m² (exemple: 120 m²)</li>
                                <li>• Pour le numéro, incluez la rue si nécessaire</li>
                                <li>• Sélectionnez le quartier approprié dans la liste</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>