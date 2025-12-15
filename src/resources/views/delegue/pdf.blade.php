<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Certificat de domicile</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; line-height: 1.5; }
        h1 { text-align: center; text-transform: uppercase; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 0 50px; }
        .signature { margin-top: 50px; text-align: right; }
        .info { margin-left: 20px; }
        .underline { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="header">
        <p>
            {{ strtoupper($delegue->name) }} <br>
            Délégué de quartier <br>
            Villa N° {{ $delegue->villa ?? '' }} - Dakar <br>
            Tel. : {{ $delegue->telephone ?? '+221 ...' }}
        </p>

        <h1>Certificat de domicile</h1>
        <p>N°: {{ $demande->id }}</p>
    </div>

    <div class="content">
        <p>Je soussigné, <strong>{{ $delegue->name }}</strong>, Délégué de quartier, certifie que :</p>

        <p class="info">
            Nom et prénom : <span class="underline">{{ $demande->nom_complet }}</span> <br>
            Né(e) le : <span class="underline">{{ $demande->date_naissance }}</span> <br>
            Lieu de naissance : <span class="underline">{{ $demande->lieu_naissance }}</span> <br>
            Nationalité : <span class="underline">{{ $demande->nationalite }}</span> <br>
            Réside dans mon quartier depuis : <span class="underline">{{ $demande->annee_residence }}</span> <br>
          
        </p>

        <p>
            Le présent certificat est délivré pour servir et valoir ce que de droit.
        </p>

        <div class="signature">
            <p>Fait à Dakar, le {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
            <p><strong>{{ $delegue->name }}</strong></p>
            <p>Délégué de quartier</p>
        </div>
    </div>
</body>
</html>
