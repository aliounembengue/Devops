<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Quartier;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class DemandeController extends Controller
{
    // Afficher le formulaire
    public function create()
    {
        $quartiers = Quartier::all();
        return view('demandes.create', compact('quartiers'));
    }

    // Enregistrer la demande
    public function store(Request $request)
    {
        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'nationalite' => 'required|string|max:255',
            'annee_residence' => 'required|integer|min:0',
            'nom_proprietaire' => 'required|string|max:255',
            'numero_maison' => 'required|string|max:255',
            'quartier_id' => 'required|exists:quartiers,id',
            'piece_justificative' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // 2 Mo max
        ]);

        // Upload de la pièce justificative
        $piecePath = null;
        if ($request->hasFile('piece_justificative')) {
            $piecePath = $request->file('piece_justificative')->store('justificatifs', 'public');
        }

        Demande::create([
            'habitant_id' => Auth::guard('habitant')->id(),
            'nom_complet' => $request->nom_complet,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'nationalite' => $request->nationalite,
            'annee_residence' => $request->annee_residence,
            'nom_proprietaire' => $request->nom_proprietaire,
            'numero_maison' => $request->numero_maison,
            'quartier_id' => $request->quartier_id,
            'piece_justificative' => $piecePath, // Enregistre le chemin
        ]);

        return redirect()->route('demandes.create')->with('success', 'Demande envoyée avec succès !');
    }

    public function validerCertificat($id)
    {
        $demande = Demande::findOrFail($id);
        $demande->status = 'valide';

        // Générer le PDF
        $pdf = Pdf::loadView('delegue.pdf', [
            'demande' => $demande,
            'delegue' => Auth::user()
        ]);

        // Créer le dossier si besoin
        $path = storage_path('app/public/certificats');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Nom du fichier
        $filename = 'certificat_'.$demande->id.'.pdf';
        $pdf->save($path.'/'.$filename);

        // **Mettre à jour le chemin dans la base**
        $demande->certificat_path = 'certificats/'.$filename;
        $demande->save();

        return redirect()->back()->with('success', 'Demande validée et PDF généré !');
    }
}
