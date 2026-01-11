<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\message;
use App\Models\User;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(message $message){
        return view('comments.index', compact('message'));
    }

    public function store(CommentRequest $request, message $message)
    {
        $comment=comment::create([
            'user_id' =>Auth::id(),
            'message_id' => $message->id,
            'content' => $request->validated('content'),
        ]);

        return redirect()->route('messages.show', $message)->with('success', 'Commentaire ajouté avec succès.');


    }
}
