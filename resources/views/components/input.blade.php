@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md
focus:border-prime-blue focus:ring focus:ring-prime-blue focus:ring-opacity-50 text-lg text-prime-blue file:mr-5
file:py-2 file:px-10 file:rounded-full file:border-0 file:text-md file:text-white file:bg-gradient-to-r
file:from-dark-gold file:to-ace-gold hover:file:cursor-pointer hover:file:opacity-80']) !!}>
