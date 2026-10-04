@props([
    'as' => 'div',
])

{{--
    Entra com fade e deslocamento de 12px em 700ms. Sem JavaScript, o conteúdo
    fica visível (data-reveal="in" já vem no HTML); o Alpine só marca "pending"
    por um instante para disparar a transição uma única vez.
--}}
<{{ $as }}
    {{ $attributes->class(['vg-reveal']) }}
    data-reveal="in"
    x-data
    x-init="
        $el.setAttribute('data-reveal', 'pending');
        requestAnimationFrame(() => requestAnimationFrame(() => $el.setAttribute('data-reveal', 'in')));
    "
>{{ $slot }}</{{ $as }}>
