<?php

namespace App\Http\Controllers;

use App\Models\Quartier;
use Illuminate\Http\Request;

class QuartierController extends Controller
{
    public function index()
    {
        $quartiers = Quartier::all();
        return view('quartiers.index', compact('quartiers'));
    }

    public function create()
    {
        return view('quartiers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomQuartier' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

Quartier::create([
    'nom' => $request->nomQuartier,
    'description' => $request->description,
]);

        return redirect()->route('quartiers.index')->with('success', 'Quartier ajouté avec succès.');
    }

    public function show($id)
    {
        $quartier = Quartier::findOrFail($id);
        return view('quartiers.show', compact('quartier'));
    }

    public function edit($id)
    {
        $quartier = Quartier::findOrFail($id);
        return view('quartiers.edit', compact('quartier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomQuartier' => 'required|string|max:255',
             'description' => 'nullable|string',
        ]);

        $quartier = Quartier::findOrFail($id);
        $quartier->update($request->all());

        return redirect()->route('quartiers.index')->with('success', 'Quartier modifié avec succès.');
    }

    public function destroy($id)
    {
        $quartier = Quartier::findOrFail($id);
        $quartier->delete();

        return redirect()->route('quartiers.index')->with('success', 'Quartier supprimé avec succès.');
    }
}
