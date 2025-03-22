<x-app-layout>
    <x-slot name="content">
        <h1>Liste des rapports</h1>
        <a href="{{ route('rapports.create') }}" class="btn btn-primary">Créer un rapport</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Utilisateur</th>
                    <th>Module</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rapports as $rapport)
                    <tr>
                        <td>{{ $rapport->title }}</td>
                        <td>{{ $rapport->content }}</td>
                        <td>{{ $rapport->user->name }}</td>
                        <td>{{ $rapport->module->name }}</td>
                        <td>
                            <a href="{{ route('rapports.show', $rapport) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('rapports.edit', $rapport) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('rapports.destroy', $rapport) }}" method="POST" style="display:inline;">
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