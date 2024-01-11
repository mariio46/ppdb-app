@props(['marginY' => '2'])

<div {{ $attributes->merge(['class' => "clearfix border-bottom my-{$marginY}"]) }}></div>
