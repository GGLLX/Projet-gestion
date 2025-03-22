<x-app-layout>
    <x-slot name="content">
        <h1>Modifier l'exercice</h1>
        <form action="{{ route('exercices.update', $exercice) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $exercice->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required>{{ $exercice->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="module_id">Module</label>
                <select name="module_id" id="module_id" class="form-control" required>
                    @foreach ($modules as $module)
                        <option value="{{ $module->id }}" {{ $exercice->module_id === $module->id ? 'selected' : '' }}>{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Modifier</button>
        </form>
    </x-slot>
</x-app-layout>