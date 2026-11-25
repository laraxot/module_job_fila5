---
title: "Job: bonifica convenzioni docs .md"
type: story
status: done
module: Job
epic: docs-second-brain
created: 2026-11-25
updated: 2026-11-25
qmd: "job docs bonifica duplicati md5 varianti -2 -3 maiuscole FRAMEWORKS INDEX template fabbricati product-roadmap product-strategy sprint-planning user-research launch-plan kebab frontmatter"
related:
  - ../../../../Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md
---
# Job: bonifica convenzioni docs

## Context and Problem Statement

Lane E dello swarm [docs-zen-conventions-swarm](../../../../Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md).
Job era il modulo piu' rumoroso della lane: ogni documento esisteva in 2-4 varianti (`X.md`, `X-2.md`, `X-3.md`, `X-MAIUSCOLO.md`).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Perche'

Lane E dello swarm [docs-zen-conventions-swarm](../../../../Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md).
Job era il modulo piu' rumoroso della lane: ogni documento esisteva in 2-4 varianti (`X.md`, `X-2.md`, `X-3.md`, `X-MAIUSCOLO.md`).

## Prima / Dopo

| Misura | Prima | Dopo |
|---|---:|---:|
| file `.md` | 476 | 411 (+1 questa story) |
| copie esatte md5 | 12 | 0 |
| nomi datati | 0 | 0 |
| non kebab | 14 | 0 |
| senza frontmatter | 2 | 0 |
| senza `qmd` | 3 | 0 |
| annidamenti generati (`.md`) | 0 | 0 |

## Eliminato / fuso

- Varianti quasi identiche: `FRAMEWORKS`, `QMD-SETUP`, `TECH-SPEC`, `PROJECT-STRUCTURE`, `PERFORMANCE-OPTIMIZATION`,
  `ON-DEMAND-PATTERN`, `MIGRATIONS`, `PATTERNS`, `METODI-DUPLICATI-ANALISI`, `INDEX`, `INDEX-GENERATED` (maiuscoli) e
  i rispettivi `-2`/`-3`. Il nome kebab `X.md` resta canonico; per frameworks, qmd-setup, tech-spec, project-structure,
  performance-optimization, on-demand-pattern, migrations, index-generated ha preso il contenuto della variante pulita
  (la `X.md` aveva un secondo frontmatter incollato nel corpo e `Laravel 12.x` invece di 13).
  `architecture.md` (marcato superseded) e `metodi-duplicati-analisi.md` (superseded da `-job`) tenuti cosi'.
- `-2` sussunti: `quality-report`, `duplicate-methods`, `index-generated`, `lang-link`, `wiki/analysis/archive/code-quality-analysis`, `wiki/schema` (+ `wiki/SCHEMA.md`).
- `legacy/historical/phpstan-roadmap-.md` (stesso testo senza frontmatter) e copia `wiki/journals/phpstan-roadmap.md` -> canonico `legacy/historical/phpstan-roadmap.md`.
- `root-txt-files/storage_server.md` e `storage-server-2.md` -> `storage-server.md`; `root-txt-files/test3.md` (contenuto "aa").
- Template fabbricati senza alcuna classe/tabella/comando del modulo (verificato contro `app/Models`, Actions, Console, Filament):
  `product-{roadmap,strategy,launch-plan}{,-2,-3}`, `product-requirements`, `product-requirements-document`,
  `job-module-product-{roadmap,strategy,launch-plan}`, `job-module-{sprint-planning,user-research}`,
  `sprint-planning{,-2,-3}`, `sprint-planning-meeting`, `user-research{,-2,-3}`, `strategy`, `launch-plan`,
  `confidence-guidelines{,-2}`, `duplicate-methods-report{,-2}` (29 file).
- Frontmatter/`qmd` aggiunti: `tasks/cleanup-job-docs.md`, `parcheggio/README.md`.
- Link aggiornati in `bmad/00-index.md`, `bmad/index.md`, `bmad/purpose.md`, `troubleshooting.md`, `job-module-troubleshooting-guide.md`, `index-generated.md`.

## Casi lasciati in dubbio

- `prd.md` tenuto: cita tabelle reali `job_managers`, `schedules` e il pattern `Schemas/Tables`.
- `roadmap/` contiene coppie quasi uguali (`01-now`/`now`, `02-goals`/`goals`, `index`/`00-index`, ...) e `roadmap.md` 1092 righe + `roadmap-strategic-priorities.md` + `roadmap/legacy/legacy-roadmap.md`: da consolidare con lettura umana.
- `index-generated.md` (781 righe) e' un inventario generato e stale (link a file inesistenti): candidato a rimozione.
- `root-txt-files/schedule.md` (dump grezzo) vs `schedule-1.md` (versione curata): contenuti diversi, non fusi.
- `docs/graphify/graphify-out/graphify-out/` (json, non `.md`): annidamento generato fuori scope, vedi story 12.4.

## Gate

Solo `.md`: PHPStan/Pint/Pest non applicabili (skip documentato, PHPStan gia' 0).


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
