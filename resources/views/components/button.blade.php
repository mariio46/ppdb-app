@props([
    'variant' => 'default',
    'color' => 'primary',
    'withIcon' => false,
])

@php
    $variantClasses = [
        'default' => 'btn-',
        'outline' => 'btn-outline-',
        'flat' => 'btn-flat-',
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

    $icon = $withIcon == true ? 'btn-icon' : '';

    $classes = 'btn' . ' ' . $icon . ' ' . $variantClasses[$variant] . $colorClasses[$color];
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
