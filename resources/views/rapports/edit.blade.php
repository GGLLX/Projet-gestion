<x-app-layout>
    <x-slot name="content">
        <h1>Modifier le rapport</h1>
        <form action="{{ route('rapports.update', $rapport) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $rapport->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="content" id="content" class="form-control" required>{{ $rapport->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-warning">Modifier</button>
        </form>
    </x-slot>
</x-app-layout>