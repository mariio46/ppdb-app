@props([
    'variant' => 'default',
    'color' => 'primary',
])

@php
    $variantClasses = [
        'default' => 'bg-',
        'light' => 'bg-light-',
    ];

    $colorClasses = [
        'primary' => 'primary',
        'secondary' => 'secondary',
        'success' => 'success',
        'danger' => 'danger',
        'warning' => 'warning',
        'info' => 'info',
        'dark' => 'dark',
    ];

    $classes = 'badge' . ' ' . $variantClasses[$variant] . $colorClasses[$color];
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</span>
