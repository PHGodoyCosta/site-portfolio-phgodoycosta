// x-type-on-view: digita o conteúdo de um bloco de código uma única vez, quando ele entra na tela.
// Comandos (linhas que começam com "$") são digitados; as saídas aparecem inteiras.
// Sem IntersectionObserver ou com prefers-reduced-motion, o texto fica como está, completo.

const CHAR_DELAY = 32;
const AFTER_COMMAND = 280;
const AFTER_OUTPUT = 90;

const sleep = (ms) => new Promise((resolve) => setTimeout(resolve, ms));

function textNodesOf(line) {
    const walker = document.createTreeWalker(line, NodeFilter.SHOW_TEXT);
    const nodes = [];
    while (walker.nextNode()) nodes.push(walker.currentNode);
    return nodes;
}

export default function (Alpine) {
    Alpine.directive('type-on-view', (el) => {
        const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduced || !('IntersectionObserver' in window)) return;

        // Cada linha mantém a altura (min-height), então esvaziar o texto não desloca o layout.
        const plan = [...el.querySelectorAll('.vg-code__line')]
            .map((line) => {
                const nodes = textNodesOf(line).map((node) => ({ node, full: node.data }));
                return { line, nodes, command: line.textContent.trimStart().startsWith('$') };
            })
            .filter(({ line }) => line.textContent.length > 0);

        plan.forEach(({ nodes }) => nodes.forEach(({ node }) => (node.data = '')));

        const caret = document.createElement('span');
        caret.className = 'vg-code__caret';
        caret.setAttribute('aria-hidden', 'true');

        async function run() {
            for (const { line, nodes, command } of plan) {
                if (command) {
                    line.append(caret);
                    for (const { node, full } of nodes) {
                        for (const char of full) {
                            node.data += char;
                            await sleep(CHAR_DELAY);
                        }
                    }
                    await sleep(AFTER_COMMAND);
                } else {
                    nodes.forEach(({ node, full }) => (node.data = full));
                    await sleep(AFTER_OUTPUT);
                }
            }
            caret.remove();
        }

        const observer = new IntersectionObserver(
            ([entry]) => {
                if (!entry.isIntersecting) return;
                observer.disconnect();
                run();
            },
            { threshold: 0.5 },
        );
        observer.observe(el);
    });
}
