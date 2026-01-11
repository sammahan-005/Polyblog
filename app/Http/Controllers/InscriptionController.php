<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscriptionRequest;
use App\Models\User;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function store(InscriptionRequest $request){

        $validated = $request->validated();

        User::create($validated);

        return to_route('connexion')->with('success', 'Inscription réussie. Veuillez vous connecter.');


    }
}
