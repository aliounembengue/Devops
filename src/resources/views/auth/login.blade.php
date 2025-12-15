<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CertificatDomicile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
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
            position: relative;
        }

        /* Bouton Retour */
        .back-button {
            position: absolute;
            top: -80px;
            left: 0;
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

        /* Header */
        .login-header {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 2.5rem 2rem 2rem;
            text-align: center;
            position: relative;
        }

        .login-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }

        /* Corps du formulaire */
        .login-body {
            padding: 2rem;
        }

        /* Messages d'erreur */
        .error-messages {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .error-messages ul {
            list-style: none;
            margin: 0;
        }

        .error-messages li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.25rem;
        }

        .error-messages li:last-child {
            margin-bottom: 0;
        }

        /* Champs de formulaire */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 0.875rem;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            color: #1f2937;
            background: #f8fafc;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-input:hover {
            border-color: #cbd5e1;
        }

        /* Options supplémentaires */
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .remember-checkbox {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            color: #64748b;
        }

        .remember-checkbox input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            accent-color: #3b82f6;
        }

        .forgot-link {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .forgot-link:hover {
            color: #1e40af;
            text-decoration: underline;
        }

        /* Bouton de connexion */
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
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* Footer */
        .login-footer {
            background: #f8fafc;
            padding: 1.5rem 2rem;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 0.8rem;
            color: #64748b;
        }

        .home-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
            padding: 0.75rem 1.25rem;
            background: #3b82f6;
            color: white;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .home-button:hover {
            background: #1e40af;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                margin: 1rem 0;
            }

            .back-button {
                top: -60px;
                padding: 0.625rem 1rem;
                font-size: 0.85rem;
            }

            .login-header {
                padding: 2rem 1.5rem 1.5rem;
            }

            .login-header h2 {
                font-size: 1.5rem;
            }

            .login-body {
                padding: 1.5rem;
            }

            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }

        /* Animation d'entrée */
        .login-card {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Bouton Retour -->
        <a href="/" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Retour à l'accueil
        </a>

        <!-- Carte de connexion -->
        <div class="login-card">
            <!-- Header -->
            <div class="login-header">
                <div class="header-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h2>Connexion</h2>
                <p>Accédez à votre espace d'administration</p>
            </div>

            <!-- Corps du formulaire -->
            <div class="login-body">
                <!-- Messages d'erreur -->
                <div class="error-messages" style="display: none;" id="error-container">
                    <ul id="error-list"></ul>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Champ Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">Adresse email</label>
                        <input id="email" 
                               name="email" 
                               type="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus
                               class="form-input"
                               placeholder="admin@exemple.com">
                    </div>

                    <!-- Champ Mot de passe -->
                    <div class="form-group">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input id="password" 
                               name="password" 
                               type="password" 
                               required
                               class="form-input"
                               placeholder="••••••••••">
                    </div>

                    <!-- Options supplémentaires -->
                    <div class="form-options">
                        <label class="remember-checkbox">
                            <input type="checkbox" name="remember">
                            <span>Se souvenir de moi</span>
                        </label>
                        <a href="#" class="forgot-link">Mot de passe oublié ?</a>
                    </div>

                    <!-- Bouton de connexion -->
                    <button type="submit" class="login-button">
                        <i class="fas fa-sign-in-alt"></i>
                        Se connecter
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                <p>© 2025 CertificatDomicile - Plateforme sécurisée</p>
                <a href="/" class="home-button">
                    <i class="fas fa-home"></i>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            if (!email || !password) {
                e.preventDefault();
                showErrors(['Veuillez remplir tous les champs']);
                return;
            }
            
            if (!isValidEmail(email)) {
                e.preventDefault();
                showErrors(['Veuillez entrer une adresse email valide']);
                return;
            }
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Connexion...';
            submitBtn.disabled = true;
        });

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function showErrors(errors) {
            const errorContainer = document.getElementById('error-container');
            const errorList = document.getElementById('error-list');
            
            errorList.innerHTML = '';
            errors.forEach(error => {
                const li = document.createElement('li');
                li.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${error}`;
                errorList.appendChild(li);
            });
            
            errorContainer.style.display = 'block';
            errorContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    </script>
</body>
</html>
