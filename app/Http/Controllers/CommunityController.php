<?php

namespace App\Http\Controllers;

use App\Models\community;
use Illuminate\Http\Request;
use App\Http\Requests\CommunityRequest;
use App\Models\demande;
use Illuminate\Support\Facades\Auth;


class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('communities.index', [
            'communities' => community::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('communities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityRequest $request)
    {
        //dd($request->validated() + ['user_id' => Auth::id()]);
        $community = community::create($request->validated() + ['user_id' => Auth::id()]);
        $community_member = $community->members()->attach(Auth::id());
        return redirect()->route('communities.show', $community)->with('success', 'Communauté créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(community $community)
    {
        
        $community->load('messages');
        return view('communities.show', [
            'community' => $community,
        ]);
    }

    public function adhesion(community $community)
    {

        return view('communities.adhesion', [
            'community' => $community,
        ]);
    }

    public function adhesionSent(community $community)
    {

        return view('communities.adhesionsent', [
            'community' => $community,
        ]);
    }

    public function joinRequest(community $community)
    {
        $demande = demande::firstOrCreate([
            'user_id' => Auth::id(),
            'community_id' => $community->id,
            'status' => 'pending',
        ]);
        return view('communities.confirmation', [
            'community' => $community,
        ]);
        
    }

    public function manage(community $community)
    {
        $community->load('demandes.user');
        return view('communities.demandes.index', [
            'community' => $community,
        ]);
    }

    public function acceptDemande(community $community, demande $demande)
    {
        $demande->update(['status' => 'accepted']);
        $community->members()->attach($demande->user_id);
        return redirect()->route('communities.demandes.index', $community)->with('success', 'Demande acceptée avec succès.');
    }

    public function refuseDemande(community $community, demande $demande)
    {
        $demande->update(['status' => 'refused']);
        return redirect()->route('communities.demandes.index', $community)->with('success', 'Demande refusée avec succès.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(community $community)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, community $community)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(community $community)
    // {
    //     //
    // }
}
