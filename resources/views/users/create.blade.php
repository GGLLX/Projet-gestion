<x-app-layout>
    <x-slot name="content">
        <h1>Créer un utilisateur</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Rôle</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="user">Utilisateur</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </x-slot>
</x-app-layout>