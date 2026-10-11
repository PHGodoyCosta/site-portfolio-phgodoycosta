<div
    class="vg-progress"
    role="progressbar"
    aria-label="Progresso de leitura"
    aria-valuemin="0"
    aria-valuemax="100"
    x-data="{ p: 0 }"
    x-init="
        const update = () => {
            const max = document.documentElement.scrollHeight - window.innerHeight;
            p = max > 0 ? Math.min(100, Math.max(0, (window.scrollY / max) * 100)) : 0;
        };
        window.addEventListener('scroll', update, { passive: true });
        update();
    "
    x-bind:aria-valuenow="Math.round(p)"
    aria-valuenow="0"
>
    <div class="vg-progress__bar" x-bind:style="`--p: ${p}%`"></div>
</div>
