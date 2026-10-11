@props([
    'id' => null,
    'index' => null,
    'label' => null,
    'lead' => null,
])

{{-- O título vem no slot "title", para aceitar <span class="vg-fade"> ou <em class="vg-accent">. --}}
<header {{ $attributes->class(['vg-section-header']) }}>
    @if ($label)
        <x-phgodoycosta.section-label :index="$index">
            {{ $label }}
            @isset($symbol)
                <x-slot:symbol>{{ $symbol }}</x-slot:symbol>
            @endisset
        </x-phgodoycosta.section-label>
    @endif

    <h2 @if ($id) id="{{ $id }}" @endif class="vg-section-header__title vg-t-display-md">{{ $title }}</h2>

    @if ($lead)
        <p class="vg-section-header__lead vg-t-body-lg">{{ $lead }}</p>
    @endif
</header>
