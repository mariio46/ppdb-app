@props(['modal_id', 'label_by', 'align' => ''])

<div id="{{ $modal_id }}" aria-labelledby="{{ $label_by }}" aria-hidden="true" tabindex="-1" {{ $attributes->merge(['class' => 'modal fade']) }}>
    <div class="modal-dialog {{ $align }}">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
