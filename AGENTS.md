# fpbdev — Company Profile (Laravel 13 + Filament 5)

## Workflow

- **Record every task in the opencode todo list (`todowrite`) before executing** — the user reviews the task list to see what will be worked on. Update statuses in real time.

## Stack

- **Laravel 13**, **Filament 5** (admin at `/admin`), **Livewire 4.3**, **Pest 5**, PHP 8.5
- **Tailwind CSS v4** + **daisyUI 5** + **Mary UI 2.9** (`<x-card>`, `<x-badge>`, `<x-icon name="o-...|m-...">`). Custom daisyUI theme `fpblight` (purple) defined in `resources/css/app.css`.
- Icons via Mary's `o-`/`m-` names (Heroicons); `ublabs/blade-simple-icons` for **brand/social icons in the footer** (stored icon names `simpleicons-*` → render `<x-simpleicon-*>` via BladeUI prefix `simpleicon`). `laravel/pail` for realtime logs (part of `composer dev`).
- **SQLite in dev AND tests** (`:memory:` in `phpunit.xml`) — no MySQL.
- Fonts Outfit (display) + Inter (body) via `@fonts` component, Vite bundling.
- Site copy is **Indonesian** (config text, seeders, empty states).

## Design Rules

- **Always use Mary UI + daisyUI components and classes as-is** (`<x-card>`, `<x-badge>`, `<x-button>`, `btn-*`, `badge-*`, `card-*`), never hand-roll custom markup/styles where a component exists.
- **Never pass padding/layout overrides (e.g. `p-6`) to `<x-card>`** — Mary components carry their own defaults (`p-5`); overriding duplicates conflicting classes in the rendered markup.
- Colors only via daisyUI semantic names (`base-*`, `primary`, `neutral`, ...) — theme `fpblight` is defined in `resources/css/app.css`; no hardcoded hex/Tailwind palette colors.
- Prefer Mary native structure (`title`/`subtitle`/`figure`/`actions` slots) over custom card layouts.

## Commands

| Command                          | Description                                                                            |
| -------------------------------- | -------------------------------------------------------------------------------------- |
| `composer dev`                   | serve + queue + pail + Vite (`npx concurrently`)                                       |
| `composer test`                  | `config:clear` then `php artisan test`                                                 |
| `vendor/bin/pint --format agent` | Format PHP (fixes, never `--test`)                                                     |
| `npm run build` / `npm run dev`  | Frontend assets — **npm, NOT pnpm** (pnpm not installed; lockfile is `pnpm-lock.yaml`) |

Run `npm run build` whenever Blade/Tailwind classes change or you get `ViteException: Unable to locate file in Vite manifest`.

## Site Architecture

- **Routes are Livewire 4 view-based pages** (`routes/web.php`): `Route::livewire('/', 'pages::home')`. Pages live in `resources/views/pages/*/⚡index.blade.php` (SFC style, `⚡` prefix — `config/livewire.php` `make_command`), layout `layouts::base` (`layouts::` namespace → `resources/views/layouts`). Pages: home, portfolio, about, blog, `blog/{post:slug}`. No catch-all.
- **Sections are SFC components** at `resources/views/components/sections/⚡*.blade.php` (flat, no subdir), composed via `<livewire:sections.hero />`; navbar/footer at `components/ui/⚡*.blade.php`.
- **Static text** in `config/site_content.php` under `pages.index.*` — each section component loads its block in `mount()` via `config('site_content.pages.index.<key>')`. Navbar links are hardcoded, not config-driven.
- **DB-backed** (Filament group, `sort_order` for some): `Service`, `Pricing` (`price` int + `finished_at` = promo), `Portfolio`, plus blog `Post`/`Category`/`Tag`, `Setting`. Demo data via `DatabaseSeeder` + per-model seeders (`database/seeders/*Seeder.php`).
- **Models use `#[Fillable('a', 'b')]` attribute** (or `$casts` property), NOT `$fillable`. `Model::factory()` requires explicit `use HasFactory` — only `User` has it; **no other factories exist** (tests use `Model::create` directly).
- **Media (Spatie)**: Setting `site_logo` (singleFile), Post `posts/cover`. `settings()` helper only — media URLs via `settings('media.site_logo.original_url')`; it lives in `app/Helpers/Settings.php`, autoloaded via composer `autoload-dev.files` (new helper needs registering there + `composer dump-autoload`).
- **Post status**: `App\Enums\PostStatus` (DRAFT/PUBLISHED, Filament `HasLabel`) — queries filter manually (`where('status', PostStatus::PUBLISHED)`), no model scope. Draft posts 404 on `/blog/{slug}`.
- **Filament resources** follow the `Posts/` pattern: `Resources/{Plural}/` with `{Plural}Resource.php` + `Schemas/*Form.php` + `Tables/*Table.php` + 3 page classes. Site identity is edited via custom page `app/Filament/Pages/Settings/General.php` (view `resources/views/filament/pages/setting.blade.php`), not a resource.
- New Livewire components: `php artisan make:livewire` (SFC type + ⚡ prefix per config).

