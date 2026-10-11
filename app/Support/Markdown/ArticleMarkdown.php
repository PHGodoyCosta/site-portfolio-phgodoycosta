<?php

namespace App\Support\Markdown;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

/**
 * Interpretador de Markdown dos artigos (estudos de caso).
 *
 * Lê o texto linha a linha, monta os blocos e devolve HTML. Os blocos que o design
 * system tem como componente (código, nota, citação em destaque, figura) são
 * renderizados pelos componentes Blade de resources/views/components/articles.
 *
 * Sintaxe além do Markdown comum:
 *
 *   ```ts file=empresa.entity.ts     bloco de código (nolines esconde os números)
 *   ```terminal                      comandos; linhas com "$ " ganham o prompt
 *
 *   :::nota Título icon=info         nota (Callout)
 *   :::citacao Autor opcional        citação em destaque (PullQuote)
 *   :::grid                          duas figuras lado a lado (FigureGrid)
 *
 *   ![texto alternativo](src "legenda")   figura; sem src vira o espaço reservado
 *
 * HTML escrito à mão é escapado, com uma lista curta de exceções que os posts antigos
 * usam: <br>, <hr>, <strong>/<b>, <em>/<i>, <img>, <video> e <div> (class="obs" vira nota;
 * align="center" agrupa a mídia, e 2 ou mais viram FigureGrid). Qualquer outra tag é
 * mostrada como texto. Imagens de badge (shields.io) viram uma fileira de selos pequenos.
 */
class ArticleMarkdown
{
    private const KEYWORDS = [
        'const', 'let', 'var', 'function', 'return', 'if', 'else', 'for', 'while', 'import', 'from', 'export',
        'default', 'async', 'await', 'new', 'class', 'extends', 'type', 'interface', 'as', 'of', 'in', 'try',
        'catch', 'throw', 'public', 'private', 'static', 'readonly', 'echo', 'use', 'namespace', 'select', 'where',
    ];

    private const LITERALS = ['true', 'false', 'null', 'undefined'];

    private const LANGUAGES = [
        'typescript' => 'ts', 'javascript' => 'js', 'python' => 'py', 'bash' => 'sh', 'shell' => 'sh',
        'zsh' => 'sh', 'yml' => 'yaml',
    ];

    private const TERMINAL = ['terminal', 'console', 'shell-session'];

    /** @var array<int, array{id: string, label: string}> */
    private array $headings = [];

    /** @var array<string, int> */
    private array $usedIds = [];

    /** @var array<int, string> */
    private array $stash = [];

    private function __construct()
    {
    }

    /**
     * @return array{html: HtmlString, headings: array<int, array{id: string, label: string}>}
     */
    public static function parse(string $markdown): array
    {
        $parser = new self();
        $lines = explode("\n", str_replace(["\r\n", "\r"], "\n", $markdown));
        $html = $parser->blocks($lines);

        return ['html' => new HtmlString($html), 'headings' => $parser->headings];
    }

    // ───────── Blocos ─────────

