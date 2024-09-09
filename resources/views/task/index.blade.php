<x-task-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Gestion de tâche collaborative </h1>

        @if(session('message'))
            <x-success-alert :message="session('message')" /> <!-- Success Alert -->
        @endif

        @if(session('error'))
            <x-error-alert :message="session('error')" /> <!-- Error Alert -->
        @endif

        @include('task.partials.tabs')

        @include('task.partials.list')

    </div>
</x-task-layout>
