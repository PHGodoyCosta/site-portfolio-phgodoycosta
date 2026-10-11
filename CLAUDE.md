# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

This is Pedro Henrique Godoy Costa's personal portfolio site (phgodoycosta.com.br) — a Laravel monolith that lists his projects/case studies, formations, and (eventually) a blog. Projects are tagged, and each project has an optional long-form write-up stored as a Markdown file and rendered on its detail page.

## Commands

```bash
# Install
composer install
npm install

# Dev (two terminals)
npm run dev            # Vite dev server with HMR
php artisan serve      # PHP server

# Build frontend for production
npm run build

# Tests (PHPUnit, Feature + Unit suites)
php artisan test
php artisan test --filter=TestName       # single test
vendor/bin/phpunit tests/Feature/ExampleTest.php

# Lint/format PHP
vendor/bin/pint

# Migrate / seed
php artisan migrate
php artisan db:seed
```

## Architecture

**Routing is closure-based, not controller-based.** All routes live directly in [routes/web.php](routes/web.php) with inline logic (querying models, parsing Markdown, returning a view) — there are no Controllers currently in use (`app/Http/Controllers/Controller.php` is the stock empty base class). When adding a route, follow this pattern unless the logic grows complex enough to justify extracting a controller.

**Content model:** three Eloquent models — `Project`, `Tag`, `Formation` — backed by singular table names (`project`, `tag`, `formation`, not Laravel's pluralized default). `Project` and `Tag` are many-to-many through `relation_tag_project`. A project flagged `isDestaque` shows on the home page; `isPosted` presumably gates visibility (check migrations in [database/migrations/](database/migrations/) for the current column set, since several `alter_*_table` migrations have modified these tables over time).

**Project write-ups are Markdown files on disk, not DB content.** For a project route (`/projeto/{project}`), the project row is fetched from the DB, but its long-form body is read from `resources/posts/{slug}.md` (if present) and rendered via `cebe/markdown`'s `GithubMarkdown` parser directly in the route closure. There's no `resources/posts/` directory checked into git currently (see git log: "Removendo posts do git" — posts were deliberately removed from version control), so expect this directory/files to be added externally or gitignored.

**Views follow a `features/` + `components/` split:**
- `resources/views/features/<area>/<view>.blade.php` — page-level views (home, projects, tag, errors).
- `resources/views/components/` — Blade components, split into `layout/` (header, footer, head), `home/`, `shared/`.
- `resources/views/layouts/app.blade.php` — the single shared layout, using `@yield`/`@include` (not `<x-layout>` slots).

**Asset pipeline uses `@vite` in every environment.** Both layouts (`layouts/app.blade.php` and `layouts/minimal.blade.php`) call `@vite(...)` unconditionally: em dev ele usa o `public/hot`, e fora dele resolve os hashes pelo `public/build/manifest.json`. Não existe mais lista de nomes de arquivo escrita à mão no layout — depois de `npm run build` não há passo manual. O `public/build/` é gitignored, então o deploy precisa rodar `npm run build` (sem o manifest, `@vite` lança exceção).

**Rodando atrás de um proxy (ngrok, Cloudflare, nginx).** `App\Http\Middleware\TrustProxies` tem `$proxies = '*'`, então o Laravel aceita `X-Forwarded-Proto`/`X-Forwarded-Host` e gera URLs em https com o host do túnel. Sem isso o site serve links `http://` dentro de uma página https e o navegador bloqueia CSS/JS como conteúdo misto.

## Design system

The UI is being migrated to **PHGodoyCosta Design**, a dark-only, sober design system with heavy negative space, defined in a separate Claude Artifact (not in this repo). Before building or changing *any* UI (pages, Blade/Alpine components, CSS, icons, layout, typography, colors, copy), use the `phgodoycosta-design` skill (`.claude/skills/phgodoycosta-design/SKILL.md`) — it has the source-of-truth artifact URL and the exact rules (color layers, type scale, motion, icons, a11y) to follow. Key points baked into the skill:
- Tokens live in `resources/css/tokens.css`; never hardcode a color/spacing/radius/shadow value.
- Icons come from `resources/svg/lucide/` via `<x-icon name="..." />`.
- Components are ported from the design system's React source into Blade + Alpine by hand — not copy-pasted as React.
- One component at a time: read its design-system card, build it, compare against `preview.html`, then stop for review before moving to the next.
