<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\Module;
use Illuminate\Http\Request;

class ExerciceController extends Controller
{
    // Affiche la liste des exercices
    public function index()
    {
        $exercices = Exercice::with('module')->get();
        return view('exercices.index', compact('exercices'));
    }

    // Affiche le formulaire de création d'un exercice
    public function create()
    {
        $modules = Module::all();
        return view('exercices.create', compact('modules'));
    }

    // Enregistre un nouvel exercice
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'module_id' => 'required|exists:modules,id',
        ]);

        Exercice::create($request->all());

        return redirect()->route('exercices.index')->with('success', 'Exercice créé avec succès.');
    }

    // Affiche les détails d'un exercice
    public function show(Exercice $exercice)
    {
        return view('exercices.show', compact('exercice'));
    }

    // Affiche le formulaire de modification d'un exercice
    public function edit(Exercice $exercice)
    {
        $modules = Module::all();
        return view('exercices.edit', compact('exercice', 'modules'));
    }

    // Met à jour un exercice
    public function update(Request $request, Exercice $exercice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'module_id' => 'required|exists:modules,id',
        ]);

        $exercice->update($request->all());

        return redirect()->route('exercices.index')->with('success', 'Exercice mis à jour avec succès.');
    }

    // Supprime un exercice
    public function destroy(Exercice $exercice)
    {
        $exercice->delete();
        return redirect()->route('exercices.index')->with('success', 'Exercice supprimé avec succès.');
    }
}