


<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-links">
            <a href="{{ route('users.index') }}" class="btn btn-primary">Gérer les utilisateurs</a>
            <a href="{{ route('modules.index') }}" class="btn btn-primary">Gérer les modules</a>
            <a href="{{ route('exercices.index') }}" class="btn btn-primary">Gérer les exercices</a>
            <a href="{{ route('rapports.index') }}" class="btn btn-primary">Gérer les rapports</a>
        </div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord Admin
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Bienvenue, administrateur !</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>