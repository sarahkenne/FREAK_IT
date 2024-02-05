<?php


namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categorie', compact('categories'));
    }

    public function show(Categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $categorie = Categorie::create($request->all());
        return redirect()->route('categories.show', $categorie->id);
    }

    public function edit(Categorie $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    public function update(Request $request, Categorie $categorie)
    {
        $categorie->update($request->all());
        return redirect()->route('categories.show', $categorie->id);
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index');
    }

    // Ajouter d'autres fonctions selon les besoins
}
