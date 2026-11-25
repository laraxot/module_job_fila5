---
id: phpstan-job-fix
slug: phpstan-job
scope: [module:Job, project:base_workorder_fila5]
status: Done
priority: High
created: 2026-09-06
updated: 2026-09-06
superseded_by: "./01.Job-phpstan-fix.story.md"
superseded_by: "./01.job-phpstan-fix.story.md"
qmd: "phpstan job fix"
---
# Story

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

## Problema
PHPStan errors in Modules/Job

## Errori Stimati
~30 errori

## Solution
1. Analyze with phpstan
2. Fix pattern errors
3. Verify with phpmd + phpinsights + pest
4. Git sync

## Esito (2026-09-06)
15 -> 0 errori. Dettaglio completo in `./01.job-phpstan-fix.story.md` (story canonica
per questo fix, questo file resta come traccia storica/dedupe).


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
