<x-app-layout>
    <x-slot name="content">
        <h1>Détails de l'exercice</h1>
        <p><strong>Titre :</strong> {{ $exercice->title }}</p>
        <p><strong>Description :</strong> {{ $exercice->description }}</p>
        <p><strong>Module :</strong> {{ $exercice->module->name }}</p>
        <a href="{{ route('exercices.index') }}" class="btn btn-secondary">Retour</a>
    </x-slot>
</x-app-layout>