@props([
    'name',
    'role' => null,
    'location' => null,
    'status' => null,
    'photo' => null,
    'photoAlt' => null,
    'links' => [],
])

<div {{ $attributes->class(['vg-profile-card']) }}>
    <div class="vg-profile-card__photo">
        @if ($photo)
            <img src="{{ $photo }}" alt="{{ $photoAlt ?? '' }}">
        @else
            <x-phgodoycosta.slot label="foto em preto e branco" fill />
        @endif
    </div>

    <div class="vg-profile-card__body">
        <h2 class="vg-t-heading-md vg-profile-card__name">{{ $name }}</h2>

        @if ($role)
            <p class="vg-t-body-sm vg-profile-card__role">{!! $role !!}</p>
        @endif

        @if ($location || $status)
            <div class="vg-profile-card__badges">
                @if ($location)
                    <x-phgodoycosta.badge variant="outline">
                        <x-icon name="map-pin" :size="13" />
                        {{ $location }}
                    </x-phgodoycosta.badge>
                @endif

                @if ($status)
                    <x-phgodoycosta.badge variant="sand" dot>{{ $status }}</x-phgodoycosta.badge>
                @endif
            </div>
        @endif

        @if (count($links))
            <ul class="vg-profile-card__links">
                @foreach ($links as $link)
                    <li>
                        <a
                            href="{{ $link['href'] }}"
                            class="vg-profile-card__link"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <span class="vg-t-ui">{{ $link['label'] }}</span>
                            <span class="vg-profile-card__link-meta">
                                <span class="vg-t-mono-sm">{{ $link['handle'] }}</span>
                                <x-icon name="external-link" :size="14" />
                            </span>
                            <span class="vg-sr-only">(abre em nova aba)</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
