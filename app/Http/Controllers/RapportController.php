<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    // Affiche la liste des rapports
    public function index()
    {
        $rapports = Rapport::with(['user', 'module'])->get();
        return view('rapports.index', compact('rapports'));
    }

    // Affiche le formulaire de création d'un rapport
    public function create()
    {
        $users = User::all();
        $modules = Module::all();
        return view('rapports.create', compact('users', 'modules'));
    }

    // Enregistre un nouveau rapport
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'module_id' => 'required|exists:modules,id',
        ]);

        Rapport::create($request->all());

        return redirect()->route('rapports.index')->with('success', 'Rapport créé avec succès.');
    }

    // Affiche les détails d'un rapport
    public function show(Rapport $rapport)
    {
        return view('rapports.show', compact('rapport'));
    }

    // Affiche le formulaire de modification d'un rapport
    public function edit(Rapport $rapport)
    {
        $users = User::all();
        $modules = Module::all();
        return view('rapports.edit', compact('rapport', 'users', 'modules'));
    }

    // Met à jour un rapport
    public function update(Request $request, Rapport $rapport)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'module_id' => 'required|exists:modules,id',
        ]);

        $rapport->update($request->all());

        return redirect()->route('rapports.index')->with('success', 'Rapport mis à jour avec succès.');
    }

    // Supprime un rapport
    public function destroy(Rapport $rapport)
    {
        $rapport->delete();
        return redirect()->route('rapports.index')->with('success', 'Rapport supprimé avec succès.');
    }
}