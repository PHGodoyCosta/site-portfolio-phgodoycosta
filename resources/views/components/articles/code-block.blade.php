@props([
    'lines' => [],
    'copy' => '',
    'language' => 'ts',
    'filename' => null,
    'lineNumbers' => false,
    'variant' => 'code',
    'typing' => false,
])

@php $terminal = $variant === 'terminal'; @endphp

<div
    class="vg-code"
    role="group"
    aria-label="{{ $filename ? 'Código: ' . $filename : 'Bloco de código' }}"
    @if ($typing) x-type-on-view @endif
    x-data="{
        copied: false,
        async copy() {
            try {
                await navigator.clipboard.writeText(@js($copy));
                this.copied = true;
                setTimeout(() => this.copied = false, 1600);
            } catch (e) {}
        },
    }"
>
    <div class="vg-code__bar">
        <span class="vg-code__file vg-t-mono-sm">
            <x-icon :name="$terminal ? 'terminal' : 'code-xml'" :size="14" />
            {{ $filename ?: ($terminal ? 'terminal' : $language) }}
        </span>
        @unless ($terminal)
            <span class="vg-code__lang vg-t-label">{{ $language }}</span>
        @endunless
        <button
            type="button"
            class="vg-btn vg-btn--ghost vg-btn--sm vg-btn--icon vg-code__copy"
            @if ($terminal) style="margin-left: auto" @endif
            aria-label="Copiar código"
            x-bind:data-copied="copied"
            x-on:click="copy()"
        >
            <span x-show="!copied"><x-icon name="copy" :size="14" /></span>
            <span x-show="copied" x-cloak><x-icon name="check" :size="14" /></span>
        </button>
        <span class="vg-sr-only" role="status" x-text="copied ? 'Código copiado' : ''"></span>
    </div>
    @if ($typing)
        {{-- Enquanto o texto é digitado, o leitor de tela lê esta cópia completa. --}}
        <span class="vg-sr-only">{{ $copy }}</span>
    @endif
    <pre class="vg-code__body vg-t-mono" @if ($typing) aria-hidden="true" @endif><code>@foreach ($lines as $i => $line)<span class="vg-code__line">@if ($lineNumbers)<span class="vg-code__ln" aria-hidden="true">{{ $i + 1 }}</span>@endif{!! $line !!}</span>@endforeach</code></pre>
</div>
