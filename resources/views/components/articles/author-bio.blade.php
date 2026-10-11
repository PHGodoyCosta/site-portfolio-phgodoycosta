@props([
    'name',
    'role' => null,
    'text' => '[ Uma ou duas frases sobre quem escreve. ]',
    'avatar' => '/images/perfil-tree.jpg',
])

<x-phgodoycosta.card as="aside" aria-label="Sobre o autor" {{ $attributes->class(['vg-bio']) }}>
    <x-phgodoycosta.avatar :name="$name" :src="$avatar" size="lg" />
    <div class="vg-bio__body">
        <p class="vg-bio__name vg-t-heading-sm">{{ $name }}</p>
        @if ($role)
            <p class="vg-bio__role vg-t-body-sm">{{ $role }}</p>
        @endif
        <p class="vg-bio__text vg-t-body">{{ $text }}</p>
        @if ($slot->isNotEmpty())
            <div class="vg-bio__links">{{ $slot }}</div>
        @endif
    </div>
</x-phgodoycosta.card>
