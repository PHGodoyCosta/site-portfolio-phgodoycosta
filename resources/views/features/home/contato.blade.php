@php
    $whatsappPhone = '5567992498412';
    $whatsappText = 'Oi Pedro! Vim pelo seu site e tenho interesse nos seus serviços';
    $whatsappUrl = 'https://wa.me/' . $whatsappPhone . '?text=' . rawurlencode($whatsappText);
@endphp

<x-phgodoycosta.reveal as="section" id="contato" class="vg-cta" aria-labelledby="vg-cta-title">
    <div class="vg-cta__backdrop" aria-hidden="true">
        <premium-texture mode="velvet" intensity="0.6"></premium-texture>
    </div>

    <div class="vg-cta__inner">
        <x-phgodoycosta.badge variant="outline" dot>Disponível para novos projetos</x-phgodoycosta.badge>

        <h2 id="vg-cta-title" class="vg-t-display-lg vg-cta__title">Vamos construir o seu próximo projeto</h2>

        <p class="vg-t-body-lg vg-cta__lead">
            Me conte o que você precisa e eu respondo no mesmo dia, direto no WhatsApp.
        </p>

        <x-phgodoycosta.button
            size="lg"
            icon="si-whatsapp"
            :href="$whatsappUrl"
            target="_blank"
            rel="noopener noreferrer"
        >
            Pedir orçamento no WhatsApp <span class="vg-sr-only">(abre em nova aba)</span>
        </x-phgodoycosta.button>

        <p class="vg-t-mono-sm vg-cta__phone">+55 67 99249-8412</p>
    </div>
</x-phgodoycosta.reveal>
