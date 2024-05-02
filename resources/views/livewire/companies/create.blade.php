<div class="divide-y divide-white/5">
    <div class="max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="name" class="block text-sm font-medium leading-6 text-white">Name</label>
                    <div class="mt-2">
                        <input wire:model="name" id="name" type="text" placeholder="Company Name" class="@error('name') border-2 border-red-600 focus:ring-red-600 focus:border-0 @else border-0 focus:ring-2 focus:ring-inset focus:ring-indigo-500 @enderror block w-full rounded-md bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 sm:text-sm sm:leading-6">
                        @error('name')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="email" class="block text-sm font-medium leading-6 text-white">Email</label>
                    <div class="mt-2">
                        <input wire:model="email" id="email" type="email" placeholder="info@example.com" class="@error('email') border-2 border-red-600 focus:ring-red-600 focus:border-0 @else border-0 focus:ring-2 focus:ring-inset focus:ring-indigo-500 @enderror block w-full rounded-md bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 sm:text-sm sm:leading-6">
                        @error('email')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="email" class="block text-sm font-medium leading-6 text-white">Description</label>
                    <div class="mt-2">
                        <textarea wire:model="description" id="description" name="description" placeholder="Write something for this company..." rows="6" class="@error('description') border-2 border-red-600 focus:ring-red-600 focus:border-0 @else border-0 focus:ring-2 focus:ring-inset focus:ring-indigo-500 @enderror block w-full rounded-md bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 sm:text-sm sm:leading-6"></textarea>
                        @error('description')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="website" class="block text-sm font-medium leading-6 text-white">Website</label>
                    <div class="mt-2">
                        <input wire:model="website" id="website" type="text" placeholder="info@example.com" class="@error('email') border-2 border-red-600 focus:ring-red-600 focus:border-0 @else border-0 focus:ring-2 focus:ring-inset focus:ring-indigo-500 @enderror block w-full rounded-md bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 sm:text-sm sm:leading-6">
                        @error('website')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full flex items-center gap-x-8">
                    <img src="{{ $logo ? $logo->temporaryUrl() : $company->defaultLogoUrl() }}" alt="Company Logo" class="h-24 w-24 flex-none rounded-lg bg-gray-800 object-cover">

                    <div>
                        <label for="logo">
                            <span class="rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-white/20">Choose logo</span>
                            <p class="mt-2 text-xs leading-5 text-gray-400">JPG, GIF or PNG. 3MB max.</p>
                            <input id="logo" class="sr-only" type="file" wire:model="logo">
                            @error('logo')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                </div>

                {{-- Todo: make combobox to add categories on the company --}}
                {{-- <div class="col-span-full">
                    <label for="username" class="block text-sm font-medium leading-6 text-white">Categories</label>
                    <div class="mt-2 flex items-center">
                        <livewire:combobox />

                        <button type="button" class="rounded-md bg-white/10 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-white/20 ml-2">Add New Category</button>
                    </div>
                </div> --}}
            </div>

            <div class="mt-8 flex">
                <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
            </div>
        </form>
    </div>
</div>