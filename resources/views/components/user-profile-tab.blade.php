@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'whitespace-nowrap border-b-2 border-prime-blue py-4 px-1 text-gray-900'
                : 'whitespace-nowrap border-b-2 border-transparent py-4 px-1 text-gray-500 hover:border-ace-gold hover:text-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
