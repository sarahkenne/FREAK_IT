<?php

namespace App\Http\Controllers;

use App\Models\Sujet;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function show(sujet $sujet)
    {
        return view('sujetsShow', compact('sujet'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request, $sujetId)
    {


        $request->validate([
            'contenu' => 'required',
        ]);

        $message = new Message([
            'contenu' => $request->input('contenu'),
            'user_id' => auth()->id(),
            'sujet_id' => $sujetId,
        ]);

        $message->save();

        return redirect()->route('sujetsShow', $sujetId);
    }


    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, Message $message)
    {
        $request->validate([
            'contenu' => 'required',
        ]);

        $message->contenu = $request->input('contenu');
        $message->save();

        return redirect()->route('messages.show', $message->id);
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('sujetsShow', $message->sujet)->with('success', 'Message supprimé avec succès.');
    }
}