## Testing

- `RefreshDatabase` active for Feature tests (`tests/Pest.php`), DB `:memory:`.
- `tests/Feature/SitePagesTest.php` smoke-tests every page + blog publish rules; its `beforeEach` **creates a Setting row** because navbar/footer call `settings('name')` — keep it green, it catches broken SFC views fast. Empty-state text is asserted (e.g. "Belum ada artikel"), so DB-driven sections must render one.
- New pages/resources should follow that file: create DB rows with `::create` (no factories), assert `assertSee`.

## Skills

- **Project skills** (`boost.json`, `.agents/skills/`): `laravel-best-practices`, `pest-testing`, `tailwindcss-development`, `livewire-development`, `infer-conventions`, `frontend-design`, `laravel-filament`. Activate the matching one when working in that domain.
- **Global skills** (`~/.agents/skills/`, always available): `daisyui` (mandatory for any HTML/UI generation), `ui-ux-pro-max`, `taste-design`, `web-design-guidelines`, `seo-aeo-best-practices` (company-profile site — relevant for metadata/schema work), `landing-page-copywriter`, `ponytail` (YAGNI/lazy mode), `context7-mcp` (library docs), `find-skills`.

## Verification

Before finalizing: `vendor/bin/pint --format agent` then `composer test`. For UI changes: `npm run build` + check pages with `php artisan serve`.

---

<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to ensure the best experience when building Laravel applications.

## Foundational Context

This application is a Laravel application running on PHP 8.5. You are an expert with the Laravel ecosystem. Always use the APIs that match the installed major version of each package — do not assume a version.

Before relying on a package's API, confirm its installed version:

- PHP packages: run `composer show --direct` to list direct dependencies with versions, or `composer show <vendor/package>` for a single package.
- JS packages: check `package.json` for the installed versions.

## Skills Activation

This project has domain-specific skills available in `**/skills/**`. You MUST activate the relevant skill whenever you work in that domain—don't wait until you're stuck.

## Conventions

- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, and naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts

- Do not create verification scripts or tinker when tests cover that functionality and prove they work. Unit and feature tests are more important.

## Application Structure & Architecture

- Stick to existing directory structure; don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling

- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `pnpm run build`, `pnpm run dev`, or `composer run dev`. Ask them.

## Documentation Files

- You must only create documentation files if explicitly requested by the user.

## Replies

- Be concise in your explanations - focus on what's important rather than explaining obvious details.

=== boost rules ===

# Laravel Boost

## Tools

- Laravel Boost is an MCP server with tools designed specifically for this application. Prefer Boost tools over manual alternatives like shell commands or file reads.
- Use `database-query` to run read-only queries against the database instead of writing raw SQL in tinker.
- Use `database-schema` to inspect table structure before writing migrations or models.
- Use `get-absolute-url` to resolve the correct scheme, domain, and port for project URLs. Always use this before sharing a URL with the user.
- Use `browser-logs` to read browser logs, errors, and exceptions. Only recent logs are useful, ignore old entries.

## Searching Documentation (IMPORTANT)

- Always use `search-docs` before making code changes. Do not skip this step. It returns version-specific docs based on installed packages automatically.
- Pass a `packages` array to scope results when you know which packages are relevant.
- Use multiple broad, topic-based queries: `['rate limiting', 'routing rate limiting', 'routing']`. Expect the most relevant results first.
- Do not add package names to queries because package info is already shared. Use `test resource table`, not `filament 4 test resource table`.

### Search Syntax

1. Use words for auto-stemmed AND logic: `rate limit` matches both "rate" AND "limit".
2. Use `"quoted phrases"` for exact position matching: `"infinite scroll"` requires adjacent words in order.
3. Combine words and phrases for mixed queries: `middleware "rate limit"`.
4. Use multiple queries for OR logic: `queries=["authentication", "middleware"]`.

