<div class="z-[99999999] p-2 bg-gray-900 flex flex-col">
  <h1 class="p-2 text-lg font-semibold text-white">Employee Details</h1>

  <div class="flex flex-col p-2">
    <div class="p-2">
      <h3 class="text-base text-white">Name</h3>
      <span class="mt-1 text-sm text-gray-500">{{ $employee->fullname }}</span>
    </div>
  
    <div class="p-2">
      <h3 class="text-base text-white">Email</h3>
      <span class="mt-1 text-sm text-gray-500">{{ $employee->email }}</span>
    </div>
  
    <div class="p-2">
      <h3 class="text-base text-white">Description</h3>
      <span class="mt-1 text-sm text-gray-500">{{ $employee->phone }}</span>
    </div>
  </div>
</div>