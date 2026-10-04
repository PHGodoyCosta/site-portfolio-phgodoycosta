@props([
    'name',
    'role' => null,
    'photo' => null,
    'photoAlt' => null,
])

<header {{ $attributes->class(['vg-tree-profile']) }}>
    <div class="vg-tree-profile__photo">
        @if ($photo)
            <img src="{{ $photo }}" alt="{{ $photoAlt ?? '' }}" width="400" height="400">
        @else
            <x-phgodoycosta.slot label="foto em preto e branco" fill />
        @endif
    </div>

    <h1 class="vg-t-heading-lg vg-tree-profile__name">{{ $name }}</h1>

    @if ($role)
        <p class="vg-t-body-sm vg-tree-profile__role">{{ $role }}</p>
    @endif
</header>
