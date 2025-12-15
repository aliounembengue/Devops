<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Maison;
use App\Models\Habitant;
use App\Models\Deleguequartier;
use App\Models\Demande;
use Barryvdh\DomPDF\Facade\Pdf;

class DelegueDashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Récupérer le quartier du délégué
        $delegueQuartier = Deleguequartier::where('user_id', $user->id)->first();

        if (!$delegueQuartier) {
            return back()->with('error', 'Aucun quartier associé à ce délégué.');
        }

        $quartierId = $delegueQuartier->id_quartier;

        // Maisons
        $maisons = Maison::where('quartier_id', $quartierId)->get();
        $maisonsCount = $maisons->count();

        // Habitants
        $habitants = Habitant::whereIn('id_maison', $maisons->pluck('id'))->get();
        $habitantsCount = $habitants->count();

        // Demandes de certificat
        $demandes = Demande::where('quartier_id', $quartierId)->get();

        return view('delegue.dashboard', compact(
            'maisons', 'maisonsCount',
            'habitants', 'habitantsCount',
            'demandes'
        ));
    }

    // ✅ Valider une demande et générer un PDF
    public function validerCertificat($id)
    {
        $demande = Demande::findOrFail($id);
        $demande->status = 'valide';
        $demande->save();

        // Vérifier si le dossier existe, sinon le créer
        $certificatPath = storage_path('app/public/certificats');
        if (!file_exists($certificatPath)) {
            mkdir($certificatPath, 0755, true);
        }

        // Générer le PDF
        $filename = 'certificat_'.$demande->id.'.pdf';
        $pdf = Pdf::loadView('delegue.pdf', [
            'demande' => $demande,
            'delegue' => Auth::user()
        ]);

        // Sauvegarder le PDF
        $pdf->save($certificatPath.'/'.$filename);

        // Mettre à jour la base
        $demande->certificat_path = 'certificats/'.$filename;
        $demande->save();

        return redirect()->back()->with('success', 'Demande validée et PDF généré !');
    }

    // ❌ Rejeter une demande
    public function rejeterCertificat($id)
    {
        $demande = Demande::findOrFail($id);
        $demande->status = 'rejete';
        $demande->save();

        return redirect()->back()->with('error', 'Demande rejetée.');
    }
}
