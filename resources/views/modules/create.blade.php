<x-app-layout>
    <x-slot name="content">
        <h1>Créer un module</h1>
        <form action="{{ route('modules.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </x-slot>
</x-app-layout>