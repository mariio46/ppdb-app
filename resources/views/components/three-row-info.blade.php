@props(['hide' => 'n', 'color' => 'black', 'label', 'identifier'])

<tr id="tr{{ $identifier }}" style="@if ($hide == 'y') display: none; @endif">
    <td class="pe-0 text-{{ $color }}" style="width: 35%;">{{ $label }}</td>
    <td style="width: 5%;">:</td>
    <td class="ps-0" id="{{ $identifier }}" style="width: 60%;"></td>
</tr>
