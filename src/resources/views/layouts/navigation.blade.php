<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- Gauche : Dashboard -->
            <div>
               <a href="{{ route('admin.dashboard') }}" class="text-gray-700 dark:text-gray-200 font-bold">Dashboard</a>

            </div>

            <!-- Droite : Auth -->
            <div>
                @auth
                    <!-- Bouton Déconnexion -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Se déconnecter
                        </button>
                    </form>
                @else
                    <!-- Si pas connecté -->
                    <a href="{{ route('login') }}" class="px-4 py-2 text-blue-600 hover:underline">Se connecter</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-blue-600 hover:underline">S’inscrire</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
