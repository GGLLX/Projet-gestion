<x-app-layout>
    <x-slot name="content">
        <h1>Liste des exercices</h1>
        <a href="{{ route('exercices.create') }}" class="btn btn-primary">Créer un exercice</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Module</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exercices as $exercice)
                    <tr>
                        <td>{{ $exercice->title }}</td>
                        <td>{{ $exercice->description }}</td>
                        <td>{{ $exercice->module->name }}</td>
                        <td>
                            <a href="{{ route('exercices.show', $exercice) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('exercices.edit', $exercice) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('exercices.destroy', $exercice) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>