<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Habitant</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            color: #1a202c;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        /* Bouton Retour */
        .back-button {
            background: white;
            color: #64748b;
            padding: 0.75rem 1.25rem;
            border: none;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .back-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            color: #3b82f6;
        }

        /* Carte de connexion */
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .login-header {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 2.5rem 2rem 2rem;
            text-align: center;
        }

        .login-header h2 { font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem; }
        .login-header p { font-size: 0.9rem; color: rgba(255,255,255,0.9); }

        .header-icon {
            width: 60px; height: 60px;
            background: rgba(255,255,255,0.2);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }

        .login-body { padding: 2rem; }

        .error-messages {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            display: none;
        }

        .form-group { margin-bottom: 1.5rem; }
        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            background: #f8fafc;
        }
        .form-input:focus {
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
            outline: none;
        }

        .login-button {
            width: 100%;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(59,130,246,0.3);
            display: flex; align-items: center; justify-content: center;
            gap: 0.5rem;
        }
        .login-button:hover { transform: translateY(-2px); }

        .login-footer {
            background: #f8fafc;
            padding: 1.5rem 2rem;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 0.8rem;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Bouton Retour au-dessus -->
        <a href="/" class="back-button">
            <i class="fas fa-arrow-left"></i> Retour à l'accueil
        </a>

        <!-- Carte -->
        <div class="login-card">
            <div class="login-header">
                <div class="header-icon">
                    <i class="fas fa-user"></i>
                </div>
                <h2>Connexion Habitant</h2>
                <p>Accédez à votre espace personnel</p>
            </div>

            <div class="login-body">
                <div class="error-messages" id="error-container">
                    <ul id="error-list"></ul>
                </div>

                <form action="{{ route('habitant.login.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="Votre adresse email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-input" placeholder="Votre mot de passe" required>
                    </div>
                    <button type="submit" class="login-button">
                        <i class="fas fa-sign-in-alt"></i> Se connecter
                    </button>
                </form>
            </div>

            <div class="login-footer">
                <p>© 2025 CertificatDomicile - Espace Habitants</p>
            </div>
        </div>
    </div>
</body>
</html>
