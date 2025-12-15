<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Habitant</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Effet de formes géométriques animées */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.08) 2px, transparent 2px),
                radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.06) 1px, transparent 1px),
                radial-gradient(circle at 60% 10%, rgba(255, 255, 255, 0.04) 3px, transparent 3px),
                radial-gradient(circle at 30% 80%, rgba(255, 255, 255, 0.05) 2px, transparent 2px);
            background-size: 100px 100px, 150px 150px, 200px 200px, 120px 120px;
            animation: floatingShapes 25s ease-in-out infinite alternate;
            pointer-events: none;
            z-index: -1;
        }

        @keyframes floatingShapes {
            0% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(-20px, -30px) rotate(120deg); }
            66% { transform: translate(20px, -10px) rotate(240deg); }
            100% { transform: translate(0, -20px) rotate(360deg); }
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 32px 0;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header h2 {
            font-size: 2.25rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ffffff, #e0e7ff, #c7d2fe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 20px rgba(255, 255, 255, 0.3);
            position: relative;
        }

        .header h2::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            border-radius: 2px;
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.4);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 120px);
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 32px;
            padding: 50px;
            max-width: 600px;
            width: 100%;
            box-shadow: 
                0 32px 64px rgba(0, 0, 0, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(
                from 0deg,
                transparent,
                rgba(102, 126, 234, 0.05),
                transparent,
                rgba(246, 147, 251, 0.05),
                transparent
            );
            animation: rotate 20s linear infinite;
            pointer-events: none;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .form-content {
            position: relative;
            z-index: 2;
        }

        .form-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title h3 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .form-title p {
            color: #64748b;
            font-size: 16px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 32px;
            position: relative;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 32px;
        }

        .form-row .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        label {
            display: block;
            font-weight: 700;
            font-size: 15px;
            color: #374151;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 18px 24px;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 500;
            color: #1f2937;
            background: #f9fafb;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        input[type="text"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 
                0 0 0 4px rgba(102, 126, 234, 0.1),
                0 8px 25px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        select {
            cursor: pointer;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>');
            background-repeat: no-repeat;
            background-position: right 20px center;
            background-size: 20px;
            padding-right: 50px;
        }

        /* Icônes pour les champs */
        .form-group::before {
            content: '';
            position: absolute;
            right: 20px;
            top: 50px;
            width: 20px;
            height: 20px;
            background-size: contain;
            opacity: 0.4;
            z-index: 1;
            pointer-events: none;
        }

        .form-group:has(input[name="nom"])::before,
        .form-group:has(input[name="prenom"])::before {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>');
        }

        .form-group:has(input[name="telephone"])::before {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>');
        }

        .form-group:has(select[name="id_maison"])::before {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>');
        }

        button[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #d97706 100%);
            color: white;
            padding: 20px 24px;
            border: none;
            border-radius: 18px;
            font-size: 18px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            margin-top: 20px;
            box-shadow: 
                0 12px 30px rgba(251, 191, 36, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        button[type="submit"]::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        button[type="submit"]:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 
                0 20px 45px rgba(251, 191, 36, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }

        button[type="submit"]:hover::before {
            left: 100%;
        }

        button[type="submit"]:active {
            transform: translateY(-1px) scale(1.01);
        }

        /* Animation des champs */
        .form-group {
            animation: slideInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        button { animation: slideInUp 0.6s ease-out 0.6s both; }

        /* Responsive */
        @media (max-width: 768px) {
            .header h2 {
                font-size: 1.75rem;
            }
            
            .container {
                padding: 40px 15px;
            }
            
            .form-container {
                padding: 40px 30px;
                border-radius: 24px;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .form-row .form-group {
                margin-bottom: 32px;
            }

            input[type="text"],
            select {
                padding: 16px 20px;
                font-size: 16px;
            }

            button[type="submit"] {
                padding: 18px 24px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 10px;
            }
            
            .form-container {
                padding: 35px 25px;
                border-radius: 20px;
            }

            .header {
                padding: 24px 0;
            }

            .header h2 {
                font-size: 1.5rem;
            }

            .form-title h3 {
                font-size: 1.5rem;
            }
        }

        /* États d'erreur */
        .error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1) !important;
        }

        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: 8px;
            font-weight: 600;
        }

        /* États de succès */
        .success {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1) !important;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <div class="header">
                <h2>Modifier un Habitant</h2>
            </div>
        </x-slot>

        <div class="container">
            <div class="form-container">
                <div class="form-content">
                    <div class="form-title">
                        <h3>Modifier les informations</h3>
                        <p>Mettez à jour les données de l'habitant</p>
                    </div>

                    <form action="{{ route('habitants.update', $habitant->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" id="nom"
                                        value="{{ $habitant->nom }}" required>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom :</label>
                                <input type="text" name="prenom" id="prenom"
                                        value="{{ $habitant->prenom }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telephone">Téléphone :</label>
                            <input type="text" name="telephone" id="telephone"
                                    value="{{ $habitant->telephone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="id_maison">Maison :</label>
                            <select name="id_maison" id="id_maison" required>
                                @foreach($maisons as $maison)
                                    <option value="{{ $maison->id }}" {{ $habitant->id_maison == $maison->id ? 'selected' : '' }}>
                                        {{ $maison->rue }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>