@props([
    'items' => [],
])

<ol {{ $attributes->class(['vg-timeline']) }}>
    @foreach ($items as $item)
        <x-phgodoycosta.timeline-item
            :year="$item['year']"
            :title="$item['title']"
            :excerpt="$item['excerpt'] ?? null"
            :body="$item['body'] ?? null"
            :default-open="$item['defaultOpen'] ?? false"
        />
    @endforeach
</ol>
