<div>
    <div class="relative overflow-x-auto">
        <table class="w-full mt-6 w-full whitespace-nowrap text-left">
            <thead class="border-b border-white/10 text-sm leading-6 text-white">
                <tr>
                    <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Id</th>
                    <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Name</th>
                    <th scope="col" class="py-2 pl-4 pr-8 font-semibold">Email</th>
                    <th scope="col" class="py-2 pl-4 pr-4 text-right font-semibold sm:pr-8 sm:text-left lg:pr-20">Description</th>
                    <th scope="col" class="py-2 pl-4 pr-8 font-semibold lg:pr-20">Website</th>
                    <th scope="col" class="py-2 pl-4 pr-8 font-semibold lg:pr-20">Logo</th>
                    <th scope="col" class="py-2 pl-4 pr-8 font-semibold lg:pr-20">Categories</th>
                    <th scope="col" class="py-2 pl-4 pr-4 text-right font-semibold sm:pr-6 lg:pr-8">Created At</th>
                    <th scope="col" class="py-2 pl-4 pr-4 sm:pr-6 lg:pr-8"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach ($companies as $company)
                    <tr>
                        <td class="py-4 pl-4 pr-4 sm:pl-6 lg:pl-8">
                            <span class="truncate text-sm font-medium leading-6 text-gray-200">{{ $company->id }}</span>
                        </td>
                        <td class="py-4 pl-4 pr-4 sm:pl-6 lg:pl-8">
                            <span class="truncate text-sm font-medium leading-6 text-gray-200">{{ $company->name }}</span>
                        </td>
                        <td class="py-4 pl-4 pr-4 sm:pr-8">
                            <span class="text-sm text-gray-400">{{ $company->email }}</span>
                        </td>
                        <td class="py-4 pl-4 pr-4 text-sm leading-6 sm:pr-8 lg:pr-20">
                            <p class="text-gray-400 line-clamp-1 whitespace-normal">{{ $company->description }}</p>
                        </td>
                        <td class="py-4 pl-4 pr-4 text-sm leading-6 text-gray-400 lg:pr-20">
                            <a href="{{ $company->website }}" target="_blank" class="underline">{{ $company->website }}</a>
                        </td>
                        <td class="py-4 pl-4 pr-4 text-sm leading-6 text-gray-400 lg:pr-20">
                            <img class="size-10" src="{{ $company->logo ? $company->logo : $company->defaultLogoUrl() }}" alt="Company Logo">
                        </td>
                        <td class="py-4 pl-4 pr-4 sm:pr-6 lg:pr-8">
                            <div class="flex items-center">
                                <select class="py-1 bg-gray-900 border-gray-600 text-white {{ auth()->user()->can('add:company-categories') ? 'border-r-0 rounded-l' : 'border rounded' }} focus:border-1 focus:border-gray-600 focus:ring-0">
                                    <option value="" disabled selected>Company categories</option>
                                    @foreach ($company->categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                
                                @if(auth()->user()->can('add:company-categories'))
                                    <div class="group relative">
                                        <span class="group-hover:visible group-hover:z-50 invisible absolute -top-10 -left-12 border px-1.5 py-0.5 text-sm border-gray-400 text-gray-400">Add new category</span>
        
                                        <button class="flex items-center text-white border border-gray-600 rounded-r p-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="py-4 pl-4 pr-4 text-right text-sm leading-6 text-gray-400 sm:pr-6 lg:pr-8">
                            <time datetime="{{ $company->created_at }}">{{ $company->created_at->diffForHumans() }}</time>
                        </td>
                        <td class="py-4 pl-4 sm:pr-8 text-sm">
                            <div class="flex items-center space-x-2">
                                @if (auth()->user()->can('view:companies'))
                                    <livewire:companies.table-view :id="$company->id" />
                                @endif
                                @if (auth()->user()->can('edit:companies'))
                                    <a href="{{ route('companies.edit', $company->id) }}" class="text-gray-900 text-sm font-semibold bg-yellow-400 px-2.5 py-1 rounded-md flex items-center space-x-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 shrink-0 text-gray-900">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
        
                                        <span>Edit</span>
                                    </a>
                                @endif
                                @if (auth()->user()->can('delete:companies'))
                                    <livewire:companies.table-delete :id="$company->id" />
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-4 flex flex-col">
        <div class="flex items-center space-x-2">
            <span class="text-gray-400">Per page</span>
            <select wire:model.live="perPage" class="rounded-md bg-gray-900 text-white border focus:border-gray-400 focus:ring-0">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25" selected>25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

        <div class="mt-4 first:[&_p]:text-gray-400">
            {{ $companies->links() }}
        </div>
    </div>
</div>