<?php

// app/Http/Controllers/MaisonController.php

namespace App\Http\Controllers;

use App\Models\Maison;
use Illuminate\Http\Request;
use App\Models\Quartier;

class MaisonController extends Controller
{
    public function index()
    {
        $maisons = Maison::all();
        return view('maisons.index', compact('maisons'));
    }

   public function create()
{
    $quartiers = Quartier::all(); // Récupère tous les quartiers
    return view('maisons.create', compact('quartiers'));
}


    public function store(Request $request)
    {
        $request->validate([
            'surface' => 'required',
            'rue' => 'required',
        ]);

      Maison::create([
    'surface' => $request->surface,
    'rue' => $request->rue,
    'quartier_id' => $request->quartier_id,
]);


        return redirect()->route('maisons.index')->with('success', 'Maison ajoutée avec succès.');
    }

    public function edit($id)
    {
        $maison = Maison::findOrFail($id);
        return view('maisons.edit', compact('maison'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'surface' => 'required',
            'rue' => 'required',
        ]);

        $maison = Maison::findOrFail($id);
        $maison->update($request->all());

        return redirect()->route('maisons.index')->with('success', 'Maison modifiée avec succès.');
    }

    public function destroy($id)
    {
        $maison = Maison::findOrFail($id);
        $maison->delete();

        return redirect()->route('maisons.index')->with('success', 'Maison supprimée avec succès.');
    }
}
