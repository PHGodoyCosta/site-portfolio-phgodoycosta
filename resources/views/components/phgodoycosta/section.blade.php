@props([
    'id' => null,
    'index' => null,
    'label' => null,
    'lead' => null,
    'wide' => false,
    'tight' => false,
])

@php $titleId = $id ? $id . '-titulo' : null; @endphp

<x-phgodoycosta.reveal
    as="section"
    :id="$id"
    :aria-labelledby="$titleId"
    :class="$tight ? 'vg-section vg-section--tight' : 'vg-section'"
>
    <div @class(['vg-container', 'vg-container--wide' => $wide])>
        <x-phgodoycosta.section-header :id="$titleId" :index="$index" :label="$label" :lead="$lead">
            <x-slot:title>{{ $title }}</x-slot:title>
        </x-phgodoycosta.section-header>

        {{ $slot }}
    </div>
</x-phgodoycosta.reveal>
