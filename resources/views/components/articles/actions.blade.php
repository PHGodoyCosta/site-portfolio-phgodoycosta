@props([
    'onCopyLink' => null,
    'onShare' => null,
])

<div {{ $attributes->class(['vg-actions']) }} role="toolbar" aria-label="Ações do artigo" x-data="{ saved: false }">
    <x-phgodoycosta.button variant="ghost" size="sm" icon="link" @click="{{ $onCopyLink ?? 'navigator.clipboard?.writeText(window.location.href)' }}">
        Copiar link
    </x-phgodoycosta.button>

    <x-phgodoycosta.button variant="ghost" size="sm" icon="share-2" @click="{{ $onShare ?? 'navigator.share?.({ url: window.location.href })' }}">
        Compartilhar
    </x-phgodoycosta.button>

    {{ $slot }}

    <span class="vg-actions__spacer"></span>

    <x-phgodoycosta.button variant="ghost" size="sm" icon="bookmark" x-bind:aria-pressed="saved" @click="saved = !saved">
        <span x-text="saved ? 'Salvo' : 'Salvar'">Salvar</span>
    </x-phgodoycosta.button>
</div>
