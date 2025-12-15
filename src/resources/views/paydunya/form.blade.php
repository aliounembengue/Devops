<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Paiement PayDunya
        </h2>
    </x-slot>

    <div class="container mx-auto py-6 max-w-md">
        @if(session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('paydunya.pay') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label for="amount" class="block text-gray-700 font-medium mb-2">Montant (XOF)</label>
                <input type="number" name="amount" id="amount" class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                Payer maintenant
            </button>
        </form>
    </div>
</x-app-layout>