    /** @param array<int, string> $lines */
    private function blocks(array $lines): string
    {
        $out = [];
        $i = 0;
        $n = count($lines);

        while ($i < $n) {
            $line = $lines[$i];

            if (trim($line) === '') {
                $i++;
                continue;
            }

            if (preg_match('/^\s{0,3}(`{3,}|~{3,})\s*(.*)$/', $line, $m)) {
                $fence = $m[1];
                $info = trim($m[2]);
                $body = [];
                for ($i++; $i < $n; $i++) {
                    if (preg_match('/^\s{0,3}' . preg_quote($fence[0], '/') . '{' . strlen($fence) . ',}\s*$/', $lines[$i])) {
                        $i++;
                        break;
                    }
                    $body[] = $lines[$i];
                }
                $out[] = $this->code(implode("\n", $body), $info);
                continue;
            }

            if (preg_match('/^\s{0,3}:::\s*([\p{L}-]+)\s*(.*?)\s*$/u', $line, $m)) {
                $body = [];
                for ($i++; $i < $n; $i++) {
                    if (preg_match('/^\s{0,3}:::\s*$/', $lines[$i])) {
                        $i++;
                        break;
                    }
                    $body[] = $lines[$i];
                }
                $out[] = $this->directive(Str::lower($m[1]), $m[2], $body);
                continue;
            }

            if (preg_match('/^\s*<hr\s*\/?>\s*$/i', $line)) {
                $out[] = '<hr>';
                $i++;
                continue;
            }

            if (preg_match('/^\s*(?:<br\s*\/?>\s*)+$/i', $line)) {
                $i++;
                continue;
            }

            if (preg_match('/^\s*<video\b/i', $line)) {
                $html = [];
                for (; $i < $n; $i++) {
                    $html[] = $lines[$i];
                    if (stripos($lines[$i], '</video>') !== false) {
                        $i++;
                        break;
                    }
                }
                $out[] = $this->video(implode("\n", $html));
                continue;
            }

            if (preg_match('/^\s*<img\b/i', $line)) {
                $html = [];
                for (; $i < $n; $i++) {
                    $html[] = $lines[$i];
                    if (str_contains($lines[$i], '>')) {
                        $i++;
                        break;
                    }
                }
                $out[] = $this->htmlImage(implode(' ', $html));
                continue;
            }

            if (preg_match('/^\s*<div\b([^>]*)>/i', $line, $m)) {
                $depth = 0;
                $html = [];
                for (; $i < $n; $i++) {
                    $html[] = $lines[$i];
                    $depth += preg_match_all('/<div\b/i', $lines[$i]) - preg_match_all('/<\/div>/i', $lines[$i]);
                    if ($depth <= 0) {
                        $i++;
                        break;
                    }
                }
                $out[] = $this->htmlDiv($m[1], implode("\n", $html));
                continue;
            }

            if (preg_match('/^\s{0,3}(#{1,6})\s+(.+?)\s*#*\s*$/u', $line, $m)) {
                $out[] = $this->heading(strlen($m[1]), $m[2]);
                $i++;
                continue;
            }

            if ($this->isRule($line)) {
                $out[] = '<hr>';
                $i++;
                continue;
            }

            if (preg_match('/^\s{0,3}>/', $line)) {
                $inner = [];
                for (; $i < $n && preg_match('/^\s{0,3}>\s?(.*)$/', $lines[$i], $q); $i++) {
                    $inner[] = $q[1];
                }
                $out[] = '<blockquote>' . $this->blocks($inner) . '</blockquote>';
                continue;
            }

            if ($this->listMarker($line)) {
                [$html, $i] = $this->list($lines, $i);
                $out[] = $html;
                continue;
            }

            if ($this->badgeLine($line)) {
                $badges = [];
                for (; $i < $n && $this->badgeLine($lines[$i]); $i++) {
                    $badges[] = $this->badge($lines[$i]);
                }
                $out[] = '<div class="vg-badges">' . implode('', $badges) . '</div>';
                continue;
            }

            if ($this->imageLine($line)) {
                $out[] = $this->figure($line);
                $i++;
                continue;
            }

            $para = [];
            for (; $i < $n && trim($lines[$i]) !== '' && ($para === [] || ! $this->startsBlock($lines[$i])); $i++) {
                $para[] = trim($lines[$i]);
            }
            $out[] = '<p>' . $this->inline(implode("\n", $para)) . '</p>';
        }

        return implode("\n", $out);
    }

    private function startsBlock(string $line): bool
    {
        return (bool) (
            preg_match('/^\s{0,3}(`{3,}|~{3,}|#{1,6}\s|>|:::)/', $line)
            || $this->isRule($line)
            || $this->listMarker($line)
            || $this->imageLine($line)
            || preg_match('/^\s*<(div|video|img|hr)\b/i', $line)
        );
    }

    private function isRule(string $line): bool
    {
        return (bool) preg_match('/^\s{0,3}([-*_])(\s*\1){2,}\s*$/', $line);
    }

