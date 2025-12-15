<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Propriétaires</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #cbd5e1 100%);
            min-height: 100vh;
            color: #1a202c;
        }

        /* Header Section */
        .header {
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            color: white;
            padding: 2rem 0;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: translateX(-50px) translateY(-50px); }
            100% { transform: translateX(50px) translateY(50px); }
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .header h2 {
            font-size: 2.5rem;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Add Button Styling */
        a[href*="proprietaires.create"] {
            background: linear-gradient(135deg, #10b981, #34d399) !important;
            color: white !important;
            padding: 1rem 2rem !important;
            border: none !important;
            border-radius: 12px !important;
            font-size: 1rem !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
            margin-bottom: 2rem !important;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3) !important;
            transition: all 0.3s ease !important;
            position: relative !important;
            overflow: hidden !important;
        }

        a[href*="proprietaires.create"]::before {
            content: '+ ' !important;
            font-weight: bold !important;
            font-size: 1.2rem !important;
        }

        a[href*="proprietaires.create"]::after {
            content: '' !important;
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        a[href*="proprietaires.create"]:hover::after {
            left: 100%;
        }

        a[href*="proprietaires.create"]:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4) !important;
            color: white !important;
        }

        /* Table Container */
        .overflow-x-auto {
            background: white !important;
            border-radius: 20px !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1) !important;
            overflow: hidden !important;
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

        /* Table Styles */
        table {
            width: 100% !important;
            border-collapse: collapse !important;
            background: transparent !important;
        }

        thead {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6) !important;
            position: relative;
        }

        thead::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #10b981, #34d399, #06b6d4);
        }

        th {
            padding: 1.5rem 1rem !important;
            color: white !important;
            font-weight: 700 !important;
            font-size: 0.9rem !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            text-align: left !important;
            position: relative !important;
            border: none !important;
        }

        th:last-child {
            text-align: center !important;
        }

        tbody tr {
            transition: all 0.3s ease !important;
            border-bottom: 1px solid #f1f5f9 !important;
        }

        tbody tr:hover {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0) !important;
            transform: scale(1.01) !important;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1) !important;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc !important;
        }

        tbody tr:nth-child(even):hover {
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0) !important;
        }

        td {
            padding: 1.25rem 1rem !important;
            vertical-align: top !important;
            font-weight: 500 !important;
            color: #374151 !important;
            border: none !important;
        }

        /* Actions Container */
        .flex.justify-center.gap-2 {
            display: flex !important;
            gap: 0.5rem !important;
            justify-content: center !important;
            flex-wrap: wrap !important;
        }

        /* Edit Button Styling */
        a[href*="proprietaires.edit"] {
            background: linear-gradient(135deg, #f59e0b, #fbbf24) !important;
            color: white !important;
            padding: 0.5rem 1rem !important;
            border: none !important;
            border-radius: 8px !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3) !important;
            position: relative !important;
            overflow: hidden !important;
        }

        a[href*="proprietaires.edit"]:hover {
            background: linear-gradient(135deg, #d97706, #f59e0b) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4) !important;
            color: white !important;
        }

        /* Delete Button Styling */
        button[onclick*="confirm"] {
            background: linear-gradient(135deg, #ef4444, #f87171) !important;
            color: white !important;
            padding: 0.5rem 1rem !important;
            border: none !important;
            border-radius: 8px !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3) !important;
        }

        button[onclick*="confirm"]:hover {
            background: linear-gradient(135deg, #dc2626, #ef4444) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4) !important;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .overflow-x-auto {
                border-radius: 12px !important;
            }
            
            table {
                min-width: 800px !important;
            }
        }

        @media (max-width: 768px) {
            .header h2 {
                font-size: 2rem !important;
            }

            .container {
                padding: 1rem !important;
            }

            a[href*="proprietaires.create"] {
                width: 100% !important;
                justify-content: center !important;
                margin-bottom: 1.5rem !important;
            }

            th,
            td {
                padding: 1rem 0.5rem !important;
                font-size: 0.875rem !important;
            }

            .flex.justify-center.gap-2 {
                flex-direction: column !important;
                gap: 0.3rem !important;
            }

            a[href*="proprietaires.edit"],
            button[onclick*="confirm"] {
                font-size: 0.75rem !important;
                padding: 0.4rem 0.8rem !important;
            }
        }

        /* Enhanced styling for Blade content */
        .bg-blue-900 {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6) !important;
        }

        .text-blue-900 {
            color: #1e3a8a !important;
        }

        .bg-white {
            background: white !important;
        }

        .shadow-lg {
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1) !important;
        }

        .rounded-lg {
            border-radius: 20px !important;
        }

        .divide-y {
            border-color: #f1f5f9 !important;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <div class="header-content">
            <h2 class="font-semibold text-xl text-blue-900 leading-tight">
                <i class="fas fa-users"></i>
                Liste des Propriétaires
            </h2>
        </div>
    </div>

    <!-- Main Content (Your original code structure) -->
    <div class="container mx-auto py-6">
        <!-- Bouton Ajouter en vert -->
        <a href="{{ route('proprietaires.create') }}" 
           class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition mb-4 inline-block">
            Ajouter un Propriétaire
        </a>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Nom</th>
                        <th class="px-4 py-2 text-left">Prénom</th>
                        <th class="px-4 py-2 text-left">Téléphone</th>
                        <th class="px-4 py-2 text-left">Date Naissance</th>
                        <th class="px-4 py-2 text-left">Lieu Naissance</th>
                        <th class="px-4 py-2 text-left">Maisons</th>
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($proprietaires as $proprietaire)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2">{{ $proprietaire->nomPro }}</td>
                            <td class="px-4 py-2">{{ $proprietaire->prenomPro }}</td>
                            <td class="px-4 py-2">{{ $proprietaire->telephonePro }}</td>
                            <td class="px-4 py-2">{{ $proprietaire->dateNaissancePro }}</td>
                            <td class="px-4 py-2">{{ $proprietaire->lieuNaissancePro }}</td>
                            <td class="px-4 py-2">
                                @foreach($proprietaire->maisons as $maison)
                                    {{ $maison->rue }}<br>
                                @endforeach
                            </td>
                            <td class="px-4 py-2 text-center flex justify-center gap-2">
                                <!-- Modifier en jaune -->
                                <a href="{{ route('proprietaires.edit', $proprietaire->id) }}" 
                                   class="px-3 py-1 bg-yellow-400 text-white rounded-lg shadow hover:bg-yellow-500 transition">
                                    Modifier
                                </a>

                                <!-- Supprimer en rouge -->
                                <form action="{{ route('proprietaires.destroy', $proprietaire->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>