<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Certificat de Domicile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
        }

        /* Variables CSS pour cohérence */
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --text-dark: #2d3748;
            --text-light: #718096;
            --white: #ffffff;
            --shadow-light: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-large: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .full-page {
            height: 100vh;
            width: 100vw;
            display: flex;
            position: relative;
            overflow: hidden;
        }

        /* Navbar moderne */
        nav.navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            backdrop-filter: blur(10px);
            border: none;
            box-shadow: var(--shadow-medium);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            background: linear-gradient(45deg, #ffffff, #f8f9ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Image de fond avec overlay */
        .left-side {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .left-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                135deg, 
                rgba(102, 126, 234, 0.8) 0%, 
                rgba(118, 75, 162, 0.6) 50%,
                rgba(240, 147, 251, 0.4) 100%
            );
            z-index: 2;
        }

        .left-side img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
            filter: brightness(1.1) contrast(1.1);
        }

        /* Contenu décoratif sur l'image */
        .left-content {
            position: absolute;
            bottom: 10%;
            left: 10%;
            z-index: 3;
            color: white;
            max-width: 500px;
        }

        .left-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #ffffff, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 4px 8px rgba(0,0,0,0.3);
            line-height: 1.1;
        }

        .left-content p {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 300;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 2rem;
        }

        .features-list {
            list-style: none;
            padding: 0;
        }

        .features-list li {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .features-list li i {
            margin-right: 1rem;
            color: var(--accent-color);
            font-size: 1.2rem;
        }

        /* Panel de droite */
        .right-side {
            position: relative;
            z-index: 2;
            width: 45%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 3rem 2rem;
            min-height: 100vh;
            padding-top: calc(3rem + 76px); /* Compensation navbar */
        }

        .auth-card {
            width: 100%;
            max-width: 450px;
            background: var(--white);
            border-radius: 24px;
            box-shadow: var(--shadow-large);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            position: relative;
            animation: slideInUp 0.8s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        .card-body {
            padding: 3rem 2.5rem;
            text-align: center;
        }

        .card-title {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-dark);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-subtitle {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 2.5rem;
            font-weight: 400;
        }

        /* Sections de connexion */
        .auth-section {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(102, 126, 234, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .auth-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.03), rgba(240, 147, 251, 0.03));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .auth-section:hover::before {
            opacity: 1;
        }

        .auth-section:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-medium);
            border-color: rgba(102, 126, 234, 0.2);
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            margin-right: 0.5rem;
        }

        .habitant-icon {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
        }

        .admin-icon {
            background: linear-gradient(135deg, #1f2937, #374151);
            color: white;
        }

        /* Boutons stylisés */
        .btn-modern {
            padding: 0.875rem 2rem;
            font-weight: 600;
            border-radius: 12px;
            border: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: none;
            letter-spacing: 0.025em;
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: var(--shadow-light);
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
            background: linear-gradient(135deg, #5a6fd8, #6b46a3);
        }

        .btn-outline-modern {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-outline-modern:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-light);
        }

        .btn-dark-modern {
            background: linear-gradient(135deg, #1f2937, #374151);
            color: white;
            box-shadow: var(--shadow-light);
        }

        .btn-dark-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
            background: linear-gradient(135deg, #111827, #1f2937);
        }

        /* Divider stylisé */
        .custom-divider {
            position: relative;
            margin: 2rem 0;
            text-align: center;
        }

        .custom-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
            opacity: 0.3;
        }

        .custom-divider span {
            background: white;
            padding: 0 1rem;
            color: var(--text-light);
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Footer moderne */
        footer {
            background: linear-gradient(135deg, #1f2937, #111827);
            color: rgba(255, 255, 255, 0.8);
            padding: 2rem 0;
            text-align: center;
            font-size: 0.95rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 0;
        }

        /* Animations flottantes */
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .circle1 {
            width: 80px;
            height: 80px;
            top: 20%;
            right: 15%;
            animation-delay: 0s;
        }

        .circle2 {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 5%;
            animation-delay: 2s;
        }

        .circle3 {
            width: 60px;
            height: 60px;
            top: 40%;
            right: 25%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-20px) rotate(120deg);
            }
            66% {
                transform: translateY(10px) rotate(240deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .full-page {
                flex-direction: column;
                height: auto;
            }

            .left-side {
                height: 40vh;
                order: 1;
            }

            .left-content {
                position: static;
                padding: 2rem;
                text-align: center;
            }

            .left-content h1 {
                font-size: 2.5rem;
            }

            .right-side {
                width: 100%;
                min-height: 60vh;
                order: 2;
                padding-top: 2rem;
            }

            .auth-card {
                margin: 1rem;
                max-width: none;
            }

            .card-body {
                padding: 2rem 1.5rem;
            }

            .card-title {
                font-size: 2rem;
            }

            nav.navbar {
                position: relative;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">
                <i class="fas fa-certificate me-2"></i>CertificatDomicile
            </a>
        </div>
    </nav>

    <!-- Section principale -->
    <div class="full-page">
        <!-- Image de fond avec contenu -->
        <div class="left-side">
            <img src="{{ asset('images/p1.png') }}" alt="Image Certificat">
            
            <!-- Éléments flottants décoratifs -->
            <div class="floating-elements">
                <div class="floating-circle circle1"></div>
                <div class="floating-circle circle2"></div>
                <div class="floating-circle circle3"></div>
            </div>
            
            <!-- Contenu informatif -->
            <div class="left-content">
                <h1>Certificats en ligne</h1>
                <p>Simplifiez vos démarches administratives avec notre plateforme moderne et sécurisée.</p>
                
                <ul class="features-list">
                    <li><i class="fas fa-check-circle"></i> Démarches 100% numériques</li>
                    <li><i class="fas fa-shield-alt"></i> Sécurité et confidentialité</li>
                    <li><i class="fas fa-clock"></i> Traitement rapide des demandes</li>
                    <li><i class="fas fa-mobile-alt"></i> Accessible partout</li>
                </ul>
            </div>
        </div>

        <!-- Panel de connexion -->
        <div class="right-side">
            <div class="auth-card">
                <div class="card-body">
                    <h2 class="card-title">Bienvenue</h2>
                    <p class="card-subtitle">Choisissez votre espace pour continuer</p>

                    <!-- Espace Habitant -->
                    <div class="auth-section">
                        <h5 class="section-title">
                            <div class="section-icon habitant-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            Espace Habitant
                        </h5>
                        <p class="text-muted mb-3">Demandez vos certificats en ligne</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('habitant.login') }}" class="btn btn-modern btn-primary-modern">
                                <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                            </a>
                            <a href="{{ route('habitant.register') }}" class="btn btn-modern btn-outline-modern">
                                <i class="fas fa-user-plus me-2"></i>Créer un compte
                            </a>
                        </div>
                    </div>

                    <div class="custom-divider">
                        <span>ou</span>
                    </div>

                    <!-- Espace Admin / Délégué -->
                    <div class="auth-section">
                        <h5 class="section-title">
                            <div class="section-icon admin-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            Espace Administration
                        </h5>
                        <p class="text-muted mb-3">Accès réservé aux administrateurs et délégués</p>
                        <div class="d-grid">
                            <a href="{{ route('login') }}" class="btn btn-modern btn-dark-modern">
                                <i class="fas fa-key me-2"></i>Accès sécurisé
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="mb-0">
                        <i class="fas fa-copyright me-2"></i>
                        {{ date('Y') }} CertificatDomicile. Plateforme sécurisée pour vos démarches administratives.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>