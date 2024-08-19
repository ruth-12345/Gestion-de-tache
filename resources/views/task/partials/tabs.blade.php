<div class="flex justify-between items-center mb-4">
    <div class="text-sm bg-red font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
                <a href="{{ route('task.index') }}"
                   class="inline-block p-4 {{ $status==null ? 'text-blue-600 border-blue-600' : 'hover:text-gray-600 hover:border-gray-300' }} border-b-2 rounded-t-lg {{ $status == null ? 'active' : '' }} dark:text-blue-500 dark:border-blue-500"
                   @if(empty($status)) aria-current="page" @endif>
                    Toutes les tâches
                </a>
            </li>

            <li class="me-2">
                <a href="{{ route('task.index', ['status' => '0']) }}"
                   class="inline-block p-4 {{ $status == '0' ? 'text-blue-600 border-blue-600' : 'hover:text-gray-600 hover:border-gray-300' }} border-b-2 rounded-t-lg {{ $status == '0' ? 'active' : '' }} dark:text-blue-500 dark:border-blue-500"
                   @if($status == '0') aria-current="page" @endif>
                    Non commencées
                </a>
            </li>

            <li class="me-2">
                <a href="{{ route('task.index', ['status' => '1']) }}"
                   class="inline-block p-4 {{ $status == '1' ? 'text-blue-600 border-blue-600' : 'hover:text-gray-600 hover:border-gray-300' }} border-b-2 rounded-t-lg {{ $status == '1' ? 'active' : '' }} dark:text-blue-500 dark:border-blue-500"
                   @if($status == '1') aria-current="page" @endif>
                    En-cours
                </a>
            </li>

            <li class="me-2">
                <a href="{{ route('task.index', ['status' => '2']) }}"
                   class="inline-block p-4 {{ $status == '2' ? 'text-blue-600 border-blue-600' : 'hover:text-gray-600 hover:border-gray-300' }} border-b-2 rounded-t-lg {{ $status == '2' ? 'active' : '' }} dark:text-blue-500 dark:border-blue-500"
                   @if($status == '2') aria-current="page" @endif>
                    Terminées
                </a>
            </li>
        </ul>
    </div>

    <x-tasks.add /> <!-- Add Task Button -->
</div>
