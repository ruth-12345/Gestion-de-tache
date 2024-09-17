@props(['task'])

<div
    x-data="{ isOpen: false, openedWithKeyboard: false, copyToClipboard() {
            const href = document.getElementById('copyFullPath').getAttribute('href');
            navigator.clipboard.writeText(href).then(() => {
                alert('Lien copié dans le presse-papiers !');
            }).catch(err => {
                console.error('Échec de la copie : ', err);
            });
        }}"
    @keydown.esc.prevent="isOpen = false, openedWithKeyboard = false"
    class="relative"
>
    <button
        type="button"
        aria-label="context menu"
        @click="isOpen = ! isOpen"
        @keydown.space.prevent="openedWithKeyboard = true"
        @keydown.enter.prevent="openedWithKeyboard = true"
        @keydown.down.prevent="openedWithKeyboard = true"
        class="inline-flex cursor-pointer items-center bg-transparent transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 active:opacity-100 dark:focus-visible:outline-slate-300"
        :class="isOpen || openedWithKeyboard ? 'text-black dark:text-white' : 'text-slate-700 dark:text-slate-300'"
        :aria-expanded="isOpen || openedWithKeyboard"
        aria-haspopup="true"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"  class="w-8 h-8">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" clip-rule="evenodd"/>
        </svg>
    </button>
    <!-- Dropdown Menu -->

    <div
        x-cloak x-show="isOpen || openedWithKeyboard"
        x-transition x-trap="openedWithKeyboard"
        @click.outside="isOpen = false, openedWithKeyboard = false"
        @keydown.down.prevent="$focus.wrap().next()"
        @keydown.up.prevent="$focus.wrap().previous()"
        class="absolute top-11 left-0 flex w-full min-w-[12rem] flex-col overflow-hidden rounded-xl border border-slate-300 bg-slate-100 py-1.5"
        role="menu"
    >
        <a href="{{ route('task.status', $task) }}"
           class="bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none
          {{ $task->status == 2 ? 'disabled opacity-50 cursor-not-allowed' : '' }}"
           @if($task->status == 2) aria-disabled="true" @endif
           role="menuitem">
            Terminer
        </a>
        <a @click.prevent="copyToClipboard" id="copyFullPath" href="{{ url('/') }}/task/{{$task->id}}"
           class="bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none"
           role="menuitem">Copier le lien</a>
        <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();" href="#"
           class="bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none"
           role="menuitem">
            Supprimer

            <form id="delete-form-{{ $task->id }}" action="{{ route('task.destroy', $task) }}" method="POST"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>

        </a>
    </div>
</div>
