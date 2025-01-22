<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Sale;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function dashboard(){
        $sales = Sale::orderBy('created_at', 'desc')->take(5)->get();
        $purchases = Purchase::orderBy('created_at', 'desc')->take(5)->get();
        return view('auth.dashboard', compact('sales', 'purchases'));
    }

    // Méthode pour enregistrer un nouvel utilisateur
    public function registerAPI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'numero' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'numero' => $request->numero,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User created successfully'], 201);
    }

    // Méthode pour l'authentification d'un utilisateur et génération du token
    public function loginAPI(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // Tente de générer le token JWT
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            // Récupérer l'utilisateur associé au token
            $user = JWTAuth::user();
        } catch (JWTException $e) {
            return response()->json(['message' => 'Could not create token'], 500);
        }

        // Retourner le token et l'utilisateur dans la réponse
        return response()->json([
            'token' => $token,
            'data'  => $user,
            'message' => 'Connexion réussit !',
            'success' => true
        ]);
    }

    // Méthode pour récupérer les informations de l'utilisateur authentifié
    public function meAPI()
    {
        return response()->json(auth()->user());
    }

    // Méthode pour déconnecter l'utilisateur (invalider le token)
    public function logoutAPI()
    {
        auth()->logout();
        return response()->json(['message' => 'User logged out successfully']);
    }

    public function updateAPI(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nom' => 'nullable|string',
                'prenom' => 'nullable|string',
                'numero' => 'nullable|string',
                'email' => 'nullable|string|email',
            ]);

            $user = auth()->user();

            $user->update($validatedData);

            return response()->json([
                'message' => 'Vos données sont à jours !',
                'data' => $user,
                'success' => true
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors(),
                'success' => false
            ], 422);

        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du partenaire: ' . $e->getMessage());

            return response()->json([
                'message' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
                'errors' => $e->getMessage(),
                'success' => false
            ], 500);
        }

    }
}