    /** @return array{0: string, 1: string}|null [tipo ul|ol, texto do item] */
    private function listMarker(string $line): ?array
    {
        if ($this->isRule($line)) {
            return null;
        }
        if (preg_match('/^\s{0,3}[-*+]\s+(.*)$/', $line, $m)) {
            return ['ul', $m[1]];
        }
        if (preg_match('/^\s{0,3}\d{1,9}[.)]\s+(.*)$/', $line, $m)) {
            return ['ol', $m[1]];
        }

        return null;
    }

    /** @return array{0: string, 1: int} */
    private function list(array $lines, int $i): array
    {
        $n = count($lines);
        $type = $this->listMarker($lines[$i])[0];
        $items = [];

        while ($i < $n) {
            $marker = $this->listMarker($lines[$i]);

            if ($marker && $marker[0] === $type) {
                $items[] = [$marker[1]];
                $i++;
                continue;
            }

            if (trim($lines[$i]) === '') {
                $next = $i + 1;
                while ($next < $n && trim($lines[$next]) === '') {
                    $next++;
                }
                $nextMarker = $next < $n ? $this->listMarker($lines[$next]) : null;
                if ($nextMarker && $nextMarker[0] === $type) {
                    $i = $next;
                    continue;
                }
                break;
            }

            if ($marker || $this->startsBlock($lines[$i]) || ! preg_match('/^\s+\S/', $lines[$i])) {
                break;
            }

            $items[count($items) - 1][] = trim($lines[$i]);
            $i++;
        }

        $li = array_map(fn ($parts) => '<li>' . $this->inline(implode("\n", $parts)) . '</li>', $items);

        return ["<{$type}>" . implode('', $li) . "</{$type}>", $i];
    }

    private function heading(int $level, string $text): string
    {
        $tag = $level <= 2 ? 'h2' : 'h3';
        $html = $this->inline($text);
        $plain = trim(html_entity_decode(strip_tags($html), ENT_QUOTES));

        $base = Str::slug($plain) ?: 'secao';
        $id = $base;
        for ($k = 2; isset($this->usedIds[$id]); $k++) {
            $id = $base . '-' . $k;
        }
        $this->usedIds[$id] = 1;

        if ($tag === 'h2') {
            $this->headings[] = ['id' => $id, 'label' => $plain];
        }

        return "<{$tag} id=\"{$id}\">{$html}</{$tag}>";
    }

    // ───────── Componentes ─────────

    private function component(string $name, array $data): string
    {
        return trim(view('components.articles.' . $name, $data)->render());
    }

    private function directive(string $name, string $rest, array $body): string
    {
        $icon = null;
        $rest = preg_replace_callback('/\bicon=(\S+)/', function ($m) use (&$icon) {
            $icon = $m[1];

            return '';
        }, $rest);
        $rest = trim($rest);

        switch ($name) {
            case 'nota':
            case 'callout':
                $paragraphs = array_filter(array_map('trim', preg_split('/\n\s*\n/', implode("\n", $body))));
                $html = implode('', array_map(fn ($p) => '<p>' . $this->inline($p) . '</p>', $paragraphs));

                return $this->component('callout', [
                    'title' => $rest !== '' ? $rest : null,
                    'icon' => $icon ?: 'info',
                    'slot' => new HtmlString($html),
                ]);

            case 'citacao':
            case 'quote':
                $text = trim(preg_replace('/\s+/', ' ', implode(' ', $body)));

                return $this->component('pull-quote', [
                    'cite' => $rest !== '' ? $rest : null,
                    'slot' => new HtmlString($this->inline($text)),
                ]);

            case 'grid':
            case 'figuras':
                $figures = [];
                foreach ($body as $line) {
                    if ($this->imageLine($line)) {
                        $figures[] = $this->figure($line, '4 / 3');
                    }
                }

                return $this->component('figure-grid', ['slot' => new HtmlString(implode('', $figures))]);
        }

        return $this->blocks($body);
    }

    private function htmlDiv(string $attrs, string $html): string
    {
        $inner = preg_replace('/^\s*<div\b[^>]*>/i', '', $html, 1);
        $inner = preg_replace('/<\/div>\s*$/i', '', $inner, 1);
        $body = $this->blocks(explode("\n", $inner));
        $attrs = $this->attributes($attrs);

        if (preg_match('/\bobs\b/', $attrs['class'] ?? '')) {
            return $this->component('callout', ['title' => null, 'icon' => 'info', 'slot' => new HtmlString($body)]);
        }

        if (($attrs['align'] ?? '') === 'center' && substr_count($body, '<figure class="vg-figure">') >= 2) {
            return $this->component('figure-grid', ['slot' => new HtmlString($body)]);
        }

        return $body;
    }

