<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\community;
use Illuminate\Support\Facades\Auth;

class CheckCommunityMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $communityId = null): Response
    {
        // dd($request->getRequestUri());
        if(!($request->getRequestUri()=="/communities") && !($request->getRequestUri()=="/communities/create")){
            if ($request->community->is_private) {
                    if(!$request->community->members->contains(Auth::id())) {
                        if($request->community->demandes->where('user_id',Auth::id())->where('status','pending')->first()){
                            return redirect()->route('communities.adhesionsent',$community=$request->community);
                        }
                        return redirect()->route('communities.adhesion',$community=$request->community);
                    }
            }
        }

        return $next($request);
    }
}

