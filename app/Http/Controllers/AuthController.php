<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use Validator;


class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function dashboard(){
        return view('auth.dashboard');
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
}
