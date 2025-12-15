<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 leading-tight">Paiement Réussi</h2>
    </x-slot>

    <div class="container mx-auto py-6 text-center">
        <h3 class="text-lg font-semibold mb-2">Merci !</h3>
        <p class="text-gray-700">Votre paiement a été effectué avec succès.</p>
        <pre class="mt-4">{{ print_r($data, true) }}</pre>
    </div>
</x-app-layout>
