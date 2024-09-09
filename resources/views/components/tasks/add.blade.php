<div x-cloak x-data="{addModalIsOpen: {{ $errors->any() ? 'true' : 'false' }} }">
    <button @click="addModalIsOpen = true" type="button" class="cursor-pointer whitespace-nowrap rounded-xl bg-blue-700 py-2 px-4 text-center text-sm font-medium tracking-wide text-slate-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0">
        Ajouter une tâche
    </button>

    <div x-show="addModalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="addModalIsOpen" @keydown.esc.window="addModalIsOpen = false" @click.self="addModalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">

        <!-- Modal Dialog -->
        <div x-show="addModalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-full max-w-lg flex-col gap-4 overflow-hidden rounded-xl border border-slate-300 bg-white text-slate-700">

            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-slate-300 bg-slate-100/60 p-2 ">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-black">Ajouter une tâche</h3>
                <button @click="addModalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Dialog Body -->
            <div class="px-4 py-8">
                <form method="POST" action="{{ route('task.store') }}" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Titre de la tâche -->
                        <div class="col-span-2">
                            <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 @error('titre') text-red-700 @enderror">Titre</label>
                            <input type="text" name="titre" value="{{ old('titre') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('titre') border-red-500 bg-red-50 @enderror " placeholder="Saisir le titre">
                            @error('titre')
                                <p class="mt-2 text-sm text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>

                        <!-- Priorité de la tâche -->
                        <div class="col-span-2 ">
                            <label for="priorite" class="block mb-2 text-sm font-medium text-gray-900 ">Priorité</label>
                            <select name="priorite" required id="priorite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option disabled >Chosir la priorité</option>
                                <option value="faible">Faible</option>
                                <option value="moyen">Moyenne</option>
                                <option value="haute">Haute</option>
                            </select>
                        </div>

                        <!-- Description de la tâche -->
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 @error('description') text-red-700 @enderror">Description de la tâche</label>
                            <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 bg-red-50 @enderror " placeholder="Saisir la description de la tâche">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Enregistrer
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
