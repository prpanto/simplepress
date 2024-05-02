@props(['href', 'active'])

@php
$classes = ($active ?? false)
            ? 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 bg-gray-800 text-white'
            : 'group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white';
@endphp

<li>
  <a {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}>
    {{ $icon }}
    
    {{ $slot }}
  </a>
</li>