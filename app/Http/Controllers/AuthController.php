<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnexionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(ConnexionRequest $request){
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('messages.index'));
        }

        return to_route('connexion')->withErrors([
            'error' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('name');
    }

    public function logout(){
        Auth::logout();
        return to_route('connexion')->with('success', 'Déconnexion réussie.');
    }
}
