<?php

namespace App\Http\Controllers;

use App\Models\community;
use Illuminate\Http\Request;
use App\Http\Requests\CommunityRequest;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('communities.index', [
            'communities' => community::all(),
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
        $community = community::create($request->validated());
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
