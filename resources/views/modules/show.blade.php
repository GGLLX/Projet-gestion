<x-app-layout>
    <x-slot name="content">
        <h1>Détails du module</h1>
        <p><strong>Nom :</strong> {{ $module->name }}</p>
        <p><strong>Description :</strong> {{ $module->description }}</p>
        <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour</a>
    </x-slot>
</x-app-layout>