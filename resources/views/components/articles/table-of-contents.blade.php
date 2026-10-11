@props([
    'items' => [],
    'title' => 'Neste artigo',
])

{{-- Acompanha a rolagem: o item ativo é o último h2 que já passou de 120px do topo. --}}
<nav
    {{ $attributes->class(['vg-toc']) }}
    aria-label="{{ $title }}"
    x-data="{
        active: @js($items[0]['id'] ?? null),
        init() {
            const update = () => {
                let current = this.active;
                document.querySelectorAll('.vg-prose h2[id]').forEach((h) => {
                    if (h.getBoundingClientRect().top <= 120) current = h.id;
                });
                this.active = current;
            };
            window.addEventListener('scroll', update, { passive: true });
            update();
        },
    }"
>
    <h2 class="vg-toc__title vg-t-label">{{ $title }}</h2>
    <ul class="vg-toc__list vg-t-ui">
        @foreach ($items as $item)
            <li>
                <a class="vg-toc__link" href="#{{ $item['id'] }}" x-bind:aria-current="active === '{{ $item['id'] }}' ? 'true' : null">{{ $item['label'] }}</a>
            </li>
        @endforeach
    </ul>
</nav>
