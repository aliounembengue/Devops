<x-layout>
    <style>
        body {
            background-color: #f9fafb;
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .flex.flex-wrap {
            display: grid !important;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            padding: 32px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .w-48.h-48 {
            width: 100% !important;
            height: auto !important;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .w-48.h-48:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .bg-blue-600 {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%) !important;
            padding: 20px !important;
            text-align: center;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .flex-1 {
            padding: 24px !important;
            display: flex;
            flex-direction: column;
            gap: 16px;
            flex: 1;
        }

        .flex-1 p {
            margin: 0 !important;
            padding: 12px 16px;
            background: #f8fafc;
            border-radius: 8px;
            border-left: 3px solid #3b82f6;
            font-size: 0.9rem;
            color: #374151;
        }

        .font-medium {
            font-weight: 600 !important;
            color: #1f2937;
        }

        .bg-blue-600.text-white {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%) !important;
            border: none;
            padding: 10px 20px !important;
            border-radius: 8px !important;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            width: 100%;
            margin-top: 8px !important;
        }

        .bg-blue-600.text-white:hover,
        .hover\:bg-blue-700:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%) !important;
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .flex.flex-wrap {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)) !important;
                gap: 20px;
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .flex.flex-wrap {
                grid-template-columns: 1fr !important;
                padding: 16px;
            }
        }
    </style>

    <div class="flex flex-wrap gap-4 p-6 justify-start">
        @foreach($quartiers as $quartier)
            <div class="w-48 h-48 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden flex flex-col">
                                 
                <!-- Bandeau nom du quartier -->
                <div class="bg-blue-600 text-white text-center font-bold py-2">
                    {{ $quartier->nomQuartier }}
                </div>
                 
                <!-- Contenu du carré -->
                <div class="flex flex-col justify-center items-center flex-1 p-2">
                    <p class="text-gray-700 text-sm mb-2">
                        <span class="font-medium">Délégué :</span> 
                        {{ $quartier->delegue?->habitant?->nom }} {{ $quartier->delegue?->habitant?->prenom ?? 'Non défini' }}
                    </p>
                    <p class="text-gray-600 text-sm mb-4">
                        <span class="font-medium">Habitants :</span> {{ $quartier->habitants->count() }}
                    </p>
                     
                    <a href="{{ route('deleguequartiers.show', $quartier->id) }}"
                        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                        Voir détails
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>