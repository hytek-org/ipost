@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-indigo-600 dark:text-indigo-400 text-sm font-medium leading-5   transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 dark:text-gray-200 hover:text-gray-400 dark:hover:text-gray-400 text-sm font-medium leading-5   focus:text-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
