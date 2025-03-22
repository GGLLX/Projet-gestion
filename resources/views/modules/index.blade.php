<x-app-layout>
    <x-slot name="content">
        <h1>Liste des modules</h1>
        <a href="{{ route('modules.create') }}" class="btn btn-primary">Créer un module</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $module)
                    <tr>
                        <td>{{ $module->name }}</td>
                        <td>{{ $module->description }}</td>
                        <td>
                            <a href="{{ route('modules.show', $module) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('modules.edit', $module) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('modules.destroy', $module) }}" method="POST" style="display:inline;">
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