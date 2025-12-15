<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use App\Models\Maison;
use Illuminate\Http\Request;

class ProprietaireController extends Controller
{
    public function index()
    {
        $proprietaires = Proprietaire::with('maisons')->get();
        return view('proprietaires.index', compact('proprietaires'));
    }

    public function create()
    {
        $maisons = Maison::all();
        return view('proprietaires.create', compact('maisons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomPro' => 'required|string|max:255',
            'prenomPro' => 'required|string|max:255',
            'telephonePro' => 'required|string|max:20',
            'dateNaissancePro' => 'required|date',
            'lieuNaissancePro' => 'required|string|max:255',
            'maison_id' => 'nullable|exists:maisons,id',
        ]);

        $proprietaire = Proprietaire::create($request->all());

        // Si une maison est sélectionnée, on la lie
        if($request->maison_id){
            $maison = Maison::find($request->maison_id);
            $maison->proprietaire_id = $proprietaire->id;
            $maison->save();
        }

        return redirect()->route('proprietaires.index')->with('success', 'Propriétaire ajouté avec succès.');
    }

    public function edit(Proprietaire $proprietaire)
    {
        $maisons = Maison::all();
        return view('proprietaires.edit', compact('proprietaire', 'maisons'));
    }

    public function update(Request $request, Proprietaire $proprietaire)
    {
        $request->validate([
            'nomPro' => 'required|string|max:255',
            'prenomPro' => 'required|string|max:255',
            'telephonePro' => 'required|string|max:20',
            'dateNaissancePro' => 'required|date',
            'lieuNaissancePro' => 'required|string|max:255',
            'maison_id' => 'nullable|exists:maisons,id',
        ]);

        $proprietaire->update($request->all());

        // Lier la maison sélectionnée
        if($request->maison_id){
            $maison = Maison::find($request->maison_id);
            $maison->proprietaire_id = $proprietaire->id;
            $maison->save();
        }

        return redirect()->route('proprietaires.index')->with('success', 'Propriétaire mis à jour avec succès.');
    }

    public function destroy(Proprietaire $proprietaire)
    {
        $proprietaire->delete();
        return redirect()->route('proprietaires.index')->with('success', 'Propriétaire supprimé avec succès.');
    }
}
