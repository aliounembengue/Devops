<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DelegueDashboardController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\QuartierController;
use App\Http\Controllers\MaisonController;
use App\Http\Controllers\HabitantController;
use App\Http\Controllers\DeleguequartierController;
use App\Http\Controllers\ProprietaireController;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\HabitantAuthController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\PayDunyaController;


// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';

// Routes pour le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes ressources
Route::resource('communes', CommuneController::class);
Route::resource('quartiers', QuartierController::class);
Route::resource('maisons', MaisonController::class);
Route::resource('habitants', HabitantController::class);
Route::resource('deleguequartiers', DeleguequartierController::class);
Route::resource('proprietaires', ProprietaireController::class);

// Choisir un délégué pour un quartier
Route::get('/deleguequartiers/choisir/{quartier}', [DeleguequartierController::class, 'choisirHabitant'])
    ->middleware('auth')
    ->name('deleguequartiers.choisir');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Admin → pas de route spécifique, la vue est rendue directement
// Délégué
Route::get('/redirect-after-login', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'delegue') {
        return redirect()->route('delegue.dashboard');
    }

    return redirect('/'); // fallback pour les autres utilisateurs
})->middleware('auth')->name('redirect.after.login');


// Admin dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::prefix('delegue')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DelegueDashboardController::class, 'dashboard'])->name('delegue.dashboard');
});
Route::prefix('habitant')->group(function () {
    // Connexion
    Route::get('/login', [HabitantAuthController::class, 'showLoginForm'])->name('habitant.login');
    Route::post('/login', [HabitantAuthController::class, 'login'])->name('habitant.login.submit');

    // Inscription
    Route::get('/register', [HabitantAuthController::class, 'showRegisterForm'])->name('habitant.register');
    Route::post('/register', [HabitantAuthController::class, 'register'])->name('habitant.register.submit');

    // Déconnexion
    Route::post('/logout', [HabitantAuthController::class, 'logout'])->name('habitant.logout');

    // Dashboard (protégé par le guard habitant)
    Route::get('/dashboard', [HabitantAuthController::class, 'dashboard'])
        ->name('habitant.dashboard')
        ->middleware('auth:habitant');
});


// Formulaire de création
Route::get('/demandes/create', [DemandeController::class, 'create'])->name('demandes.create')->middleware('auth:habitant');

// Enregistrement de la demande
Route::post('/demandes', [DemandeController::class, 'store'])->name('demandes.store')->middleware('auth:habitant');
Route::middleware(['auth'])->group(function () {
    Route::get('/delegue/dashboard', [DelegueDashboardController::class, 'dashboard'])
        ->name('delegue.dashboard');

    Route::post('/delegue/demande/{id}/valider', [DelegueDashboardController::class, 'validerCertificat'])
        ->name('delegue.certificat.valider');

    Route::post('/delegue/demande/{id}/rejeter', [DelegueDashboardController::class, 'rejeterCertificat'])
        ->name('delegue.certificat.rejeter');
});

// Validation et rejet des demandes par le délégué
Route::prefix('delegue')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DelegueDashboardController::class, 'dashboard'])
        ->name('delegue.dashboard');

    // Valider une demande
    Route::post('/demande/{id}/valider', [DelegueDashboardController::class, 'validerCertificat'])
        ->name('delegue.certificat.valider');

    // Rejeter une demande
    Route::post('/demande/{id}/rejeter', [DelegueDashboardController::class, 'rejeterCertificat'])
        ->name('delegue.certificat.rejeter');
});

Route::get('/paydunya', [PayDunyaController::class, 'showForm'])->name('paydunya.form');
Route::post('/paydunya/pay', [PayDunyaController::class, 'pay'])->name('paydunya.pay');
Route::get('/paydunya/verify', [PayDunyaController::class, 'verify'])->name('paydunya.verify');

Route::get('/demandes/verify/{demande}', [DemandeController::class, 'verify'])->name('demandes.verify');

