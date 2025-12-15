@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier une commune</h1>

        <form action="{{ route('communes.update', $commune->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="NomCommune">Nom de la commune:</label>
                <input type="text" name="NomCommune" class="form-control" value="{{ $commune->NomCommune }}" required>
            </div>
            <!-- Ajoutez d'autres champs de formulaire si nécessaire -->

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
@endsection

