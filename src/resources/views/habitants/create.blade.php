<x-app-layout>
    <x-slot name="header">
        <div class="bg-white rounded-lg shadow-sm p-4">
            <h2 class="font-bold text-2xl text-gray-800 flex items-center gap-3">
                <span class="text-3xl">👤</span>
                Ajouter un Habitant
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
                                <span class="text-2xl">📝</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">Informations personnelles</h3>
                                <p class="text-blue-100 text-sm">Remplissez tous les champs requis</p>
                            </div>
                        </div>
                    </div>

                    <!-- Formulaire -->
                    <div class="p-8">
                        <form action="{{ route('habitants.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Groupe Nom/Prénom -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="nom" class="flex items-center gap-2 text-gray-700 font-medium">
                                        <span class="text-blue-600">👤</span>
                                        Nom
                                    </label>
                                    <input type="text" name="nom" id="nom"
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                                           placeholder="Entrez le nom"
                                           required>
                                </div>

                                <div class="space-y-2">
                                    <label for="prenom" class="flex items-center gap-2 text-gray-700 font-medium">
                                        <span class="text-blue-600">👤</span>
                                        Prénom
                                    </label>
                                    <input type="text" name="prenom" id="prenom"
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                                           placeholder="Entrez le prénom"
                                           required>
                                </div>
                            </div>

                            <!-- Téléphone -->
                            <div class="space-y-2">
                                <label for="telephone" class="flex items-center gap-2 text-gray-700 font-medium">
                                    <span class="text-green-600">📞</span>
                                    Téléphone
                                </label>
                                <input type="text" name="telephone" id="telephone"
                                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                                       placeholder="Ex: +221 77 123 45 67"
                                       required>
                            </div>

                            <!-- Maison -->
                            <div class="space-y-2">
                                <label for="id_maison" class="flex items-center gap-2 text-gray-700 font-medium">
                                    <span class="text-purple-600">🏠</span>
                                    Maison
                                </label>
                                <select name="id_maison" id="id_maison"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                                        required>
                                    <option value="">Sélectionnez une maison</option>
                                    @foreach($maisons as $maison)
                                        <option value="{{ $maison->id }}">{{ $maison->rue }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Groupe Date/Lieu de naissance -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="date_naiss" class="flex items-center gap-2 text-gray-700 font-medium">
                                        <span class="text-orange-600">📅</span>
                                        Date de naissance
                                    </label>
                                    <input type="date" name="date_naiss" id="date_naiss"
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                                           required>
                                </div>

                                <div class="space-y-2">
                                    <label for="lieu_naiss" class="flex items-center gap-2 text-gray-700 font-medium">
                                        <span class="text-red-600">📍</span>
                                        Lieu de naissance
                                    </label>
                                    <input type="text" name="lieu_naiss" id="lieu_naiss"
                                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                                           placeholder="Ex: Dakar, Sénégal"
                                           required>
                                </div>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-100">
                                <button type="submit"
                                        class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    <span class="text-lg">✅</span>
                                    Enregistrer l'habitant
                                </button>
                                
                                <a href="{{ route('habitants.index') ?? '#' }}"
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
                            <h4 class="font-semibold text-blue-800 mb-1">Information</h4>
                            <p class="text-blue-700 text-sm">
                                Tous les champs sont obligatoires. Assurez-vous que les informations saisies sont correctes 
                                avant de valider le formulaire.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>