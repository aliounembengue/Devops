<?php

namespace App\Http\Controllers;

use App\Models\Habitant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Maison;
use App\Models\Demande;


class HabitantAuthController extends Controller
{
    // Afficher le formulaire d'inscription
    public function showRegisterForm()
    {
        $maisons = Maison::all();
        return view('habitants.register', compact('maisons'));
    }

    // Enregistrer un habitant
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:habitants',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $habitant = Habitant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
        ]);

        // Connexion directe après inscription
        Auth::guard('habitant')->login($habitant);

        return redirect()->route('habitant.dashboard')->with('success', 'Compte créé avec succès !');
    }

    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('habitants.login');
    }

    // Login habitant
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('habitant')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('habitant.dashboard')->with('success', 'Connecté avec succès !');
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::guard('habitant')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('habitant.login')->with('success', 'Déconnecté avec succès !');
    }

   public function dashboard()
{
    $habitant = Auth::guard('habitant')->user();

    // Récupérer les demandes de l'habitant
    $demandes = Demande::where('habitant_id', $habitant->id)->get();

    return view('habitants.dashboard', compact('habitant', 'demandes'));
}

}
