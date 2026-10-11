<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /*
     * Atrás de um proxy que termina o TLS (ngrok, Cloudflare, nginx), o PHP
     * recebe a requisição em http e só o X-Forwarded-Proto diz que o cliente
     * veio por https. Com $proxies nulo o Laravel ignora esse header, gera
     * url()/asset()/redirect() em http:// e o navegador bloqueia tudo como
     * conteúdo misto — o site "perde" o HTTPS. Confiamos em qualquer proxy
     * porque o IP do ngrok muda a cada túnel e a app nunca é exposta direto.
     */
    protected $proxies = '*';

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}
