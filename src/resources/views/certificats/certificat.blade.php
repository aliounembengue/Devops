<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Certificat de Domicile</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .title {
            font-size: 20px;
            font-weight: bold;
            text-decoration: underline;
        }
        .content {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <p><strong>{{ $delegue->nom }}</strong></p>
        <p>Délégué de quartier {{ $delegue->quartier }}</p>
        <p>{{ $delegue->adresse }}</p>
        <p>Tel. : {{ $delegue->telephone }}</p>
    </div>

    <div class="content">
        <p class="title">CERTIFICAT DE DOMICILE N° {{ $demande->id }}</p>

        <p>
            Je soussigné, <strong>{{ $delegue->nom }}</strong>, 
            Délégué de quartier de <strong>{{ $delegue->quartier }}</strong>, 
            certifie que nommé Mr/Mme/Mlle <strong>{{ $demande->nom_complet }}</strong>, 
            né(e) le <strong>{{ $demande->date_naissance }}</strong> à <strong>{{ $demande->lieu_naissance }}</strong>, 
            de nationalité <strong>{{ $demande->nationalite }}</strong>, réside dans mon quartier 
            depuis l’année <strong>{{ $demande->annee_residence }}</strong>, 
            chez <strong>{{ $demande->nom_proprio }}</strong>, maison N° <strong>{{ $demande->numero_maison }}</strong>.
        </p>

        <p>
            En foi de quoi, le présent certificat lui est délivré pour servir et valoir ce que de droit.
        </p>

        <br><br>
        <p>Fait à {{ $delegue->quartier }}, le {{ now()->format('d/m/Y') }}</p>
        <p><strong>{{ $delegue->nom }}</strong></p>
    </div>
</body>
</html>
