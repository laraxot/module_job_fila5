---
title: "FormatSeconds — no PHPStan probe"
type: concept
module: Job
tags: [phpstan, trait, format-seconds, no-probe]
created: 2026-07-01
updated: 2026-07-22
qmd: "FormatSeconds trait.unused JobStatsOverview no PhpstanProbe"
issues:
  - "https://github.com/laraxot/module_job_fila5/issues"
discussions:
  - "https://github.com/laraxot/module_job_fila5/discussions"
related:
  - ../../../../../../docs/wiki/rules/no-phpstan-probe-models.md
  - ../../../../Xot/docs/wiki/concepts/phpstan-trait-probes.md
  - ../../../../Xot/docs/phpstan-modules-fix-log.md
---

# FormatSeconds — niente probe PHPStan

## Scopo

`FormatSeconds` formatta durate (secondi → `d/h/m/s`) per overview Filament delle code Job.

## Consumatori reali (SSoT runtime)

- `JobResource/Widgets/JobStatsOverview`
- `JobManagerResource/Widgets/JobStatsOverview`
- `JobsWaitingResource/Widgets/JobsWaitingOverview`
- Test Pest: `tests/Unit/Traits/FormatSecondsTest.php` (classe anonima)

## Anti-pattern rimosso (2026-07-22)

`app/Phpstan/FormatSecondsPhpstanProbe.php` **vietato** dal canon
[`no-phpstan-probe-models`](../../../../../../docs/wiki/rules/no-phpstan-probe-models.md).

Se PHPStan segnala `trait.unused` sul file trait isolato (discovery Filament),
preferire `@phpstan-ignore trait.unused` nel docblock del trait — **mai** un host fittizio.

## Verifica

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Job --memory-limit=2G
test ! -d Modules/Job/app/Phpstan
```
