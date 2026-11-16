---
title: "Job — indice BMAD"
type: index
status: active
module: Job
qmd: "job bmad index module documentation"
---

# Job — Indice documentazione BMAD

Documentazione modulare del modulo **Job** (job queue, scheduler, failed jobs per PTVX). Story/architecture/bundle vivono qui, nel modulo — mai solo in `docs/bmad/` root.

## Aree

| Area | Percorso | Contenuto |
|------|----------|-----------|
| Architecture | `architecture/` | Decisioni e confini architetturali del modulo |
| Audits | `audits/` | Audit e quality report storici |
| Brainstorming | `brainstorming/` | Esplorazioni e opportunity |
| Epics | `epics/` | Epic e roadmap modulare |
| Plans | `plans/` | Piani di implementazione |
| Stories | `stories/` | Story BMAD (incluso `module-bmad-audit.story.md`) |

## File chiave a livello `docs/bmad/`

- `README.md` — panoramica docs BMAD del modulo
- `architecture.md`, `audit.md`, `bmad-dossier.md`, `bmad-planning.md`, `index.md`
- `filament-blueprint.md` — blueprint Filament del modulo
- `livewire-*.md` — serie documenti Livewire widget (inventory, architecture, prd, epics, tech-spec, ux, decision-log, conversion, brainstorming)
- `project-context.md`, `completion.md`

## Modulo — riferimenti codice

- `app/Models` — 43 modelli (Job, Schedule, JobManager, JobBatch, FailedJob, Export/Import)
- `app/Filament` — 9 Resource, 4 Page, 5 Widget
- `app/Actions` — 16 action (Command, Console, Schedule)
- `app/Services` — `ScheduleService` (unico Service; candidato a migrazione Action)
- `database/migrations` — 45 migrazioni
- `lang/` — de, en, es, fr, it, nb_NO (+ `lang/lang/it` anomalo)

## Audit

- `stories/module-bmad-audit.story.md` — audit modulare completo 2026-11-16 (baseline, finding, next steps)
