@props(['task', 'users'])

<div x-data="{ editModalIsOpen: false }">
    <!-- Bouton d'ouverture de la modal -->
    <button @click="editModalIsOpen = true" type="button" class="cursor-pointer whitespace-nowrap rounded-xl py-2 px-4 text-center text-sm font-medium tracking-wide text-slate-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0 hover:text-indigo-800">
        <svg class="w-6 h-6 text-indigo-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        </svg>
    </button>

    <!-- Modal -->
    <div x-cloak x-show="editModalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="editModalIsOpen" @keydown.esc.window="editModalIsOpen = false" @click.self="editModalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <div x-show="editModalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="relative w-full max-w-7xl max-h-full flex flex-col gap-4 overflow-hidden rounded-xl border border-slate-300 bg-white text-slate-700">

            <!-- Header de la modal -->
            <div class="flex items-center justify-between border-b border-slate-300 bg-slate-100/60 p-4">
                <x-dot-vert />
                <button @click="editModalIsOpen = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Body de la modal en deux colonnes -->
            <div class="px-4 py-2 grid grid-cols-1 md:grid-cols-[3fr_1.5fr] gap-6">
                <!-- Colonne de gauche : Informations de la tâche -->
                <div>
                    <div class="flex flex-col space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900">Aperçu de la tâche</h3>
                        <div class="py-2 bg-gray-100 p-4 rounded-lg border border-gray-300">
                            <p class="text-sm text-gray-800">Date d'ajout: <span class="font-bold text-gray-800"> {{ $task->created_at->format('d-m-Y') }}</span> </p>
                            <p class="text-sm text-gray-800">Priorité:
                                <x-tasks.priority class="font-bold" :priorite="$task->priorite" />
                            </p>
                            <p class="text-sm text-gray-800">Echéance: <span class="font-bold"> {{ $task->echeance ? $task->echeance->format('d-m-Y') : '' }} </span></p>
                            <p class="text-sm text-gray-800">Membres:
                                <span class="font-bold text-gray-800"> {{ $task->users->pluck('name')->implode(', ') }} </span>
                            </p>
                        </div>
                    </div>

                    <div class="py-2">
                        <form method="POST" action="{{ route('task.update', $task) }}" class="space-y-4">
                            @csrf
                            @method('PATCH')

                            <div>
                                <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 @error('titre') text-red-700 @enderror">Titre</label>
                                <input required type="text" name="titre" value="{{ $task->titre }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('titre') border-red-500 bg-red-50 @enderror" placeholder="Saisir le titre">
                                @error('titre')
                                <p class="mt-2 text-sm text-red-600"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="flex space-x-6">
                                <div class="w-1/2">
                                    <label for="priorite" class="block mb-2 text-sm font-medium text-gray-900">Priorité</label>
                                    <select name="priorite" required id="priorite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option disabled>Choisir la priorité</option>
                                        <option value="faible" {{ $task->priorite == 'faible' ? 'selected' : '' }}>Faible</option>
                                        <option value="moyen" {{ $task->priorite == 'moyen' ? 'selected' : '' }}>Moyen</option>
                                        <option value="haute" {{ $task->priorite == 'haute' ? 'selected' : '' }}>Forte</option>
                                    </select>
                                </div>

                                <div class="w-1/2">
                                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 @error('echeance') text-red-700 @enderror">Echéance</label>
                                    <input type="date" value="{{ old('echeance', $task->echeance ? $task->echeance->format('Y-m-d') : '') }}" name="echeance" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('echeance') border-red-500 bg-red-50 @enderror" placeholder="Saisir l'échéance de la tâche">
                                    @error('echeance')
                                    <p class="mt-2 text-sm text-red-600"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <x-tasks.member :users="$users" :collaborateurs="$task->users" />
                            </div>

                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 @error('description') text-red-700 @enderror">Description de la tâche</label>
                                <textarea name="description" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 bg-red-50 @enderror" placeholder="Saisir la description de la tâche">{{ $task->description }}</textarea>
                                @error('description')
                                <p class="mt-2 text-sm text-red-600"> {{ $message }} </p>
                                @enderror
                            </div>

                            <button type="submit" class="text-white inline-flex items-center bg-orange-400 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="w-6 h-6 text-orange-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                                Modifier
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Colonne de droite : Section des commentaires -->
                <div >
                    <h3 class="text-lg font-semibold text-gray-900">Commentaires</h3>
                    <div class="space-y-4">
                        <div class="p-4 bg-white rounded-lg border-gray-300">
                            <x-comments.chat-bule />
                        </div>
                        <!-- Section des commentaires -->
                        <x-comments.input />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
