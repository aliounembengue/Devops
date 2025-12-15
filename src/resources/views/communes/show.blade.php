@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de la commune</h1>

        <dl class="row">
            <dt class="col-sm-3">Nom de la commune:</dt>
            <dd class="col-sm-9">{{ $commune->NomCommune }}</dd>
            <!-- Ajoutez d'autres champs si nécessaire -->
        </dl>

        <a href="{{ route('communes.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
@endsection
