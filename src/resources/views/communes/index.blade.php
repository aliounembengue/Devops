@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Liste des communes</h1>

        <a href="{{ route('communes.create') }}" class="btn btn-primary">Ajouter une Commune</a>
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($communes as $commune)
                    <tr>
                        <td>{{ $commune->NomCommune }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('communes.edit', $commune->id) }}">Modifier</a>
                            <form action="{{ route('communes.destroy', $commune->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

       
    </div>
@endsection

