<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // Affiche la liste des modules
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    // Affiche le formulaire de création d'un module
    public function create()
    {
        return view('modules.create');
    }

    // Enregistre un nouveau module
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Module::create($request->all());

        return redirect()->route('modules.index')->with('success', 'Module créé avec succès.');
    }

    // Affiche les détails d'un module
    public function show(Module $module)
    {
        return view('modules.show', compact('module'));
    }

    // Affiche le formulaire de modification d'un module
    public function edit(Module $module)
    {
        return view('modules.edit', compact('module'));
    }

    // Met à jour un module
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $module->update($request->all());

        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès.');
    }

    // Supprime un module
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès.');
    }
}