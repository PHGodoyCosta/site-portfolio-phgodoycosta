@extends('layouts.minimal')

@section('title', 'Pedro Henrique Godoy Costa — links')

@section('meta')
    <meta name="description" content="Todos os meus links em um lugar: WhatsApp, Hidem, portfólio, LinkedIn, GitHub e Instagram.">
    <meta name="robots" content="index, follow">
@endsection

@section('content')
<main class="vg-tree">
    <div class="vg-tree__backdrop" aria-hidden="true">
        <premium-texture mode="velvet" intensity="0.6"></premium-texture>
    </div>

    <x-phgodoycosta.reveal class="vg-tree__inner">
        <x-tree.profile
            name="Pedro Henrique Godoy Costa"
            role="Desenvolvedor Full Stack · CTO e fundador da Hidem"
            photo="/images/perfil-tree.jpg"
            photo-alt="Retrato em preto e branco de Pedro Henrique Godoy Costa"
        />

        <nav aria-label="Meus links">
            <ul class="vg-tree__links">
                <li>
                    <x-tree.link
                        label="Pedir orçamento"
                        meta="WhatsApp"
                        brand="whatsapp"
                        href="https://wa.me/5567992498412?text=Oi%20Pedro!%20Vim%20pelo%20seu%20site%20e%20tenho%20interesse%20nos%20seus%20servi%C3%A7os"
                    />
                </li>
                <li>
                    <x-tree.link
                        label="Configure um agente no seu whatsapp"
                        meta="hidem.com.br"
                        wordmark="hidem-logo.svg"
                        href="https://hidem.com.br"
                    />
                </li>
                <li>
                    <x-tree.link
                        label="Ver o site completo"
                        meta="phgodoycosta.com.br"
                        ichthys
                        href="https://phgodoycosta.com.br"
                    />
                </li>
                <li>
                    <x-tree.link
                        label="Conectar no LinkedIn"
                        meta="/phgodoycosta"
                        brand="linkedin"
                        href="https://www.linkedin.com/in/phgodoycosta/"
                    />
                </li>
                <li>
                    <x-tree.link
                        label="Ver repositórios no GitHub"
                        meta="/PHGodoyCosta"
                        brand="github"
                        href="https://github.com/PHGodoyCosta"
                    />
                </li>
                <li>
                    <x-tree.link
                        label="Seguir no Instagram"
                        meta="@phgodoycosta"
                        brand="instagram"
                        href="https://www.instagram.com/phgodoycosta/"
                    />
                </li>
            </ul>
        </nav>

        <footer class="vg-tree__footer vg-t-caption">
            <x-phgodoycosta.ichthys :size="28" />
            <span>&copy; {{ date('Y') }} Pedro Henrique Godoy Costa</span>
        </footer>
    </x-phgodoycosta.reveal>
</main>

<script src="/js/premium-texture.js" defer></script>
@endsection
