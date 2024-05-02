<div class="divide-y divide-white/5">
    <div class="max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="fullname" class="block text-sm font-medium leading-6 text-white">Fullname</label>
                    <div class="mt-2">
                        <input wire:model="fullname" id="fullname" type="text" placeholder="Fullname" class="@error('fullname') border-2 border-red-600 focus:ring-red-600 focus:border-0 @else border-0 focus:ring-2 focus:ring-inset focus:ring-indigo-500 @enderror block w-full rounded-md bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 sm:text-sm sm:leading-6">
                        @error('fullname')
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
                    <label for="phone" class="block text-sm font-medium leading-6 text-white">Phone</label>
                    <div class="mt-2">
                        <input wire:model="phone" id="phone" type="phone" placeholder="+30 123456789" class="@error('phone') border-2 border-red-600 focus:ring-red-600 focus:border-0 @else border-0 focus:ring-2 focus:ring-inset focus:ring-indigo-500 @enderror block w-full rounded-md bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 sm:text-sm sm:leading-6">
                        @error('phone')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-8 flex">
                <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
            </div>
        </form>
    </div>
</div>
