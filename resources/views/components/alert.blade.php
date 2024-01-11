@props(['variant' => 'primary'])

<div role="alert" {{ $attributes->merge(['class' => "alert alert-{$variant} alert-dismissible fade show my-2"]) }}>
    <div class="alert-body p-2">
        <span>{{ $slot }}</span>
    </div>
</div>
