<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\message;
use App\Models\like;
use App\Models\report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = message::with(['likes','user'])->orderby('created_at', 'desc')->paginate(10);
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {

        message::create([
            'user_id'=>Auth::id(),
            'content' => $request->validated('content'),
            
        ]);
        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(message $message)
    {
        $message->load(['comments', 'likes',]);
        return view('messages.show',compact('message'));
    }

    public function like(message $message)
    {
        
        $like = like::firstOrCreate([
        'user_id' => Auth::id(),
        'message_id' => $message->id
        ]);

        if (!$like->wasRecentlyCreated) {
            $like->delete();
        }

        return back();
    
    }

    public function report(message $message)
    {
        $report = report::firstOrCreate([
        'user_id' => Auth::id(),
        'message_id' => $message->id
        ]);

        if (!$report->wasRecentlyCreated) {
            $report->delete();
        }

        return back();
    }

    
}
