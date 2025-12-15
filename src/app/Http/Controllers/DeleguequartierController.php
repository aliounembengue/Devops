<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use App\Models\Deleguequartier;
use App\Models\Habitant;
use App\Models\Quartier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DeleguequartierController extends Controller
{
    public function index()
    {
        $quartiers = Quartier::with('delegue')->get();
        return view('deleguequartiers.index', compact('quartiers'));
    }

    public function show($id)
    {
        $quartier = Quartier::with(['habitants', 'delegue'])->findOrFail($id);
        return view('deleguequartiers.show', compact('quartier'));
    }
public function create(Request $request)
{
    $quartierId = $request->query('quartier_id');

    // Vérifie que le quartier existe
    $quartier = Quartier::with('maisons.habitants')->findOrFail($quartierId);

    // Récupérer tous les habitants de ce quartier via les maisons
    $habitants = $quartier->maisons->flatMap(function($maison) {
        return $maison->habitants;
    });

    return view('deleguequartiers.create', compact('quartier', 'habitants'));
}

public function store(Request $request)
{
    $request->validate([
        'id_habitant' => 'required|exists:habitants,id',
        'email'       => 'required|email|unique:users,email',
        'password'    => 'required|min:6',
        'quartier_id' => 'required|exists:quartiers,id',
    ]);

    $quartier_id = $request->quartier_id;

 DB::transaction(function () use ($request) {

    $habitant = Habitant::findOrFail($request->id_habitant);

    // Crée l'utilisateur délégué
    $user = User::create([
        'name'     => $habitant->nom . ' ' . $habitant->prenom,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => 'delegue',
    ]);

    // Crée le délégué pour le quartier
    Deleguequartier::create([
    'id_habitant' => $habitant->id,
    'id_quartier' => $request->quartier_id,
    'user_id'     => $user->id,
    'email'       => $request->email,
    'password'    => Hash::make($request->password),
]);


});




    return redirect()->route('deleguequartiers.index')
                     ->with('success', 'Délégué ajouté avec succès !');
}



    public function destroy($id)
    {
        $delegue = Deleguequartier::findOrFail($id);
        $delegue->delete();

        return redirect()->route('deleguequartiers.index')
                         ->with('success', 'Délégué supprimé avec succès.');
    }

    public function dashboard()
{
    $delegue = auth()->user(); // récupère l'utilisateur connecté
    $quartier = $delegue->delegueQuartier->quartier ?? null;

    // Compter les demandes de certificats pour ce quartier (exemple)
    $demandesCount = $quartier ? $quartier->demandes()->count() : 0;

    return view('delegue.dashboard', compact('delegue', 'quartier', 'demandesCount'));
}



}
