@props(['identifier', 'label', 'variant' => 'primary'])

<div class="form-check form-check-{{ $variant }}">
    <input id="{{ $identifier }}" name="{{ $identifier }}" type="checkbox" {{ $attributes->merge(['class' => 'form-check-input']) }}>
    <x-label for="{{ $identifier }}">{{ $label }}</x-label>
</div>
