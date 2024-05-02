<div x-data="listbox" class="max-w-md relative">
    <div class="text-gray-500 border border-gray-500 px-2.5 py-1.5 rounded-md flex items-center space-x-2" @click="open ^= true" @click.away="open = false">
        <span class="text-sm select-none">Select a category</span>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>          
    </div>

    <div ref="listbox" x-show="open" class="absolute top-10 -left-1 bg-gray-800 p-1 border border-gray-500 w-40 text-gray-500">
        <div class="mb-2 flex flex-col">
            @foreach ($categories as $category)
                <div class="hover:bg-gray-700 hover:text-gray-300 p-1 select-none">{{ $category->name }}</div>
            @endforeach
        </div>

        <button class="p-1 border-t border-gray-500 w-full text-left">
            Load more
        </button>
    </div>
</div>


{{-- <div class="max-w-xs">
    <div x-data="combobox2({ data:  })" @click.away="closeListbox()" class="relative">
        <span class="inline-block w-full rounded-md shadow-sm">
            <button x-ref="button" @click="toggleListboxVisibility()" :aria-expanded="open" aria-haspopup="listbox" class="focus:shadow-outline-blue relative z-0 w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out focus:border-blue-300 focus:outline-none sm:text-sm sm:leading-5">
                <span x-show="! open" x-text="value in options ? options[value] : placeholder" :class="{ 'text-gray-500': !(value in options) }" class="block truncate"></span>

                <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                        <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
            </button>
        </span>

        <div x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak class="absolute z-10 mt-1 w-full rounded-md bg-white shadow-lg">
            <ul x-ref="listbox" role="listbox" :aria-activedescendant="focusedOptionIndex ? name + 'Option' + focusedOptionIndex : null" tabindex="-1" class="shadow-xs max-h-60 overflow-auto rounded-md py-1 text-base leading-6 focus:outline-none sm:text-sm sm:leading-5">
                <template x-for="(key, index) in Object.keys(options)" :key="index">
                    <li :id="name + 'Option' + focusedOptionIndex" @click="selectOption()" role="option" :aria-selected="focusedOptionIndex === index" :class="{ 'text-white bg-indigo-600': index === focusedOptionIndex, 'text-gray-900': index !== focusedOptionIndex }" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900">
                        <span x-text="Object.values(options)[index]" :class="{ 'font-semibold': index === focusedOptionIndex, 'font-normal': index !== focusedOptionIndex }" class="block truncate font-normal"></span>

                        <span x-show="key === value" :class="{ 'text-white': index === focusedOptionIndex, 'text-indigo-600': index !== focusedOptionIndex }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div> --}}
