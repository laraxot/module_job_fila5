---
title: "00 INDEX"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-10-07
qmd: "00 INDEX"
issues: []
discussions: []
related:
  - "./stories/02.Job-merge-conflict-resolution.story.md"
---

# Indice documentazione modulo Job

**Status**: PHPStan su `Modules/Job` exit 0 (2026-10-07, dopo la risoluzione dei marker di merge)
**Module version**: 2.3.0

## Lettura essenziale

1. [README.md](./readme.md) - Panoramica completa, Multi-Queue e Scheduling.
2. [roadmap.md](./roadmap.md) - Visione evolutiva e obiettivi 2026.
3. [philosophy.md](./philosophy.md) - La gestione "Zen" dei flussi asincroni.
4. [docs/README.md](./README.md) - Contenuto della cartella docs (modelli, actions, stories).

## Core logic e services

- **[Queue management](./queueable-action.md)** - Guida alla gestione delle code e dei worker.
- **[Scheduling system](./schedule.md)** - Configurazione di cron job e task pianificati.
- **[Batch processing](./analysis.md)** - Elaborazione massiva di job concatenati.
- **[Architettura](./architecture.md)** - Componenti e pattern del modulo.

## Monitoring e report

- **[Job monitor UI](./filament.md)** - Dashboard di monitoraggio in Filament.
- **[PDF reports](./job-reports.md)** - Generazione di log e statistiche in PDF (HTML2PDF).
- **[Soketi e Socket.io](./soketi.md)** - Real-time monitoring tramite websocket.
- **[Inventario Livewire e widget](./bmad/livewire-inventory.md)** - Componenti Livewire ritirati e widget Filament gemelli.

## Qualita' e sviluppo

- **[PHPStan Level 10](./phpstan-level-10-compliance.md)** - Conformita' e fix specifici.
- **[Testing strategy](./testing.md)** - Approccio Pest per i flussi di coda.
- **[PHPMD e complessita'](./cyclomatic-complexity-report.md)** - Analisi della pulizia del codice.

## Stories e followups aperti

- **[02 Risoluzione marker di merge (2026-10)](./stories/02.Job-merge-conflict-resolution.story.md)** - Esito per area, decisioni e followups ordinati per priorita':
  1. `config('job::model')` e `job::cache.*` non definite (ScheduleService, GetActiveSchedulesAction, ClearScheduleCacheAction).
  2. `Http/Livewire` e `resources/views/livewire` ancora presenti (ritiro da 12.1 tornato col merge).
  3. `getFormSchemaOld()` chiamato in modo statico in `JobExecuteCoverage50Test`.
  4. Modello dati di `Schedule.status` (scope `active` vs `Status::activeCases()`).
  5. Form, tabelle e lang da riallineare (`ImportForm`, `ViewSchedule`, `JobsTable`, codice morto, lang en/de/it).
- [12.1 Ritiro Http/Livewire](./stories/12.1.retire-job-http-livewire.story.md)
- [Codice morto XotBaseResourceTable](./stories/xotbaseresourcetable-dead-code-followup-job.story.md)
- [01 PHPStan fix](./stories/01.Job-phpstan-fix.story.md)
- [2026-10-06 PHPStan cleanup](./stories/2026-10-06-phpstan-cleanup-job.story.md)
- [2026-10-08 Services -> Actions (residuo ScheduleService)](./stories/2026-10-08-services-to-actions-job.story.md)

## Pacchetti Composer

- [Riferimento](../../../../bashscripts/ai/wiki/rules/composer-packages-reference.md) - Nessuna dipendenza diretta; usa Xot, spipu/html2pdf (via Xot).

## Dependency intelligence

- [Dependency intelligence](./dependency-intelligence.md)

## Moduli correlati

- [Xot](../../Xot/docs/readme.md) - Base framework e Page classes.
- [Activity](../../Activity/docs/readme.md) - Tracciamento log esecuzione.
- [Notify](../../Notify/docs/readme.md) - Notifiche fallimento job.

## Duplicati

- [00-index.md](./00-index.md) e' una copia per sola differenza di maiuscole di questo file: superseded da `00-INDEX.md`.

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*
