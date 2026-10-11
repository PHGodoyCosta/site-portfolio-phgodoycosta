@php
    // Exceção ao design system: esta foto é colorida de propósito (decisão do Pedro).
    $aboutPhoto = '/images/alem-do-codigo.webp';

    // Terminal: cada item é [tipo, texto]. "cmd" é digitado, "out" aparece inteiro, "gap" é linha em branco.
    $terminal = [
        ['cmd', 'whoami'],
        ['out', 'Pedro Henrique Godoy Costa'],
        ['gap'],
        ['cmd', 'pwd'],
        ['out', '/home/pedro/campo-grande-ms'],
        ['gap'],
        ['cmd', 'cat hobbies.txt'],
        ['out', 'música     [ instrumento ou gênero ]'],
        ['out', 'fé         [ comunidade ]'],
        ['out', 'esporte    [ esporte ou prática ]'],
        ['gap'],
        ['cmd', 'echo $status'],
        ['out', 'código e fé, lado a lado'],
    ];

    $terminalLines = collect($terminal)->map(fn ($row) => match ($row[0]) {
        'cmd' => '<span class="vg-tk-prompt">$</span> <span class="vg-tk-f">' . e($row[1]) . '</span>',
        'out' => '<span class="vg-tk-out">' . e($row[1]) . '</span>',
        default => '',
    })->all();

    $terminalCopy = collect($terminal)->map(fn ($row) => match ($row[0]) {
        'cmd' => '$ ' . $row[1],
        'out' => $row[1],
        default => '',
    })->implode("\n");
@endphp

<x-phgodoycosta.reveal as="section" id="alem-do-codigo" class="vg-section vg-about" aria-labelledby="alem-do-codigo-titulo">
    <div class="vg-container">
        <x-phgodoycosta.section-header
            id="alem-do-codigo-titulo"
            lead="Código e produto ocupam a maior parte do meu tempo; o resto da história cabe aqui."
        >
            <x-slot:title>Além do <em class="vg-accent">código</em></x-slot:title>
        </x-phgodoycosta.section-header>

        <div class="vg-about__grid">
            <figure class="vg-about__photo">
                <img
                    src="{{ $aboutPhoto }}"
                    alt="Retrato de Pedro Henrique Godoy Costa sorrindo, de camisa branca e cruz no peito, em um jardim"
                    loading="lazy"
                >
            </figure>

            <div class="vg-about__terminal">
                <x-articles.code-block
                    variant="terminal"
                    filename="sobre.sh"
                    typing
                    :lines="$terminalLines"
                    :copy="$terminalCopy"
                />
            </div>
        </div>
    </div>
</x-phgodoycosta.reveal>
