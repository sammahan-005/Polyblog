<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function show(User $user)
    {
        $user = User::with(['messages','comments'])->find(Auth::id());
        return view('user.show', compact('user'));
    }
}
