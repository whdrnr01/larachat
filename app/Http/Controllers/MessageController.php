<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store()
    {
        // dd(request()->all());
        $validated = request()->validate([
            'text' => 'required',
            'to' => 'required',
            'from' => 'required'
        ]);

        return response()->json([
            "message" => Message::create($validated)
        ], 201);
    }
}
