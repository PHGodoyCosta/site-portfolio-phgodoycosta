@props([
    'title',
    'description' => null,
    'stack' => [],
    'href' => '#',
    'repoHref' => null,
    'media' => null,
    'mediaLabel' => 'captura de tela',
    'status' => null,
    'featured' => false,
    'cta' => 'Ler estudo de caso',
])

<x-phgodoycosta.card as="article" interactive {{ $attributes->class(['vg-project', 'vg-project--featured' => $featured]) }}>
    <div class="vg-project__media">
        @if ($media)
            <img src="{{ $media }}" alt="">
        @else
            <x-phgodoycosta.slot :label="$mediaLabel" />
        @endif
    </div>

    <div class="vg-project__body">
        @if ($status)
            <div class="vg-project__kicker">
                <x-phgodoycosta.badge :variant="$status['variant'] ?? 'ice'" dot>{{ $status['label'] }}</x-phgodoycosta.badge>
            </div>
        @endif

        <h3 class="vg-project__title {{ $featured ? 'vg-t-heading-md' : 'vg-t-heading-sm' }}">
            <a href="{{ $href }}">{{ $title }}</a>
        </h3>

        @if ($description)
            <p class="vg-project__desc {{ $featured ? 'vg-t-body' : 'vg-t-body-sm' }}">{{ $description }}</p>
        @endif

        @if (count($stack) > 0)
            <ul class="vg-project__stack" aria-label="Tecnologias">
                @foreach ($stack as $item)
                    @php $techSlug = \Illuminate\Support\Str::slug(str_replace('#', '-sharp', $item)); @endphp
                    <li><x-phgodoycosta.badge :class="'vg-badge--tech vg-tech-' . $techSlug">{{ $item }}</x-phgodoycosta.badge></li>
                @endforeach
            </ul>
        @endif

        <div class="vg-project__foot">
            <span class="vg-project__cta vg-t-ui">
                {{ $cta }}
                <x-icon name="arrow-right" :size="16" />
            </span>

            @if ($repoHref)
                <x-phgodoycosta.button
                    :href="$repoHref"
                    variant="ghost"
                    size="sm"
                    icon="git-branch"
                    icon-only
                    class="vg-project__repo"
                    :aria-label="'Repositório de ' . $title"
                    target="_blank"
                    rel="noopener noreferrer"
                />
            @endif
        </div>
    </div>
</x-phgodoycosta.card>
