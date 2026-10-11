@php
    $technologies = [
        'TypeScript', 'PHP', 'Python', 'React', 'Laravel', 'Next.js', 'PostgreSQL', 'SQL',
        'JavaScript', 'Tailwind', 'Prisma', 'TypeORM', 'Flask', 'ElectronJS', 'NestJS', 'Ionic',
    ];
@endphp

<section class="vg-marquee" aria-label="Tecnologias que uso">
    <div class="vg-marquee__track">
        @foreach ([false, true] as $isCopy)
            <ul class="vg-marquee__list" @if ($isCopy) aria-hidden="true" @endif>
                @foreach ($technologies as $technology)
                    <li class="vg-marquee__item">{{ $technology }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>
</section>