    private function htmlImage(string $html): string
    {
        $attrs = $this->attributes($html);
        $alt = $attrs['alt'] ?? '';

        return $this->component('figure', [
            'src' => $this->safeUrl($attrs['src'] ?? ''),
            'alt' => $alt,
            'label' => $alt !== '' ? $alt : 'imagem',
            'caption' => null,
            'ratio' => '16 / 9',
        ]);
    }

    private function video(string $html): string
    {
        $attrs = $this->attributes($html);
        $src = $attrs['src'] ?? null;
        if (! $src && preg_match('/<source\b[^>]*>/i', $html, $m)) {
            $src = $this->attributes($m[0])['src'] ?? null;
        }

        return $this->component('video', [
            'src' => $this->safeUrl((string) $src),
            'poster' => $this->safeUrl($attrs['poster'] ?? ''),
            'label' => $attrs['title'] ?? $attrs['aria-label'] ?? 'vídeo',
        ]);
    }

    /** @return array<string, string> atributos da primeira tag do trecho */
    private function attributes(string $html): array
    {
        $tag = preg_match('/<[a-z][^>]*>/i', $html, $m) ? $m[0] : $html;
        preg_match_all('/([\w-]+)\s*=\s*(?:"([^"]*)"|\'([^\']*)\')/', $tag, $found, PREG_SET_ORDER);

        $out = [];
        foreach ($found as $f) {
            $out[Str::lower($f[1])] = html_entity_decode($f[3] ?? $f[2] ?? '', ENT_QUOTES);
        }

        return $out;
    }

    private function isBadgeUrl(string $url): bool
    {
        return (bool) preg_match('#^https?://(?:img\.)?(?:shields\.io|badgen\.net)/#i', trim($url));
    }

    private function badgeLine(string $line): bool
    {
        return preg_match('/^\s*!\[[^\]]*\]\(\s*([^\s)]+)[^)]*\)\s*$/', $line, $m) && $this->isBadgeUrl($m[1]);
    }

    private function badge(string $line): string
    {
        preg_match('/!\[([^\]]*)\]\(\s*([^\s)]+)/', $line, $m);

        return $this->badgeImg($m[1], $m[2]);
    }

    private function badgeImg(string $alt, string $url): string
    {
        $url = str_replace('style=for-the-badge', 'style=flat-square', $url);

        return '<img class="vg-badge-img" src="' . e($url) . '" alt="' . e($alt) . '" height="20" loading="lazy">';
    }

    private function imageLine(string $line): bool
    {
        return (bool) preg_match('/^\s*!\[[^\]]*\]\([^)]*\)\s*$/', $line);
    }

    private function figure(string $line, string $ratio = '16 / 9'): string
    {
        preg_match('/^\s*!\[([^\]]*)\]\(\s*([^\s)]*)(?:\s+"([^"]*)")?\s*\)\s*$/', $line, $m);
        $alt = $m[1] ?? '';
        $src = $this->safeUrl($m[2] ?? '');
        $caption = isset($m[3]) && $m[3] !== '' ? $m[3] : null;

        return $this->component('figure', [
            'src' => $src,
            'alt' => $alt,
            'label' => $alt !== '' ? $alt : 'imagem',
            'caption' => $caption,
            'ratio' => $ratio,
        ]);
    }

