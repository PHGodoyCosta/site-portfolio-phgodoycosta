@props([
    'as' => 'div',
    'pad' => false,
    'interactive' => false,
    'raised' => false,
])

<{{ $as }} {{ $attributes->class([
    'vg-card',
    'vg-card--pad' => $pad,
    'vg-card--interactive' => $interactive,
    'vg-card--raised' => $raised,
]) }}>{{ $slot }}</{{ $as }}>
