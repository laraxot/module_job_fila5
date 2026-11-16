---
title: "Job — marker conflitto PHP/lang e bootstrap PHPStan"
type: story
status: in-progress
module: Job
epic: quality
story_id: phpstan-conflict-markers-bootstrap
created: 2026-11-16
updated: 2026-11-16
tags: [job, phpstan, git-conflict, bootstrap]
qmd: "job conflict markers php lang app tests phpstan bootstrap"
related:
  - ./12.3.root-hygiene-conflict-markers.story.md
  - ../../../Xot/docs/bmad/stories/phpstan-conflict-markers-bootstrap.story.md
  - ../../../Notify/docs/bmad/stories/phpstan-conflict-markers-bootstrap.story.md
---

# phpstan-conflict-markers-bootstrap (Job)

## Scopo / perché

Marker Git nei PHP di `app/`, `tests/` o `lang/` impediscono il bootstrap
PHPStan (parse error). Job espone code path di coda/schedule: un file PHP
sporco qui ferma l'analisi del modulo e può contaminare la fleet se incluso
nel tree `Modules/`.

## Lock

`bashscripts/lock/lock.sh job-conflict-markers`

## Ambito

- `app/**/*.php`, `tests/**/*.php`, `lang/**/*.php`
- Priorità: lang PHP con marker + app se presenti

Fuori scope primario: note raw/docs `_integration` con marker (solo md).

## Acceptance criteria

1. [x] Zero marker `<<<<<<<` in app/tests/lang PHP.
2. [x] `php -l` verde su app/tests/lang (solo warning use inutili in 2 test).
3. [ ] PHPStan `Modules/Job` documentato.
4. [x] Story BMAD + sprint-status.

## Esito scansione 2026-11-16

| Area | Marker | php -l |
|------|--------|--------|
| app/ | 0 | OK |
| tests/ | 0 | OK (warning use Exception/stdClass) |
| lang/ | 0 | OK |

Nessun fix PHP richiesto.
Debito docs: ~16 `.md` (raw notes dup) con marker.

## PHPStan

(da compilare dopo analyse)
