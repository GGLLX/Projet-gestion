<x-app-layout>
    <x-slot name="content">
        <h1>Créer un exercice</h1>
        <form action="{{ route('exercices.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="module_id">Module</label>
                <select name="module_id" id="module_id" class="form-control" required>
                    @foreach ($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </x-slot>
</x-app-layout>