---
title: "Riorganizzazione docs core Job"
type: story
tags: [docs, bmad, job, reorganization]
qmd: "riorganizzazione docs core Job"
---
# Story — riorganizzazione docs core: Job

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

- **ID:** `2026-10-09-docs-reorg-core-job`
- **Status:** done
- **Scope:** sola documentazione del modulo Job.

## Acceptance criteria

- [x] Esiste l'indice canonico [docs/bmad/index.md](../index.md).
- [x] Sono indicate directory canoniche e legacy con link relativi.
- [x] Inventario marker eseguito: nessun marker di merge nei `docs/` posseduti.
- [x] Nessun file di codice modificato.

## Inventario

Canoniche: [`docs/bmad/architecture`](../architecture/), [`brainstorming`](../brainstorming/), [`epics`](../epics/), [`stories`](../stories/), [`docs/wiki`](../../wiki/).

Legacy: [`docs/_integration`](../../_integration/), [`docs/chat`](../../chat/), [`docs/raw`](../../raw/), [`docs/roadmap`](../../roadmap/). `docs/bmad/epics` è canonica ma contiene anche materiale storico da riesaminare.

## Esito

Le varianti esistenti non sono state fuse automaticamente: manca una prova sufficiente per stabilire quale contenuto prevalga.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
