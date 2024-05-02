<x-app-layout>
  <div class="border-t border-white/10 pt-9">
    <div class="flex items-center justify-between">
      <h2 class="px-4 text-base font-semibold leading-7 text-white sm:px-6 lg:px-8">Employees Table</h2>
      
      <div class="px-4">
        @if (auth()->user()->can('create:employees'))
          <a href="{{ route('employees.create') }}" class="text-gray-900 text-sm font-semibold bg-orange-500 px-2.5 py-1 rounded-md flex items-center space-x-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

            <span class="font-semibold">Create New</span>
          </a>
        @endif
      </div>
    </div>
  </div>
  
  <livewire:employees.table />
</x-app-layout>
