<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validation des champs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => "L'adresse e-mail est obligatoire.",
            'email.email' => "L'adresse e-mail doit être valide.",
            'password.required' => "Le mot de passe est obligatoire.",
        ]);

        $credentials = $request->only('email', 'password');

        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('success', 'Connexion réussie.');
        }

        // Si l'utilisateur n'existe pas
        return back()->withErrors([
            'email' => "L'utilisateur n'existe pas.",
        ])->withInput();
    }
}
