<div class="z-[99999999] p-2 bg-gray-900 flex flex-col">
  <h1 class="p-2 text-lg font-semibold text-white">Company Details</h1>

  <div class="flex flex-col p-2">
    <div class="p-2">
      <h3 class="text-base text-white">Logo</h3>
      <img class="mt-1 size-40" src="{{ $company->logo ? $company->logo : $company->defaultLogoUrl() }}" alt="Company Logo">
    </div>

    <div class="p-2">
      <h3 class="text-base text-white">Name</h3>
      <span class="mt-1 text-sm text-gray-500">{{ $company->name }}</span>
    </div>
  
    <div class="p-2">
      <h3 class="text-base text-white">Email</h3>
      <span class="mt-1 text-sm text-gray-500">{{ $company->email }}</span>
    </div>
  
    <div class="p-2">
      <h3 class="text-base text-white">Description</h3>
      <span class="mt-1 text-sm text-gray-500">{{ $company->description }}</span>
    </div>
    
    <div class="p-2">
      <h3 class="text-base text-white">Website</h3>
      <a href="{{ $company->website }}" target="_blank" class="mt-1 underline text-sm text-gray-500 hover:text-gray-400">{{ $company->website }}</a>
    </div>
  </div>
</div>