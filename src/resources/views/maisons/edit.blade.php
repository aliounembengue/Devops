<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Maison</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            color: #1a202c;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 2rem 0;
            box-shadow: 0 2px 10px rgba(59, 130, 246, 0.2);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .header h2 {
            font-size: 1.875rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* Container */
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 3rem 1rem;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            width: 100%;
            max-width: 500px;
            border: 1px solid #e2e8f0;
        }

        /* Form Title */
        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e40af;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: #3b82f6;
            border-radius: 2px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 0.875rem;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            color: #1f2937;
            background: white;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        input[type="text"]:hover {
            border-color: #cbd5e1;
        }

        /* Submit Button */
        button[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 1rem;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        }

        button[type="submit"]:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 2rem 1rem;
            }

            .form-card {
                padding: 2rem;
            }

            .header h2 {
                font-size: 1.5rem;
            }

            .form-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .form-card {
                padding: 1.5rem;
            }

            .form-title {
                font-size: 1.25rem;
            }
        }

        /* Animation d'entrée */
        .form-card {
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

        /* Override des classes originales */
        .bg-white {
            background: white !important;
        }

        .shadow {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        .rounded-lg {
            border-radius: 16px !important;
        }

        .text-gray-800 {
            color: #1e40af !important;
        }

        .bg-yellow-400 {
            background: linear-gradient(135deg, #3b82f6, #1e40af) !important;
        }

        .hover\:bg-yellow-500:hover {
            background: linear-gradient(135deg, #1e3a8a, #2563eb) !important;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-edit"></i>
                Modifier une Maison
            </h2>
        </div>
    </div>

    <!-- Container centré -->
    <div class="container">
        <div class="container mx-auto py-6">
            <div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto form-card">
                <h3 class="form-title">Modification de la maison</h3>
                
                <form action="{{ route('maisons.update', $maison->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="surface" class="block text-gray-700 font-medium">Surface</label>
                        <input type="text" name="surface" id="surface" 
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               value="{{ $maison->surface }}" 
                               placeholder="Ex: 120 m²"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="rue" class="block text-gray-700 font-medium">Numéro de maison</label>
                        <input type="text" name="rue" id="rue" 
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               value="{{ $maison->rue }}" 
                               placeholder="Ex: 123 Rue de la Paix"
                               required>
                    </div>

                    <button type="submit" 
                            class="w-full bg-yellow-400 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-yellow-500 transition">
                        <i class="fas fa-save"></i>
                        Enregistrer les modifications
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Animation sur focus des inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-1px)';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Gestion du formulaire
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Animation de soumission
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enregistrement...';
            submitBtn.disabled = true;
            
            // Le formulaire se soumet normalement
        });
    </script>
</body>
</html>