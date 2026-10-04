@props([
    'title',
    'skills' => [],
])

<div {{ $attributes->class(['vg-skill-group']) }}>
    <div class="vg-skill-group__header">
        <span class="vg-t-label vg-skill-group__title">{{ $title }}</span>
        <span class="vg-t-label vg-skill-group__count">{{ sprintf('%02d', count($skills)) }}</span>
    </div>

    <div class="vg-skill-group__grid">
        @foreach ($skills as $skill)
            <x-phgodoycosta.skill-tile
                :name="$skill['name']"
                :icon="$skill['icon'] ?? null"
                :mono="$skill['mono'] ?? null"
            />
        @endforeach
    </div>
</div>
