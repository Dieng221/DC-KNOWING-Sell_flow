<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Purchase;
use Carbon\Carbon;

class DashBoardController extends Controller
{

    public function storeAPI(Request $request)
    {
        $user = auth()->user();
        $day = Carbon::now()->subHours(24);

        $purchases = $user->purchases()->with('articles')->where('created_at', '>=', $day)->get();
        $sales = $user->sales()->with('articles')->where('created_at', '>=', $day)->get();

        $prix_purchase = 0;
        $prix_sale = 0;

        foreach ($purchases->articles as $article) {
            $prix_purchase += $article->prix_achat * $article->pivot->quantite;
        }
        foreach ($sales->articles as $article) {
            $prix_sale += $article->prix_achat * $article->pivot->quantite;
        }

        return response()->json([
            'message' => 'Récupération réussit !',
            'success' => true,
            'data' => ['sale' => $prix_sale, 'purchase' => $prix_purchase]
        ]);

    }

    public function showAPI(Admin $admin)
    {
        return response()->json(['message' => 'Récupération réussit !', 'success' => true, 'data' => $admin]);
    }

}
