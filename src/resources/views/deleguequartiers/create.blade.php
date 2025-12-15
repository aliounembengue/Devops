<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Délégué de Quartier</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
        }

        /* Background Animation */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            animation: float 8s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 70%;
            right: 15%;
            animation-delay: 3s;
        }

        .floating-circle:nth-child(3) {
            width: 200px;
            height: 200px;
            bottom: 10%;
            left: 20%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(120deg); }
            66% { transform: translateY(10px) rotate(240deg); }
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Styles */
        .header-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .header-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            letter-spacing: -0.5px;
        }

        .header-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            font-weight: 300;
        }

        /* Form Container */
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #3b82f6, transparent);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            50% { left: 100%; }
            100% { left: 100%; }
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 28px;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .input-container {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .form-input {
            width: 100%;
            padding: 16px 16px 16px 50px;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            font-size: 1rem;
            font-weight: 400;
            background: #ffffff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            color: #374151;
        }

        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .form-input:focus + .input-icon,
        .form-input:not(:placeholder-shown) + .input-icon {
            color: #3b82f6;
            transform: translateY(-50%) scale(1.1);
        }

        .form-input:hover {
            border-color: #9ca3af;
        }

        /* Select Styling */
        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px 12px;
            padding-right: 40px;
        }

        .form-select option {
            padding: 10px;
            background: white;
            color: #374151;
        }

        /* Password Input with Toggle */
        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            cursor: pointer;
            font-size: 1.1rem;
            transition: color 0.3s ease;
            z-index: 2;
        }

        .password-toggle:hover {
            color: #3b82f6;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            border: none;
            padding: 18px 24px;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px -8px rgba(59, 130, 246, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .btn-icon {
            margin-right: 8px;
            font-size: 1rem;
        }

        /* Validation Styles */
        .form-input.error {
            border-color: #ef4444;
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .form-input.success {
            border-color: #10b981;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 6px;
            display: none;
        }

        /* Info Section */
        .info-section {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }

        .info-icon {
            color: #3b82f6;
            font-size: 1.2rem;
            margin-right: 12px;
        }

        .info-text {
            color: #1e40af;
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .form-container {
                padding: 25px;
                margin: 10px;
                border-radius: 20px;
            }
            
            .header-title {
                font-size: 2rem;
            }
            
            .form-input {
                padding: 14px 14px 14px 46px;
                font-size: 16px; /* Prevents zoom on iOS */
            }
        }

        /* Loading State */
        .loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .loading .submit-btn {
            background: #6b7280;
        }

        .spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="bg-animation">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>

    <div class="container">
        <div class="header-section">
            <h1 class="header-title">
                <i class="fas fa-user-tie"></i>
                Délégué de Quartier
            </h1>
            <p class="header-subtitle">Nomination d'un nouveau représentant local</p>
        </div>

        <div class="form-container">
            <div class="info-section">
                <i class="fas fa-info-circle info-icon"></i>
                <span class="info-text">
                    Sélectionnez un habitant du quartier pour le nommer délégué
                </span>
            </div>

            <form action="{{ route('deleguequartiers.store') }}" method="POST" id="delegueForm">
                @csrf
                
                <!-- Champ caché pour l'ID du quartier -->
                <input type="hidden" name="quartier_id" value="{{ $quartier->id }}">

                <!-- Sélection de l'habitant -->
                <div class="form-group">
                    <label for="id_habitant" class="form-label">
                        Habitant à nommer <span style="color: #ef4444;">*</span>
                    </label>
                    <div class="input-container">
                        <i class="fas fa-users input-icon"></i>
                        <select name="id_habitant" id="id_habitant" class="form-input form-select" required>
                            <option value="">Choisissez un habitant...</option>
                            @forelse($habitants as $habitant)
                                <option value="{{ $habitant->id }}">
                                    {{ $habitant->nom }} {{ $habitant->prenom }}
                                </option>
                            @empty
                                <option disabled>Aucun habitant dans ce quartier</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="error-message" id="habitant-error">Veuillez sélectionner un habitant</div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        Adresse email <span style="color: #ef4444;">*</span>
                    </label>
                    <div class="input-container">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               class="form-input" 
                               placeholder="exemple@email.com"
                               required>
                    </div>
                    <div class="error-message" id="email-error">Veuillez entrer une adresse email valide</div>
                </div>

                <!-- Mot de passe -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        Mot de passe <span style="color: #ef4444;">*</span>
                    </label>
                    <div class="input-container password-container">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="form-input" 
                               placeholder="Minimum 8 caractères"
                               required>
                        <i class="fas fa-eye password-toggle" id="passwordToggle"></i>
                    </div>
                    <div class="error-message" id="password-error">Le mot de passe doit contenir au moins 8 caractères</div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-user-plus btn-icon"></i>
                    Nommer le délégué
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('delegueForm');
            const inputs = document.querySelectorAll('.form-input');
            const submitBtn = document.getElementById('submitBtn');
            const passwordToggle = document.getElementById('passwordToggle');
            const passwordInput = document.getElementById('password');

            // Animation d'entrée
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach((group, index) => {
                group.style.opacity = '0';
                group.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    group.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                    group.style.opacity = '1';
                    group.style.transform = 'translateY(0)';
                }, index * 150);
            });

            // Toggle mot de passe
            passwordToggle.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            // Validation en temps réel
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });

                input.addEventListener('input', function() {
                    if (this.classList.contains('error')) {
                        validateField(this);
                    }
                });
            });

            function validateField(field) {
                const errorMessage = document.getElementById(field.id + '-error');
                let isValid = true;

                if (field.hasAttribute('required') && !field.value.trim()) {
                    isValid = false;
                } else if (field.type === 'email' && field.value && !isValidEmail(field.value)) {
                    isValid = false;
                } else if (field.type === 'password' && field.value && field.value.length < 8) {
                    isValid = false;
                }

                if (isValid) {
                    field.classList.remove('error');
                    field.classList.add('success');
                    errorMessage.style.display = 'none';
                } else {
                    field.classList.remove('success');
                    field.classList.add('error');
                    errorMessage.style.display = 'block';
                }

                return isValid;
            }

            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            // Soumission du formulaire
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                let isFormValid = true;
                inputs.forEach(input => {
                    if (!validateField(input)) {
                        isFormValid = false;
                    }
                });

                if (isFormValid) {
                    // Animation de chargement
                    document.body.classList.add('loading');
                    submitBtn.innerHTML = '<div class="spinner"></div> Traitement...';
                    
                    // Simuler un délai puis soumettre
                    setTimeout(() => {
                        form.submit();
                    }, 1000);
                } else {
                    // Faire défiler vers le premier champ avec erreur
                    const firstError = document.querySelector('.form-input.error');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                }
            });

            // Auto-génération d'email basé sur le nom
            const habitantSelect = document.getElementById('id_habitant');
            const emailInput = document.getElementById('email');

            habitantSelect.addEventListener('change', function() {
                if (this.value && !emailInput.value) {
                    const selectedText = this.options[this.selectedIndex].text;
                    const [nom, prenom] = selectedText.split(' ');
                    const emailSuggestion = `${prenom.toLowerCase()}.${nom.toLowerCase()}@quartier.local`;
                    emailInput.value = emailSuggestion;
                    validateField(emailInput);
                }
            });
        });
    </script>
</body>
</html>