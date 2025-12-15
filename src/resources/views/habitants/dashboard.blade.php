<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Habitant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            color: #1a202c;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
            margin-bottom: 2rem;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logout-btn {
            background: white;
            color: #1e40af;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .logout-btn:hover {
            background: #e0e7ff;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Table */
        .table-container { overflow-x: auto; border-radius: 12px; border: 1px solid #e2e8f0; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th { background: #f1f5f9; padding: 1rem; text-align: left; }
        td { padding: 1rem; border-bottom: 1px solid #f1f5f9; }

        /* Status Badges */
        .status-badge { padding: 0.375rem 0.75rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
        .status-badge.en_attente { background: #fef3c7; color: #92400e; }
        .status-badge.valide { background: #d1fae5; color: #065f46; }
        .status-badge.rejete { background: #fee2e2; color: #991b1b; }

        .download-link { color: #2563eb; font-weight: 600; text-decoration: none; }
        .download-link:hover { text-decoration: underline; }
        .generating-text { font-size: 0.85rem; color: #64748b; font-style: italic; }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <h2><i class="fas fa-user"></i> Espace personnel Habitant</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Se déconnecter</button>
            </form>
        </div>
    </div>

    <!-- Container -->
    <div class="container">
        <!-- Bloc des demandes de certificats -->
        <div class="card">
            <h3 class="card-title"><i class="fas fa-file-alt"></i> Mes demandes de certificats</h3>
            @if($demandes->isEmpty())
                <div class="list-item empty"><i class="fas fa-info-circle"></i> Vous n'avez encore soumis aucune demande.</div>
            @else
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom complet</th>
                                <th>Date de naissance</th>
                                <th>Lieu de naissance</th>
                                <th>Nationalité</th>
                                <th>Année de résidence</th>
                                <th>Pièce jointe</th>
                                <th>Statut</th>
                                <th>Certificat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demandes as $demande)
                                <tr>
                                    <td>{{ $demande->nom_complet }}</td>
                                    <td>{{ $demande->date_naissance }}</td>
                                    <td>{{ $demande->lieu_naissance }}</td>
                                    <td>{{ $demande->nationalite }}</td>
                                    <td>{{ $demande->annee_residence }}</td>
                                    <td>
                                        @if($demande->piece_justificative)
                                            <a href="{{ asset('storage/'.$demande->piece_justificative) }}" target="_blank" class="download-link">
                                                Voir la pièce
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $demande->status }}">
                                            {{ ucfirst($demande->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($demande->status == 'valide')
                                            @if(!empty($demande->certificat_path) && file_exists(storage_path('app/public/'.$demande->certificat_path)))
                                                <a href="{{ asset('storage/'.$demande->certificat_path) }}" target="_blank" class="download-link">
                                                    Télécharger
                                                </a>
                                            @else
                                                <span class="generating-text">En cours de génération...</span>
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Bloc nouvelle demande -->
        <div class="card">
            <h3 class="card-title"><i class="fas fa-plus-circle"></i> Nouvelle demande</h3>
            <p>Commencez une nouvelle demande de certificat de domicile en quelques clics.</p>
            <a href="{{ route('demandes.create') }}" class="logout-btn"><i class="fas fa-pen"></i> Faire une demande</a>
        </div>
    </div>
</body>
</html>
