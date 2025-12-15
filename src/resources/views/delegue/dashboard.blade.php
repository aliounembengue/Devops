<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Délégué de quartier</title>
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
        .logout-btn:hover { background: #e0e7ff; }

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

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.2s ease;
        }
        .stat-card h4 { font-weight: 600; font-size: 0.9rem; margin-bottom: 0.75rem; }
        .stat-number { font-size: 3rem; font-weight: 800; margin-top: 0.5rem; }
        .stat-card.blue { background: linear-gradient(135deg, #dbeafe, #bfdbfe); border-color: #93c5fd; }
        .stat-card.green { background: linear-gradient(135deg, #dcfce7, #bbf7d0); border-color: #86efac; }
        .stat-card.blue h4 { color: #1e40af; } .stat-card.green h4 { color: #166534; }
        .stat-card.blue .stat-number { color: #1e3a8a; } .stat-card.green .stat-number { color: #14532d; }

        /* Lists */
        .list-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .list-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem;
        }
        .list-item.empty { text-align: center; color: #64748b; font-style: italic; padding: 2rem; }

        /* Habitant Cards */
        .habitant-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }
        .habitant-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.25rem;
        }
        .habitant-name { font-weight: 600; color: #374151; margin-bottom: 0.5rem; }
        .habitant-info { font-size: 0.875rem; color: #64748b; margin-bottom: 0.25rem; display: flex; gap: 0.5rem; }

        /* Table Styles */
        .table-container { overflow-x: auto; border-radius: 12px; border: 1px solid #e2e8f0; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th { background: #f1f5f9; padding: 1rem; text-align: left; }
        td { padding: 1rem; border-bottom: 1px solid #f1f5f9; }

        /* Status Badges */
        .status-badge { padding: 0.375rem 0.75rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; }
        .status-badge.en_attente { background: #fef3c7; color: #92400e; }
        .status-badge.valide { background: #d1fae5; color: #065f46; }
        .status-badge.rejete { background: #fee2e2; color: #991b1b; }

        /* Buttons */
        .btn { padding: 0.5rem 1rem; border: none; border-radius: 8px; font-size: 0.875rem; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 0.25rem; }
        .btn-success { background: #10b981; color: white; }
        .btn-danger { background: #ef4444; color: white; }
        .download-link { color: #2563eb; font-weight: 600; text-decoration: none; }
        .download-link:hover { text-decoration: underline; }
        .generating-text { font-size: 0.85rem; color: #64748b; font-style: italic; }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <h2><i class="fas fa-tachometer-alt"></i> Dashboard - Délégué de quartier</h2>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Se déconnecter</button>
            </form>
        </div>
    </div>

    <!-- Container -->
    <div class="container">
        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card blue">
                <h4><i class="fas fa-home"></i> Maisons</h4>
                <div class="stat-number">{{ $maisonsCount }}</div>
            </div>
            <div class="stat-card green">
                <h4><i class="fas fa-users"></i> Habitants</h4>
                <div class="stat-number">{{ $habitantsCount }}</div>
            </div>
        </div>

        <!-- Bloc des demandes de certificats -->
        <div class="card">
            <h3 class="card-title"><i class="fas fa-file-alt"></i> Demandes de certificats</h3>
            @if($demandes->isEmpty())
                <div class="list-item empty"><i class="fas fa-info-circle"></i> Aucune demande pour ce quartier</div>
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
                                <th>Actions</th>
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
                                                <i class="fas fa-file-pdf"></i> Voir
                                            </a>
                                        @else
                                            <span style="color:#64748b;">Non fournie</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $demande->status }}">
                                            {{ ucfirst($demande->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('delegue.certificat.valider', $demande->id) }}" style="display:inline;">
                                            @csrf
                                            <button class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
                                        </form>
                                        <form method="POST" action="{{ route('delegue.certificat.rejeter', $demande->id) }}" style="display:inline;">
                                            @csrf
                                            <button class="btn btn-danger"><i class="fas fa-times"></i> Rejeter</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Lists Container -->
        <div class="list-container">
            <!-- Maisons -->
            <div class="card">
                <h3 class="card-title"><i class="fas fa-home"></i> Liste des maisons</h3>
                @if($maisons->isEmpty())
                    <div class="list-item empty"><i class="fas fa-info-circle"></i> Aucune maison enregistrée</div>
                @else
                    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                        @foreach($maisons as $maison)
                            <div class="list-item">
                                <div style="font-weight: 600; color: #374151;"><i class="fas fa-map-marker-alt"></i> {{ $maison->rue ?? 'Rue non définie' }}</div>
                                <div style="font-size: 0.875rem; color: #64748b;">Surface: {{ $maison->surface ?? 'Non précisée' }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Habitants -->
            <div class="card">
                <h3 class="card-title"><i class="fas fa-user-friends"></i> Liste des habitants</h3>
                @if($habitants->isEmpty())
                    <div class="list-item empty"><i class="fas fa-info-circle"></i> Aucun habitant enregistré</div>
                @else
                    <div class="habitant-grid">
                        @foreach($habitants as $habitant)
                            <div class="habitant-card">
                                <div class="habitant-name">{{ $habitant->nom }} {{ $habitant->prenom }}</div>
                                <div class="habitant-info"><i class="fas fa-phone"></i> {{ $habitant->telephone ?? 'Non renseigné' }}</div>
                                <div class="habitant-info"><i class="fas fa-home"></i> Maison ID: {{ $habitant->id_maison }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
