<?php

namespace App\Http\Controllers;

use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return response()->json([
            'messages' => Message::where(function($query) {
                                $query->where('from', request('from'));
                                $query->where('to', request('to'));
                            })->orwhere(function($query) {
                                $query->where('from', request('to'));
                                $query->where('to', request('from'));
                            })->get()->load('from', 'to')
                        ], 200);
        
    }

    public function store()
    {
        // dd(request()->all());
        $validated = request()->validate([
            'text' => 'required',
            'to' => 'required',
            'from' => 'required'
        ]);
        $message = Message::create($validated);

        MessageSent::dispatch($message);

        return response()->json([
            "message" => $message->load('from')
        ], 201);
    }
}
