<?php

// app/Http/Controllers/CommuneController.php

namespace App\Http\Controllers;

use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    public function index()
    {
        $communes = Commune::all();
        return view('communes.index', compact('communes'));
    }

    public function create()
    {
        return view('communes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NomCommune' => 'required',
            // Ajoutez d'autres validations si nécessaire
        ]);

        Commune::create($request->all());

        return redirect()->route('communes.index')->with('success', 'Commune ajoutée avec succès.');
    }

    public function show($id)
    {
        $commune = Commune::findOrFail($id);
        return view('communes.show', compact('commune'));
    }

    public function edit($id)
    {
        $commune = Commune::findOrFail($id);
        return view('communes.edit', compact('commune'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NomCommune' => 'required',
            // Ajoutez d'autres validations si nécessaire
        ]);

        $commune = Commune::findOrFail($id);
        $commune->update($request->all());

        return redirect()->route('communes.index')->with('success', 'Commune modifiée avec succès.');
    }

    public function destroy($id)
    {
        $commune = Commune::findOrFail($id);
        $commune->delete();

        return redirect()->route('communes.index')->with('success', 'Commune supprimée avec succès.');
    }
}

