<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Certificat de Domicile</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
            color: white;
        }

        .form-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .form-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        .form-grid.single {
            grid-template-columns: 1fr;
        }

        .input-group {
            position: relative;
        }

        .input-group label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 1.1rem;
            z-index: 1;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #ffffff;
            outline: none;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .input-group input:hover,
        .input-group select:hover {
            border-color: #9ca3af;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 18px 30px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .form-footer {
            text-align: center;
            margin-top: 30px;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .progress-bar {
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
            margin-bottom: 30px;
            opacity: 0.3;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .form-container {
                padding: 25px;
                margin: 10px;
            }
            
            .form-header h2 {
                font-size: 2rem;
            }
            
            .container {
                padding: 20px 10px;
            }
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .input-group input::placeholder,
        .input-group select::placeholder {
            color: #9ca3af;
        }

        .required-asterisk {
            color: #ef4444;
            margin-left: 3px;
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <div class="form-header">
            <h2><i class="fas fa-home"></i> Certificat de Domicile</h2>
            <p>Veuillez remplir tous les champs pour votre demande</p>
        </div>

        <div class="form-container">
            <div class="progress-bar"></div>
            
            <form action="{{ route('certificat.store') }}" method="POST">
                @csrf
                
                <div class="form-grid">
                    <div class="input-group">
                        <label for="nom_complet">
                            Nom complet <span class="required-asterisk">*</span>
                        </label>
                        <i class="fas fa-user"></i>
                        <input type="text" 
                               id="nom_complet" 
                               name="nom_complet" 
                               placeholder="Entrez votre nom complet"
                               required>
                    </div>

                    <div class="input-group">
                        <label for="date_naissance">
                            Date de naissance <span class="required-asterisk">*</span>
                        </label>
                        <i class="fas fa-calendar-alt"></i>
                        <input type="date" 
                               id="date_naissance" 
                               name="date_naissance" 
                               required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="lieu_naissance">
                            Lieu de naissance <span class="required-asterisk">*</span>
                        </label>
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" 
                               id="lieu_naissance" 
                               name="lieu_naissance" 
                               placeholder="Ville de naissance"
                               required>
                    </div>

                    <div class="input-group">
                        <label for="nationalite">
                            Nationalité <span class="required-asterisk">*</span>
                        </label>
                        <i class="fas fa-flag"></i>
                        <input type="text" 
                               id="nationalite" 
                               name="nationalite" 
                               placeholder="Votre nationalité"
                               required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="annee_residence">
                            Année de résidence dans le quartier <span class="required-asterisk">*</span>
                        </label>
                        <i class="fas fa-clock"></i>
                        <input type="number" 
                               id="annee_residence" 
                               name="annee_residence" 
                               placeholder="Ex: 2020"
                               min="1900"
                               max="2024"
                               required>
                    </div>

                    <div class="input-group">
                        <label for="nom_proprietaire">
                            Nom du propriétaire <span class="required-asterisk">*</span>
                        </label>
                        <i class="fas fa-user-tie"></i>
                        <input type="text" 
                               id="nom_proprietaire" 
                               name="nom_proprietaire" 
                               placeholder="Nom du propriétaire"
                               required>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="input-group">
                        <label for="numero_maison">
                            Numéro de la maison <span class="required-asterisk">*</span>
                        </label>
                        <i class="fas fa-home"></i>
                        <input type="text" 
                               id="numero_maison" 
                               name="numero_maison" 
                               placeholder="Numéro de votre maison"
                               required>
                    </div>

                    <div class="input-group">
                        <label for="quartier">
                            Quartier <span class="required-asterisk">*</span>
                        </label>
                        <i class="fas fa-building"></i>
                        <select id="quartier" name="quartier" required>
                            <option value="">Sélectionnez un quartier</option>
                            <!-- Les options seront générées par Laravel -->
                            @foreach($quartiers as $quartier)
                                <option value="{{ $quartier->id }}">{{ $quartier->nomQuartier }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i>
                    Soumettre la demande
                </button>

                <div class="form-footer">
                    <p><i class="fas fa-info-circle"></i> Tous les champs marqués d'un astérisque (*) sont obligatoires</p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Animation au chargement
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, select');
            inputs.forEach((input, index) => {
                input.style.opacity = '0';
                input.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    input.style.transition = 'all 0.5s ease';
                    input.style.opacity = '1';
                    input.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Validation en temps réel
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim() === '' && this.hasAttribute('required')) {
                        this.style.borderColor = '#ef4444';
                    } else {
                        this.style.borderColor = '#10b981';
                    }
                });

                input.addEventListener('input', function() {
                    if (this.style.borderColor === 'rgb(239, 68, 68)') {
                        this.style.borderColor = '#e5e7eb';
                    }
                });
            });

            // Animation du bouton submit
            const submitBtn = document.querySelector('.submit-btn');
            submitBtn.addEventListener('click', function(e) {
                if (document.querySelector('form').checkValidity()) {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement en cours...';
                    this.style.background = '#6b7280';
                }
            });
        });
    </script>
</body>
</html>