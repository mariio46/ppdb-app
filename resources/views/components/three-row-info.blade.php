@props(['hide' => 'n', 'color' => 'black', 'label', 'identifier', 'value' => ''])

<tr id="tr{{ $identifier }}" style="@if ($hide == 'y') display: none; @endif">
    <td class="px-0 fw-bold text-break text-{{ $color }}" style="width: 35%;">{{ $label }}</td>
    <td class="px-1 fw-bold" style="width: 5%;">:</td>
    <td class="px-0 text-break text-black fw-normal" id="{{ $identifier }}" style="width: 60%;">{{ $value }}</td>
</tr>
