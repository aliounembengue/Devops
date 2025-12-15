<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paydunya\Checkout\Checkout as PayDunyaCheckout;

class PayDunyaController extends Controller
{
    // Afficher le formulaire de paiement
    public function showForm()
    {
        return view('paydunya.form');
    }

    // Créer la transaction et rediriger
    public function pay(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:100', // montant minimal
        ]);

        $checkout = new PayDunyaCheckout();
        $checkout->setMode(config('paydunya.mode'));

        // Infos du paiement
        $checkout->name = "Paiement Test";
        $checkout->description = "Achat d'un produit/service";
        $checkout->amount = $request->amount;
        $checkout->currency = "XOF";

        // URLs de redirection
        $checkout->return_url = route('paydunya.verify');
        $checkout->cancel_url = route('paydunya.form');

        $response = $checkout->create();

        if ($response->success) {
            return redirect($response->checkout_url);
        }

        return back()->with('error', 'Erreur lors de la création du paiement.');
    }

    // Vérifier le paiement après redirection
    public function verify(Request $request)
    {
        $checkout_id = $request->query('checkout_id');

        if (!$checkout_id) {
            return redirect()->route('paydunya.form')->with('error', 'ID de paiement manquant.');
        }

        $checkout = new PayDunyaCheckout();
        $checkout->setMode(config('paydunya.mode'));
        $response = $checkout->fetch($checkout_id);

        if ($response->status === "completed") {
            return view('paydunya.success', ['data' => $response]);
        } else {
            return view('paydunya.failed', ['data' => $response]);
        }
    }
}
