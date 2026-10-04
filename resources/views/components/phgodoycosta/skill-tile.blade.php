@props([
    'name',
    'icon' => null,
    'mono' => null,
])

<div {{ $attributes->class(['vg-skill-tile']) }}>
    <span class="vg-skill-tile__logo" aria-hidden="true">
        @if ($icon)
            {!! svg('si-' . $icon)->toHtml() !!}
        @else
            <span class="vg-skill-tile__mono">{{ $mono }}</span>
        @endif
    </span>
    <span class="vg-t-ui-sm vg-skill-tile__name">{{ $name }}</span>
</div>
