<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Propriétaire</title>
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
            background: linear-gradient(135deg, #1e40af, #3b82f6);
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

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            color: #1f2937;
            background: white;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        input[type="text"]:hover,
        input[type="date"]:hover,
        select:hover {
            border-color: #cbd5e1;
        }

        /* Select Styling */
        select {
            cursor: pointer;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>');
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px;
            padding-right: 2.5rem;
        }

        /* Submit Button */
        button[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #1e40af, #3b82f6);
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

        /* Clean overrides */
        .bg-white {
            background: white !important;
        }

        .shadow-lg {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        .rounded-lg {
            border-radius: 16px !important;
        }

        .text-blue-900 {
            color: #1e40af !important;
        }

        .bg-green-600 {
            background: linear-gradient(135deg, #1e40af, #3b82f6) !important;
        }

        .hover\:bg-green-700:hover {
            background: linear-gradient(135deg, #1e3a8a, #2563eb) !important;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <h2 class="font-semibold text-xl text-blue-900 leading-tight">
                <i class="fas fa-user-plus"></i>
                Ajouter un Propriétaire
            </h2>
        </div>
    </div>

    <!-- Container centré -->
    <div class="container">
        <div class="flex justify-center py-10">
            <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg form-card">
                <h3 class="text-2xl font-semibold text-blue-900 mb-6 text-center form-title">Nouveau Propriétaire</h3>
                
                <form action="{{ route('proprietaires.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="form-group">
                        <label for="nomPro" class="block text-gray-700 font-medium mb-2">Nom</label>
                        <input type="text" name="nomPro" id="nomPro" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Entrez le nom" required>
                    </div>

                    <div class="form-group">
                        <label for="prenomPro" class="block text-gray-700 font-medium mb-2">Prénom</label>
                        <input type="text" name="prenomPro" id="prenomPro" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Entrez le prénom" required>
                    </div>

                    <div class="form-group">
                        <label for="telephonePro" class="block text-gray-700 font-medium mb-2">Téléphone</label>
                        <input type="text" name="telephonePro" id="telephonePro" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Entrez le téléphone" required>
                    </div>

                    <div class="form-group">
                        <label for="dateNaissancePro" class="block text-gray-700 font-medium mb-2">Date de Naissance</label>
                        <input type="date" name="dateNaissancePro" id="dateNaissancePro" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <div class="form-group">
                        <label for="lieuNaissancePro" class="block text-gray-700 font-medium mb-2">Lieu de Naissance</label>
                        <input type="text" name="lieuNaissancePro" id="lieuNaissancePro" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Entrez le lieu" required>
                    </div>

                    <div class="form-group">
                        <label for="maison_id" class="block text-gray-700 font-medium mb-2">Maison</label>
                        <select name="maison_id" id="maison_id" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Aucune --</option>
                            @foreach($maisons as $maison)
                                <option value="{{ $maison->id }}">{{ $maison->rue }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" 
                            class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-green-700 transition">
                        Enregistrer
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>