<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Sujet;
use Illuminate\Http\Request;

class SujetController extends Controller
{
    public function index()
    {
        $sujets = Sujet::all();
        return view('dashboard', compact('sujets'));
    }

    public function show(Sujet $sujet)
    {
        $messages = $sujet->messages;

        $sujets = Sujet::all();
        return view('sujetsShow', compact('sujets', 'sujet','messages'));
    }

    public function create()
    {
        $sujets = Sujet::all();
        $categories = Categorie::all();

        return view('creatSujets', compact('sujets', 'categories'));
    }

    public function store(Request $request)
    {	
        $sujet =  Sujet::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'categorie_id' => $request->category_id,
        ]);
        return redirect()->route('sujetsShow', $sujet->id);
    }

    public function edit(Sujet $sujet)
    {
        return view('sujets.edit', compact('sujet'));
    }

    public function update(Request $request, Sujet $sujet)
    {
        $sujet->update($request->all());
        return redirect()->route('sujets.show', $sujet->id);
    }

    public function destroy(Sujet $sujet)
    {
        $sujet->delete();
        return redirect()->route('sujets.index');
    }

    // Ajouter d'autres fonctions selon les besoins
}