    private function code(string $code, string $info): string
    {
        $words = preg_split('/\s+/', $info, -1, PREG_SPLIT_NO_EMPTY);
        $language = Str::lower(array_shift($words) ?? '');
        $filename = null;
        $lineNumbers = true;

        foreach ($words as $word) {
            if (preg_match('/^(?:file|title)=(.+)$/', $word, $m)) {
                $filename = trim($m[1], '"\'');
            } elseif ($word === 'nolines') {
                $lineNumbers = false;
            }
        }

        $terminal = in_array($language, self::TERMINAL, true);
        $language = self::LANGUAGES[$language] ?? ($language ?: 'txt');
        $rows = explode("\n", rtrim($code, "\n"));

        $lines = array_map(function (string $row) use ($terminal, $language) {
            if ($terminal) {
                return str_starts_with($row, '$ ')
                    ? '<span class="vg-tk-prompt" aria-hidden="true">$ </span>' . $this->highlight(substr($row, 2), 'sh')
                    : '<span class="vg-tk-out">' . e($row) . '</span>';
            }

            return $this->highlight($row, $language);
        }, $rows);

        $copy = $terminal
            ? collect($rows)->filter(fn ($r) => str_starts_with($r, '$ '))->map(fn ($r) => substr($r, 2))->implode("\n")
            : implode("\n", $rows);

        return $this->component('code-block', [
            'lines' => $lines,
            'copy' => $copy !== '' ? $copy : implode("\n", $rows),
            'language' => $language,
            'filename' => $filename,
            'lineNumbers' => $lineNumbers && ! $terminal,
            'variant' => $terminal ? 'terminal' : 'code',
        ]);
    }

    // ───────── Realce de código ─────────

    private function highlight(string $line, string $lang): string
    {
        $html = '';
        $i = 0;
        $len = strlen($line);

        while ($i < $len) {
            $rest = substr($line, $i);
            $ch = $line[$i];

            if ($this->isComment($rest, $lang)) {
                $html .= '<span class="vg-tk-c">' . e($rest) . '</span>';
                break;
            }

            if ($ch === '"' || $ch === "'" || $ch === '`') {
                $j = $i + 1;
                while ($j < $len && $line[$j] !== $ch) {
                    if ($line[$j] === '\\') {
                        $j++;
                    }
                    $j++;
                }
                $html .= '<span class="vg-tk-s">' . e(substr($line, $i, $j - $i + 1)) . '</span>';
                $i = $j + 1;
                continue;
            }

            if (preg_match('/^\d+(\.\d+)?/', $rest, $m) && ! preg_match('/[\w$\x{00C0}-\x{00FF}]$/u', substr($line, 0, $i))) {
                $html .= '<span class="vg-tk-n">' . e($m[0]) . '</span>';
                $i += strlen($m[0]);
                continue;
            }

            if (preg_match('/^[A-Za-z_$\x{00C0}-\x{00FF}][\w$\x{00C0}-\x{00FF}]*/u', $rest, $m)) {
                $word = $m[0];
                $class = null;
                if (in_array($word, self::LITERALS, true)) {
                    $class = 'n';
                } elseif (in_array($word, self::KEYWORDS, true)) {
                    $class = 'k';
                } elseif (preg_match('/^\s*\(/', substr($rest, strlen($word)))) {
                    $class = 'f';
                }
                $html .= $class ? "<span class=\"vg-tk-{$class}\">" . e($word) . '</span>' : e($word);
                $i += strlen($word);
                continue;
            }

            if (preg_match('/^\s+/', $rest, $m)) {
                $html .= $m[0];
                $i += strlen($m[0]);
                continue;
            }

            preg_match('/^./su', $rest, $m);
            $char = $m[0] ?? $ch;
            $html .= '<span class="vg-tk-p">' . e($char) . '</span>';
            $i += strlen($char);
        }

        return $html;
    }

    private function isComment(string $rest, string $lang): bool
    {
        return match ($lang) {
            'py', 'sh', 'yaml' => $rest[0] === '#',
            'sql' => str_starts_with($rest, '--'),
            'php' => str_starts_with($rest, '//') || $rest[0] === '#',
            default => str_starts_with($rest, '//'),
        };
    }

    // ───────── Inline ─────────

