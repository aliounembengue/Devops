@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter une commune</h1>

        <form action="{{ route('communes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="NomCommune">Nom de la commune:</label>
                <input type="text" name="NomCommune" class="form-control" required>
            </div>
            <!-- Ajoutez d'autres champs de formulaire si nécessaire -->

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection

