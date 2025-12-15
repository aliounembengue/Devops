<!-- resources/views/deleguequartiers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier un Délégué de Quartier</h1>

    <form action="{{ route('deleguequartiers.update', $deleguequartier->id) }}" method="POST" class="mx-auto">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_habitant">Habitant:</label>
            <select name="id_habitant" class="form-control" required>
                @foreach($habitants as $habitant)
                    <option value="{{ $habitant->id }}" {{ $deleguequartier->id_habitant == $habitant->id ? 'selected' : '' }}>
                        {{ $habitant->nom }} {{ $habitant->prenom }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- Ajoutez d'autres champs si nécessaire -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
