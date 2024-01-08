@props(['id', 'label', 'ph' => null, 'search' => 'y'])

<div class="mb-1">
    <x-label for="{{ $id }}">{{ $label }}</x-label>
    <select class="form-select select2" id="{{ $id }}" name="{{ $id }}" data-placeholder="{{ $ph == null ? $label : $ph }}" {!! $search == 'y' ? '' : 'data-minimum-results-for-search="-1"' !!}>
        <option value=""></option>
        {{ $slot }}
    </select>
</div>
