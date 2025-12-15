<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - CertificatDomicile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white h-screen flex justify-center items-center">

    <!-- Formulaire centré -->
    <div class="w-4/5 max-w-md p-10 shadow-xl rounded-xl">
        <h2 class="text-3xl font-bold mb-6 text-[#4a6fa5] text-center">Créez votre compte</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nom -->
            <div class="mb-5">
                <label for="name" class="block mb-2 text-gray-700 font-medium">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4a6fa5] focus:border-[#4a6fa5]" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Email -->
            <div class="mb-5">
                <label for="email" class="block mb-2 text-gray-700 font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4a6fa5] focus:border-[#4a6fa5]" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Password -->
            <div class="mb-5">
                <label for="password" class="block mb-2 text-gray-700 font-medium">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4a6fa5] focus:border-[#4a6fa5]" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-5">
                <label for="password_confirmation" class="block mb-2 text-gray-700 font-medium">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4a6fa5] focus:border-[#4a6fa5]" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
            </div>

            <!-- Bouton -->
            <button type="submit"
                class="w-full py-3 bg-[#4a6fa5] text-white font-semibold rounded-lg shadow-md hover:bg-[#3e5a85] transition-colors">
                S'inscrire
            </button>

            <p class="text-center mt-6 text-gray-600">Vous avez déjà un compte ? 
                <a href="{{ route('login') }}" class="text-[#4a6fa5] hover:underline font-medium">Connectez-vous</a>
            </p>
        </form>
    </div>

</body>
</html>
