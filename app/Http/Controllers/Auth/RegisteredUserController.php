<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Traite la soumission du formulaire d'inscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:admin,auditeur'], // Validation du rôle
        ]);

        // Crée l'utilisateur avec les données du formulaire
        $user = $this->createUser($request->all());

        Auth::login($user);

        // Redirige en fonction du rôle
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Crée un nouvel utilisateur dans la base de données.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'], // Assure-toi que 'role' est bien défini
        ]);
    }
}