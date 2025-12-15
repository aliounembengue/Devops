<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitant;
use App\Models\Maison;
use App\Models\Quartier;
use App\Models\Deleguequartier;


class AdminController extends Controller
{
 public function dashboard()
{
    $habitantsCount = Habitant::count();
    $maisonsCount = Maison::count();
    $quartiersCount = Quartier::count();
    $deleguesCount = Deleguequartier::count();

    // Pour le graphique
    $labels = ['Habitants', 'Maisons', 'Quartiers', 'Délégués'];
    $data = [$habitantsCount, $maisonsCount, $quartiersCount, $deleguesCount];

    return view('dashboard', compact(
        'habitantsCount', 
        'maisonsCount', 
        'quartiersCount', 
        'deleguesCount',
        'labels',
        'data'
    ));
}



}
