<x-app-layout>
    <x-slot name="content">
        <h1>Modifier le module</h1>
        <form action="{{ route('modules.update', $module) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $module->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $module->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-warning">Modifier</button>
        </form>
    </x-slot>
</x-app-layout>