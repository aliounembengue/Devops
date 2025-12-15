@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Détails de la demande</h1>

    <p><strong>Nom de l'habitant :</strong> {{ $demande->habitants->nom }} {{ $demande->habitants->prenom }}</p>
    <p><strong>Quartier :</strong> {{ $demande->quartier->nom }}</p>
    <p><strong>Status :</strong> {{ $demande->status }}</p>
    <p><strong>Date de la demande :</strong> {{ $demande->created_at }}</p>

    <div class="mt-4">
        <form action="{{ route('delegue.demandes.accepter', $demande->id) }}" method="POST" style="display:inline;">
            @csrf
            <button class="bg-green-500 text-white px-4 py-2 rounded">Accepter</button>
        </form>
        <form action="{{ route('delegue.demandes.refuser', $demande->id) }}" method="POST" style="display:inline;">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded">Refuser</button>
        </form>
    </div>
</div>
@endsection
