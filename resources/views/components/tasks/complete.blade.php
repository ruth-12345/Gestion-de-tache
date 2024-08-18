@Props(['task'])

<form x-data @submit.prevent="$refs.completeTaskForm.submit()" method="POST" action="{{ route('task.destroy', $task) }}" x-ref="completeTaskForm">
    @csrf
    @method('PATCH')

    <button type="button" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 ">
        <svg class="w-6 h-6 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
        </svg>
        Marquer comme terminée
    </button>
</form>

