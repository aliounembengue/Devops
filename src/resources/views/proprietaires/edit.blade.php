<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            Modifier le Propriétaire
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <form action="{{ route('proprietaires.update', $proprietaire->id) }}" method="POST" class="mx-auto max-w-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nomPro" class="block text-gray-700">Nom :</label>
                <input type="text" name="nomPro" id="nomPro" value="{{ $proprietaire->nomPro }}" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="prenomPro" class="block text-gray-700">Prénom :</label>
                <input type="text" name="prenomPro" id="prenomPro" value="{{ $proprietaire->prenomPro }}" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="telephonePro" class="block text-gray-700">Téléphone :</label>
                <input type="text" name="telephonePro" id="telephonePro" value="{{ $proprietaire->telephonePro }}" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="dateNaissancePro" class="block text-gray-700">Date de Naissance :</label>
                <input type="date" name="dateNaissancePro" id="dateNaissancePro" value="{{ $proprietaire->dateNaissancePro }}" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="lieuNaissancePro" class="block text-gray-700">Lieu de Naissance :</label>
                <input type="text" name="lieuNaissancePro" id="lieuNaissancePro" value="{{ $proprietaire->lieuNaissancePro }}" class="form-input w-full" required>
            </div>
            <div class="mb-4">
                <label for="maison_id" class="block text-gray-700">Maison :</label>
                <select name="maison_id" id="maison_id" class="form-select w-full">
                    <option value="">-- Aucune --</option>
                    @foreach($maisons as $maison)
                        <option value="{{ $maison->id }}" {{ $proprietaire->maisons->contains($maison->id) ? 'selected' : '' }}>
                            {{ $maison->rue }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</x-app-layout>
