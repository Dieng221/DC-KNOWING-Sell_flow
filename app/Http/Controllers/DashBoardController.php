<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Purchase;
use Carbon\Carbon;

class DashBoardController extends Controller
{

    public function simpleDetail(Request $request)
    {
        $user = auth()->user();
        $day = Carbon::now()->subHours(24);

        // Récupérer les achats et les ventes dans les 24 dernières heures
        $purchases = $user->purchases()->with('articles')->where('created_at', '>=', $day)->get();
        $sales = $user->sales()->with('articles')->where('created_at', '>=', $day)->get();

        // Initialiser les variables pour le total prix des achats et des ventes
        $prix_purchase = 0;
        $prix_sale = 0;

        // Calcul du prix d'achat pour chaque achat
        foreach ($purchases as $purchase) {
            foreach ($purchase->articles as $article) {
                $prix_purchase += $article->prix_achat * $article->pivot->quantite;
            }
        }

        // Calcul du prix de vente pour chaque vente
        foreach ($sales as $sale) {
            foreach ($sale->articles as $article) {
                $prix_sale += $article->prix_vente * $article->pivot->quantite;
            }
        }

        return response()->json([
            'message' => 'Récupération réussie !',
            'success' => true,
            'data' => ['sale' => $prix_sale, 'purchase' => $prix_purchase]
        ]);

    }

    public function showAPI(Admin $admin)
    {
        return response()->json(['message' => 'Récupération réussit !', 'success' => true, 'data' => $admin]);
    }

}
