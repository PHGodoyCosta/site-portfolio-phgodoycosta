@props([
    'items' => [],
])

<dl {{ $attributes->class(['vg-meta', 'vg-t-body-sm']) }}>
    @foreach ($items as $item)
        <dt class="vg-t-label">{{ $item['label'] }}</dt>
        <dd @class(['vg-meta__chips' => isset($item['chips'])])>
            @if (isset($item['chips']))
                @foreach ($item['chips'] as $chip)
                    <x-phgodoycosta.badge>{{ $chip }}</x-phgodoycosta.badge>
                @endforeach
            @elseif (isset($item['href']))
                <a class="vg-link" href="{{ $item['href'] }}" target="_blank" rel="noopener noreferrer">
                    {{ $item['value'] }}
                    <x-icon name="arrow-up-right" :size="14" />
                    <span class="vg-sr-only"> (abre em nova aba)</span>
                </a>
            @elseif (isset($item['badge']))
                <x-phgodoycosta.badge :variant="$item['badge']" dot>{{ $item['value'] }}</x-phgodoycosta.badge>
            @else
                {{ $item['value'] }}
            @endif
        </dd>
    @endforeach
</dl>
