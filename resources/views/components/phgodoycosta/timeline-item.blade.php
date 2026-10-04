@props([
    'year',
    'title',
    'excerpt' => null,
    'body' => null,
    'defaultOpen' => false,
])

@php
    $collapseId = 'timeline-' . Str::random(8);
@endphp

<li
    class="vg-timeline__item"
    x-data="{ open: @js((bool) $defaultOpen) }"
    :data-open="open"
>
    <span class="vg-timeline__year vg-t-mono-sm">{{ $year }}</span>

    <div class="vg-timeline__rail" aria-hidden="true">
        <span class="vg-timeline__node"></span>
    </div>

    <div class="vg-timeline__content">
        <h3 class="vg-timeline__title vg-t-heading-sm">{{ $title }}</h3>

        @if ($excerpt)
            <p class="vg-timeline__excerpt vg-t-body">{{ $excerpt }}</p>
        @endif

        @if ($body)
            <div id="{{ $collapseId }}" class="vg-collapse" :data-open="open" :inert="!open">
                <div>
                    <div class="vg-timeline__body vg-t-body">{{ $body }}</div>
                </div>
            </div>

            <x-phgodoycosta.button
                variant="link"
                class="vg-timeline__toggle"
                icon-right="chevron-down"
                :aria-controls="$collapseId"
                x-bind:aria-expanded="open.toString()"
                @click="open = !open"
            >
                <span x-text="open ? 'Ler menos' : 'Ler mais'">Ler mais</span>
            </x-phgodoycosta.button>
        @endif
    </div>
</li>
