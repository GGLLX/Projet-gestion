<x-app-layout>
    <x-slot name="content">
        <h1>Détails de l'utilisateur</h1>
        <p><strong>Nom :</strong> {{ $user->name }}</p>
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Rôle :</strong> {{ $user->role }}</p>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour</a>
    </x-slot>
</x-app-layout>