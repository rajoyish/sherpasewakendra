@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'group flex items-center rounded-md bg-dark-gold px-2 py-2 text-white'
                : 'group flex items-center rounded-md px-2 py-2 text-white hover:bg-ace-gold';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