    private function inline(string $text): string
    {
        $this->stash = [];

        $text = preg_replace_callback('/(`+)(.+?)\1/s', fn ($m) => $this->keep('<code>' . e(trim($m[2])) . '</code>'), $text);

        $text = preg_replace_callback('/<(\/?)(br|strong|b|em|i)\s*\/?>/i', function ($m) {
            $tag = ['b' => 'strong', 'i' => 'em'][Str::lower($m[2])] ?? Str::lower($m[2]);

            return $this->keep($tag === 'br' ? '<br>' : '<' . $m[1] . $tag . '>');
        }, $text);

        $text = preg_replace_callback('/!\[([^\]]*)\]\(\s*([^\s)]+)(?:\s+"[^"]*")?\s*\)/', function ($m) {
            if ($this->isBadgeUrl($m[2])) {
                return $this->keep($this->badgeImg($m[1], $m[2]));
            }
            $src = $this->safeUrl($m[2]);

            return $this->keep($src ? '<img src="' . e($src) . '" alt="' . e($m[1]) . '" loading="lazy">' : e($m[1]));
        }, $text);

        $text = preg_replace_callback(
            '/\[((?:[^\[\]\\\\]|\\\\.)+)\]\(\s*([^\s)]+)(?:\s+"[^"]*")?\s*\)/',
            fn ($m) => $this->keep($this->link($m[2], $this->inlineFormat($m[1]))),
            $text
        );

        $text = preg_replace_callback(
            '/<(https?:\/\/[^\s>]+)>|(?<![\w"=\x00])(https?:\/\/[^\s<>\x00]+)/',
            function ($m) {
                $url = $m[1] !== '' ? $m[1] : $m[2];
                $trail = '';
                if ($m[1] === '' && preg_match('/[.,;:!?)]+$/', $url, $t)) {
                    $trail = $t[0];
                    $url = substr($url, 0, -strlen($trail));
                }

                return $this->keep($this->link($url, e($url))) . $trail;
            },
            $text
        );

        $html = $this->inlineFormat($text);

        while (preg_match('/\x00(\d+)\x00/', $html)) {
            $html = preg_replace_callback('/\x00(\d+)\x00/', fn ($m) => $this->stash[(int) $m[1]], $html);
        }

        return $html;
    }

    private function inlineFormat(string $text): string
    {
        $text = e($text);
        $text = preg_replace('/\\\\([\\\\`*_{}\[\]()#+\-.!>~|])/', '$1', $text);
        $text = preg_replace('/\*\*(?=\S)(.+?)(?<=\S)\*\*|__(?=\S)(.+?)(?<=\S)__/s', '<strong>$1$2</strong>', $text);
        $text = preg_replace('/(?<![\w*])\*(?=[^\s*])(.+?)(?<=[^\s*])\*(?![\w*])|(?<![\w])_(?=[^\s_])(.+?)(?<=[^\s_])_(?![\w])/s', '<em>$1$2</em>', $text);
        $text = preg_replace('/( {2,}|\\\\)\n/', "<br>\n", $text);

        return $text;
    }

    private function keep(string $html): string
    {
        $this->stash[] = $html;

        return "\x00" . (count($this->stash) - 1) . "\x00";
    }

    private function link(string $url, string $label): string
    {
        $href = $this->safeUrl($url);
        if ($href === null) {
            return $label;
        }

        $external = preg_match('#^https?://#i', $href) && ! $this->isOwnHost($href);
        $attrs = $external ? ' target="_blank" rel="noopener noreferrer"' : '';
        $hint = $external ? '<span class="vg-sr-only"> (abre em nova aba)</span>' : '';

        return '<a href="' . e($href) . '"' . $attrs . '>' . $label . $hint . '</a>';
    }

    private function isOwnHost(string $url): bool
    {
        $host = parse_url($url, PHP_URL_HOST);
        $own = parse_url((string) config('app.url'), PHP_URL_HOST);

        return $host !== null && ($host === $own || $host === 'phgodoycosta.com.br' || $host === 'www.phgodoycosta.com.br');
    }

    private function safeUrl(string $url): ?string
    {
        $url = trim($url);
        if ($url === '') {
            return null;
        }
        if (preg_match('#^(https?://|mailto:|tel:|/|\#|\./|\.\./)#i', $url)) {
            return $url;
        }

        return preg_match('/^[a-z][a-z0-9+.-]*:/i', $url) ? null : $url;
    }
}
