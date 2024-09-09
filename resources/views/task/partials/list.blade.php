@if($tasks->isEmpty())
    <div class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md">
        <p class="text-lg font-semibold text-gray-800">
            Aucun élément à afficher
        </p>
    </div>
@else
    @foreach($tasks as $task)
        <div class="flex items-center justify-between p-4 mb-4 bg-white rounded-lg shadow-md">
            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    {{ $task->titre }} <!-- Titre de la tâche -->
                </h2>

                <x-tasks.priority :priorite="$task->priorite" /> <!-- Priorité de la tâche -->
            </div>

            <div class="flex gap-2 mt-2">
                <x-tasks.edit :task="$task" :users="$users" /> <!-- Boutton pour éditer une tâche -->

                <x-tasks.delete :task="$task" /> <!-- Boutton pour supprimer une tâche -->
            </div>
        </div>
    @endforeach
@endif
