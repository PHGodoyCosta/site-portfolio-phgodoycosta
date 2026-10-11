<?php

namespace Tests\Unit;

use App\Support\Markdown\ArticleMarkdown;
use Tests\TestCase;

class ArticleMarkdownTest extends TestCase
{
    private function html(string $md): string
    {
        return ArticleMarkdown::parse($md)['html']->toHtml();
    }

    public function test_headings_get_ids_and_feed_the_table_of_contents(): void
    {
        $r = ArticleMarkdown::parse("## Decisões técnicas\n\n### Sub\n\n## Decisões técnicas");

        $this->assertSame([
            ['id' => 'decisoes-tecnicas', 'label' => 'Decisões técnicas'],
            ['id' => 'decisoes-tecnicas-2', 'label' => 'Decisões técnicas'],
        ], $r['headings']);
        $this->assertStringContainsString('<h3 id="sub">Sub</h3>', $r['html']->toHtml());
    }

    public function test_inline_formatting_and_links(): void
    {
        $html = $this->html('**Pablo** e *equipe* com `code` em [GitHub](https://github.com/x) e https://exemplo.com.br/.');

        $this->assertStringContainsString('<strong>Pablo</strong>', $html);
        $this->assertStringContainsString('<em>equipe</em>', $html);
        $this->assertStringContainsString('<code>code</code>', $html);
        $this->assertStringContainsString('target="_blank"', $html);
        $this->assertStringContainsString('(abre em nova aba)', $html);
        $this->assertStringContainsString('href="https://exemplo.com.br/"', $html);
    }

    public function test_raw_html_and_unsafe_urls_are_neutralised(): void
    {
        $html = $this->html('<script>alert(1)</script> [x](javascript:alert(1))');

        $this->assertStringNotContainsString('<script>', $html);
        $this->assertStringNotContainsString('href="javascript', $html);
    }

    public function test_lists_rule_and_blockquote(): void
    {
        $html = $this->html("- a\n- b\n\n1. um\n2. dois\n\n---\n\n> citação");

        $this->assertStringContainsString('<ul><li>a</li><li>b</li></ul>', $html);
        $this->assertStringContainsString('<ol><li>um</li><li>dois</li></ol>', $html);
        $this->assertStringContainsString('<hr>', $html);
        $this->assertStringContainsString('<blockquote><p>citação</p></blockquote>', $html);
    }

    public function test_components(): void
    {
        $html = $this->html(implode("\n", [
            '```ts file=a.ts', 'const x = 1;', '```', '',
            '```terminal', '$ npm i', '[ saída ]', '```', '',
            ':::nota Título', 'Texto', ':::', '',
            ':::citacao', 'Pergunta?', ':::', '',
            ':::grid', '![um]()', '![dois](/a.png "legenda")', ':::',
        ]));

        $this->assertStringContainsString('class="vg-code"', $html);
        $this->assertStringContainsString('<span class="vg-tk-k">const</span>', $html);
        $this->assertStringContainsString('vg-tk-prompt', $html);
        $this->assertStringContainsString('role="note"', $html);
        $this->assertStringContainsString('vg-pullquote', $html);
        $this->assertStringContainsString('vg-figure-grid', $html);
        $this->assertStringContainsString('Espaço reservado: um', $html);
        $this->assertStringContainsString('<figcaption>legenda</figcaption>', $html);
    }

    public function test_legacy_html_is_rendered_as_components(): void
    {
        $html = $this->html(implode("\n", [
            'Um post: <br>', '[https://a.com/x](https://a.com/x)', '<br><br>', 'Fim **ok**',
            '',
            '<div align="center">',
            '    <video src="/v/a.mp4" width="640" controls>', 'Seu navegador não suporta.', '    </video>',
            '    <img src="/i/b.png" alt="Foto" width="640">',
            '</div>',
            '',
            '<div class="obs">Os repos são <strong>privados</strong>.', '', 'Outro parágrafo.</div>',
            '',
            '<hr>',
            '',
            '![TS](https://img.shields.io/badge/Code-TS-3178C6?style=for-the-badge&logo=typescript)',
            '![React](https://img.shields.io/badge/Frontend-React-61DAFB?style=for-the-badge)',
        ]));

        $this->assertStringContainsString('<br>', $html);
        $this->assertStringNotContainsString('&lt;br', $html);
        $this->assertStringContainsString('<video src="/v/a.mp4"', $html);
        $this->assertStringContainsString('src="/i/b.png"', $html);
        $this->assertStringContainsString('vg-figure-grid', $html);
        $this->assertStringContainsString('role="note"', $html);
        $this->assertStringContainsString('<strong>privados</strong>', $html);
        $this->assertStringContainsString('<hr>', $html);
        $this->assertStringNotContainsString('&lt;', $html);
        $this->assertSame(1, substr_count($html, 'class="vg-badges"'));
        $this->assertStringContainsString('style=flat-square', $html);
    }
}
