<x-app-layout>
    <x-slot name="content">
        <h1>{{ $rapport->title }}</h1>
        <p>{{ $rapport->content }}</p>
        <p><strong>Utilisateur :</strong> {{ $rapport->user->name }}</p>
        <p><strong>Module :</strong> {{ $rapport->module->name }}</p>
        <a href="{{ route('rapports.index') }}" class="btn btn-secondary">Retour</a>
    </x-slot>
</x-app-layout>