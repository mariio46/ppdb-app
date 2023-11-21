@props(['values'])

<div {{ $attributes->merge(['class' => 'invalid-feedback']) }}>
    @foreach ((array) $values as $value)
        <li>{{ $value }}</li>
    @endforeach
</div>
