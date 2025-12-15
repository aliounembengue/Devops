<?php

// app/Http/Controllers/HabitantController.php

namespace App\Http\Controllers;

use App\Models\Habitant;
use App\Models\Maison; // Assurez-vous d'ajouter cela pour la relation avec Maison
use Illuminate\Http\Request;

class HabitantController extends Controller
{
    public function index()
    {
        $habitants = Habitant::paginate(10); // 10 habitants par page, tu peux changer le nombre

        return view('habitants.index', compact('habitants'));
    }

    public function create()
    {
        $maisons = Maison::all();
        return view('habitants.create', compact('maisons'));
    }

    public function store(Request $request)
    {
       $request->validate([
    'nom' => 'required',
    'prenom' => 'required',
    'telephone' => 'required',
    'id_maison' => 'required',
    'date_naiss' => 'required|date',
    'lieu_naiss' => 'required|string',
]);


        Habitant::create($request->all());

        return redirect()->route('habitants.index')->with('success', 'Habitant ajouté avec succès.');
    }

    public function destroy($id)
    {
        // Trouver l'habitant
        $habitant = Habitant::findOrFail($id);

        // Supprimer l'habitant
        $habitant->delete();

        // Rediriger vers la liste des habitants avec un message de succès
        return redirect()->route('habitants.index')->with('success', 'Habitant supprimé avec succès.');
    }

   public function edit($id)
{
    $habitant = Habitant::findOrFail($id);
    $maisons = Maison::all(); // pour le select
    return view('habitants.edit', compact('habitant', 'maisons'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'id_maison' => 'required|exists:maisons,id',
    ]);

    $habitant = Habitant::findOrFail($id);
    $habitant->update([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'telephone' => $request->telephone,
        'id_maison' => $request->id_maison,
    ]);

    return redirect()->route('habitants.index')
                     ->with('success', 'Habitant modifié avec succès !');
}
}
