<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Certificat de Domicile</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh; padding: 20px;
        }
        .container {
            max-width: 800px; margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px; box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            padding: 30px; text-align: center; position: relative;
        }
        .header h2 { color: white; font-size: 2.5rem; font-weight: 700; }
        .header p { color: rgba(255,255,255,0.9); margin-top: 10px; font-size: 1.1rem; }
        .form-container { padding: 40px; }
        .form-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px; margin-bottom: 30px;
        }
        .form-group label {
            display: block; font-weight: 600; color: #374151;
            margin-bottom: 8px; font-size: 0.95rem;
        }
        .form-group input, .form-group select {
            width: 100%; padding: 15px 20px;
            border: 2px solid #e5e7eb; border-radius: 12px;
            font-size: 1rem; background: white;
            color: #1f2937;
            transition: all 0.3s ease;
        }
        .form-group input:focus, .form-group select:focus {
            outline: none; border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
        .form-group select option { color: #1f2937; }
        .submit-btn {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white; padding: 18px 40px;
            border: none; border-radius: 50px;
            font-size: 1.1rem; font-weight: 600;
            cursor: pointer; transition: all 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Titre -->
        <div class="header">
            <h2>🏠 Certificat de Domicile</h2>
            <p>Nouvelle demande de certificat</p>
        </div>

        <!-- Formulaire -->
        <div class="form-container">
            <form action="{{ route('demandes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>👤 Nom complet</label>
                        <input type="text" name="nom_complet" placeholder="Entrez votre nom complet" required>
                    </div>
                    <div class="form-group">
                        <label>📅 Date de naissance</label>
                        <input type="date" name="date_naissance" required>
                    </div>
                    <div class="form-group">
                        <label>🌍 Lieu de naissance</label>
                        <input type="text" name="lieu_naissance" placeholder="Ville, Pays" required>
                    </div>
                    <div class="form-group">
                        <label>🇸🇳 Nationalité</label>
                        <input type="text" name="nationalite" placeholder="Ex: Sénégalaise" required>
                    </div>
                    <div class="form-group">
                        <label>📆 Année de résidence dans le quartier</label>
                        <input type="number" name="annee_residence" min="0" max="2025" placeholder="Ex: 2020" required>
                    </div>
                    <div class="form-group">
                        <label>🏡 Nom du propriétaire</label>
                        <input type="text" name="nom_proprietaire" placeholder="Nom du propriétaire" required>
                    </div>
                    <div class="form-group">
                        <label>🔢 Numéro de la maison</label>
                        <input type="text" name="numero_maison" placeholder="Ex: 123A" required>
                    </div>
                    <div class="form-group">
                        <label>🏘️ Quartier</label>
                        <select name="quartier_id" required>
                            <option value="">-- Choisir un quartier --</option>
                            @foreach($quartiers as $quartier)
                                <option value="{{ $quartier->id }}">{{ $quartier->nomQuartier }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Champ pièce justificative -->
                    <div class="form-group">
                        <label>📎 Pièce justificative (CNI, passeport, facture, etc.)</label>
                        <input type="file" name="piece_justificative" accept=".jpg,.jpeg,.png,.pdf">
                    </div>
                </div>

                <!-- Bouton -->
                <div class="text-center">
                    <button type="submit" class="submit-btn">
                        ✨ Envoyer la demande
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
