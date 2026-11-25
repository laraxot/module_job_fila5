---
title: "PHPStan zero + merge markers — Job (2026-11-25)"
type: story
module: Job
status: done
epic: code-quality
track: quick-flow
story_id: phpstan-zero-merge-markers-job
qmd: "job merge markers phpstan ScheduleServiceTest schedule"
related:
  - ./phpstan-conflict-markers-bootstrap.story.md
  - ../../../Xot/docs/bmad/stories/phpstan-modules-zero-swarm.story.md
---
# PHPStan zero + merge markers — Job

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Perché

`ScheduleServiceTest` aveva marker `.merge_file_*` sugli import/`uses()` —
dominio schedule/code path Job.

## Lock

`bashscripts/lock/phpstan-zero-20261125-Job.lock`

## Acceptance criteria

1. [x] Zero marker in `tests/**/*.php` (e app/lang PHP)
2. [x] PHPStan `Modules/Job` exit 0

## File chiave

| File | Decisione |
|------|----------|
| `tests/Unit/Services/ScheduleServiceTest.php` | `uses(TestCase::class)` + Safe import |

## Gate

- PHPStan Job: 0 errori (exit 0)


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
