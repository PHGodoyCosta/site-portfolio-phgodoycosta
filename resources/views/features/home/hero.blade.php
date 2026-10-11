@php
    $hidemLogoPath = public_path('brand/hidem-logo.svg');
    $hidemMark = is_file($hidemLogoPath) ? file_get_contents($hidemLogoPath) : 'hidem';

    $hidemLink = '<a href="https://hidem.com.br" target="_blank" rel="noopener noreferrer" class="vg-hidem-link">'
        . '<span class="vg-hidem-logo">' . $hidemMark . '</span>'
        . '<span class="vg-sr-only">hidem (abre em nova aba)</span>'
        . '</a>';

    $profileRole = 'Desenvolvedor Full Stack · CTO e fundador da ' . $hidemLink;
@endphp

<x-phgodoycosta.reveal as="section" id="sobre-mim" class="vg-hero" aria-labelledby="vg-hero-title">
    <div class="vg-hero__backdrop" aria-hidden="true">
        <premium-texture mode="velvet" intensity="0.6"></premium-texture>
    </div>

    <div class="vg-hero__inner">
        <div class="vg-hero__content">
            <div class="vg-hero__eyebrow">
                <x-phgodoycosta.badge variant="outline">
                    <x-icon name="map-pin" :size="13" />
                    Campo Grande, MS
                </x-phgodoycosta.badge>
                <x-phgodoycosta.badge variant="outline">CTO e fundador da Hidem</x-phgodoycosta.badge>
                <x-phgodoycosta.badge variant="outline">UFMS</x-phgodoycosta.badge>
            </div>

            <h1 id="vg-hero-title" class="vg-t-display-xl vg-hero__title">
                Transformo ideias em <em class="vg-accent">soluções práticas</em>
            </h1>

            <ul class="vg-hero__services vg-t-body-lg">
                @foreach ([
                    ['terminal', 'Desenvolver aplicativos para celulares android e iphone.'],
                    ['code-xml', 'Sites e sistemas completos.'],
                    ['arrow-right', 'Landing Pages e fluxos de venda.'],
                    ['bot', 'Automações com I.A e criação de agentes'],
                    ['si-whatsapp', 'Integração de I.A no Whatsapp'],
                ] as [$icon, $label])
                    <li><x-icon :name="$icon" :size="20" /><span>{{ $label }}</span></li>
                @endforeach
            </ul>

            <p class="vg-t-body-lg vg-hero__lead">
                Uso tecnologia para resolver problemas reais. Cada projeto que construo carrega o meu esforço e a vontade de criar um impacto duradouro.
            </p>

            <div class="vg-hero__actions">
                <x-phgodoycosta.button size="lg" icon-right="arrow-right" href="#portfolio">
                    Ver projetos
                </x-phgodoycosta.button>

                <a
                    href="https://wa.me/5567992498412?text=Oi%20Pedro!%20Vim%20pelo%20seu%20site%20e%20tenho%20interesse%20nos%20seus%20servi%C3%A7os"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="vg-btn vg-btn--whatsapp vg-btn--lg vg-t-ui"
                >
                    <x-icon name="si-whatsapp" />
                    <span>Pedir orçamento</span>
                    <span class="vg-sr-only">(abre em nova aba)</span>
                </a>
            </div>
        </div>

        <div class="vg-hero__aside">
            <x-phgodoycosta.profile-card
                name="Pedro Henrique Godoy Costa"
                :role="$profileRole"
                {{-- location="Campo Grande, MS" --}}
                photo="/images/perfil-hero.jpg"
                photo-alt="Retrato em preto e branco de Pedro Henrique Godoy Costa, de braços cruzados"
                :links="[
                    ['label' => 'LinkedIn', 'handle' => '/phgodoycosta', 'href' => 'https://www.linkedin.com/in/phgodoycosta/'],
                    ['label' => 'GitHub', 'handle' => '/phgodoycosta', 'href' => 'https://github.com/PHGodoyCosta'],
                    ['label' => 'Todos os links', 'handle' => '/tree', 'href' => '/tree'],
                ]"
            />
        </div>
    </div>
</x-phgodoycosta.reveal>

<script src="/js/premium-texture.js" defer></script>
