<!-- resources/views/quartiers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Modifier le Quartier</h2>

        <form action="{{ route('quartiers.update', $quartier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nomQuartier">Nom du Quartier:</label>
                <input type="text" name="nomQuartier" class="form-control" value="{{ $quartier->nomQuartier }}" required>
            </div>
            <div class="form-group">
                <label for="idCommune">Commune:</label>
                <select name="idCommune" class="form-control" required>
                    @foreach($communes as $commune)
                        <option value="{{ $commune->id }}" {{ $commune->id == $quartier->idCommune ? 'selected' : '' }}>{{ $commune->NomCommune }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
@endsection