## Project Rules

- This project contains committed, area-grouped rules in `.ai/rules` when that directory exists (settled decisions, non-obvious traps, standing constraints). Framework and package guidelines that only apply to specific paths (testing, frontend, components) also live there, under `.ai/rules/boost` — this is not just recorded decisions, it is load-bearing guidance you have not seen inline. Before you enter plan mode or create/edit any file, you MUST first: open @.ai/rules/index.md (it maps file globs to rule files), read every rule file whose globs cover the path(s) in scope, and run `grep -rin 'keyword' .ai/rules` to catch what a path match alone misses. Do not write code until you have read and are following every matching rule. If `.ai/rules` does not exist, continue without it.
- Record durable rules with `record-rule` so the next agent or teammate inherits them instead of working them out again. Pass a `glob` (e.g. `app/Http/Controllers/**`), a short `title`, and a few-line `note`. Always use `record-rule`, never your native memory or notes tool — native memory is personal and session-scoped; only `.ai/rules` is shared with the team and persists in the repo.

## Artisan

- Run Artisan commands directly via the command line (e.g., `php artisan route:list`). Use `php artisan list` to discover available commands and `php artisan [command] --help` to check parameters.
- Inspect routes with `php artisan route:list`. Filter with: `--method=GET`, `--name=users`, `--path=api`, `--except-vendor`, `--only-vendor`.
- Read configuration values using dot notation: `php artisan config:show app.name`, `php artisan config:show database.default`. Or read config files directly from the `config/` directory.

## Tinker

- Execute PHP in app context for debugging and testing code. Do not create models without user approval, prefer tests with factories instead. Prefer existing Artisan commands over custom tinker code.
- Always use single quotes to prevent shell expansion: `php artisan tinker --execute 'Your::code();'`
    - Double quotes for PHP strings inside: `php artisan tinker --execute 'User::where("active", true)->count();'`

=== php rules ===

# PHP

- Always use curly braces for control structures, even for single-line bodies.
- Use PHP 8 constructor property promotion: `public function __construct(public GitHub $github) { }`. Do not leave empty zero-parameter `__construct()` methods unless the constructor is private.
- Use explicit return type declarations and type hints for all method parameters: `function isAccessible(User $user, ?string $path = null): bool`
- Follow existing application Enum naming conventions.
- Prefer PHPDoc blocks over inline comments. Only add inline comments for exceptionally complex logic.
- Use array shape type definitions in PHPDoc blocks.

=== deployments rules ===

# Deployment

- Laravel can be deployed using [Laravel Cloud](https://cloud.laravel.com/), which is the fastest way to deploy and scale production Laravel applications.

=== tests rules ===

# Test Enforcement

- Every change must be programmatically tested. Write a new test or update an existing test, then run the affected tests to make sure they pass.
- Run the minimum number of tests needed to ensure code quality and speed. Use `php artisan test --compact` with a specific filename or filter.

=== laravel/core rules ===

# Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using `php artisan list` and check their parameters with `php artisan [command] --help`.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Model Creation

- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `php artisan make:model --help` to check the available options.

## APIs & Eloquent Resources

- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

## URL Generation

- When generating links to other pages, prefer named routes and the `route()` function.

## Testing

- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

## Vite Error

- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `pnpm run build` or ask the user to run `pnpm run dev` or `composer run dev`.

=== livewire/core rules ===

# Livewire

- Livewire allow to build dynamic, reactive interfaces in PHP without writing JavaScript.
- You can use Alpine.js for client-side interactions instead of JavaScript frameworks.
- Keep state server-side so the UI reflects it. Validate and authorize in actions as you would in HTTP requests.

=== pint/core rules ===

# Laravel Pint Code Formatter

- If you have modified any PHP files, you must run `vendor/bin/pint --dirty --format agent` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test --format agent`, simply run `vendor/bin/pint --format agent` to fix any formatting issues.

=== pest/core rules ===

## Pest

- This project uses Pest for testing. Create tests: `php artisan make:test --pest {name}`.
- The `{name}` argument should not include the test suite directory. Use `php artisan make:test --pest SomeFeatureTest` instead of `php artisan make:test --pest Feature/SomeFeatureTest`.
- Run tests: `php artisan test --compact` or filter: `php artisan test --compact --filter=testName`.
- Do NOT delete tests without approval.

</laravel-boost-guidelines>
