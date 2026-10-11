@props([
    'title' => null,
    'icon' => 'info',
])

<aside class="vg-callout" role="note">
    <x-icon :name="$icon" :size="18" />
    <div>
        @if ($title)
            <span class="vg-callout__title vg-t-label">{{ $title }}</span>
        @endif
        {{ $slot }}
    </div>
</aside>
