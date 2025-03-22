<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Affiche la liste des utilisateurs
    public function index()
{
    $users = User::all(); // Récupère tous les utilisateurs
    return view('users.index', ['users' => $users]); // Passe les utilisateurs à la vue
}

    // Affiche le formulaire de création d'un utilisateur
    public function create()
    {
        return view('users.create');
    }

    // Enregistre un nouvel utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,auditeur',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Affiche les détails d'un utilisateur
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Affiche le formulaire de modification d'un utilisateur
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Met à jour un utilisateur
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:admin,auditeur',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // Supprime un utilisateur
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}