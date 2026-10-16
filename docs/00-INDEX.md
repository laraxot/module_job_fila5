---
title: "00 INDEX"
type: note
status: active
tags: [documentation]
created: 2026-09-26
updated: 2026-10-14
qmd: "job 00-INDEX indice operativo canonico famiglie radice directory canoniche evidence legacy"
issues: []
discussions: []
related:
  - "./stories/02.Job-merge-conflict-resolution.story.md"
  - "./stories/docs-ingressi-job.story.md"
---

# Indice documentazione modulo Job

**Status**: PHPStan su `Modules/Job` exit 0 il 2026-10-07 (dopo la risoluzione dei marker di merge); non rieseguito il 2026-10-14.
**Versione**: non dichiarata (ne' `composer.json` ne' `module.json` ne' `CHANGELOG.md` contengono "2.3.0", valore che questo indice riportava senza fonte).

Cosa fa il codice, con path veri e limiti: [README.md](./README.md) (sezioni "Mappa del codice" e "Limiti verificati").

## Lettura essenziale

1. [README.md](./README.md) - Codice reale del modulo, mappa dei path, limiti verificati (leggere per primo).
2. [scopo.md](./scopo.md) - Lo scopo del modulo e i punti da migliorare (2026-09-02).
3. [roadmap.md](./roadmap.md) - Modello di roadmap 2025 con segnaposto (`[descrizione del modulo]`, "0% COMPLETATO"): non riflette lo stato del codice. La cartella [roadmap/](./roadmap/README.md) (29 file) ha versioni piu' articolate, con caselle spuntate non verificate contro il codice.
4. [philosophy.md](./philosophy.md) - Scopo e principi del modulo (2026-09-26); ammette che lo scheduler dinamico sia codice commentato, coerente con "Limiti verificati" del README.
5. [readme.md](./readme.md) - Scheda "business card" in stile badge; senza contenuto tecnico ([readme-en.md](./readme-en.md) e' la versione inglese). Non e' il README della cartella: su file system case-sensitive `README.md` e `readme.md` sono due file distinti.

## Core logic

Le pagine tematiche sotto sono per la maggior parte note di appunti. Contenuto reale verificato il 2026-10-14:

- [architecture.md](./architecture.md) - 4 componenti (BaseModel, Task, Frequency, Result) e 3 dipendenze; breve ma coerente con `app/Models`.
- [queueable-action.md](./queueable-action.md) - Regola "Queueable Actions al posto dei Service" con segnaposto `<nome progetto>`; NON e' una guida alle code o ai worker.
- [schedule.md](./schedule.md) - Elenco di URL esterni (healthchecks.io, cronhub, spatie/laravel-schedule-monitor); NON documenta la configurazione degli schedule del modulo.
- [analysis.md](./analysis.md) - Analisi generica con albero di cartelle; NON descrive il batch processing.

## Monitoring e report

- [filament.md](./filament.md) - Elenco di tre URL di plugin Filament (failed jobs, jobs monitor); la UI reale e' in `app/Filament/` (vedi README, "Mappa del codice").
- [job-reports.md](./job-reports.md) - Guida (30 KB) a report PDF con HTML2PDF; nessun file di `app/` o `config/` cita html2pdf (grep del 2026-10-14): e' una proposta, non una funzione del modulo.
- [soketi.md](./soketi.md) - Elenco di link su Soketi/Echo. Il modulo ha tre eventi `ShouldBroadcast` (`app/Events/BroadcastingEvent.php`, `PrivateEvent.php`, `PublicEvent.php`), ma nessun file di `app/`, `config/`, `routes/` o `resources/` cita Soketi o Pusher.
- [Inventario Livewire e widget](./bmad/livewire-inventory.md) - Componenti Livewire ritirati e widget Filament gemelli.

## Qualita' e sviluppo

- **[PHPStan Level 10](./phpstan-level-10-compliance.md)** - Conformita' e fix specifici.
- **[Testing strategy](./testing.md)** - Approccio Pest per i flussi di coda.
- **[PHPMD e complessita'](./cyclomatic-complexity-report.md)** - Analisi della pulizia del codice.

## Stories e followups aperti

- **[02 Risoluzione marker di merge (2026-10)](./stories/02.Job-merge-conflict-resolution.story.md)** - Esito per area, decisioni e followups ordinati per priorita':
  1. `config('job::model')` e `job::cache.*` non definite (ancora vero il 2026-10-14; `ScheduleService`, citato dalla story, e' stato eliminato l'8 ottobre: restano `GetActiveSchedulesAction` e `ClearScheduleCacheAction`).
  2. `Http/Livewire` e `resources/views/livewire` ancora presenti (verificato il 2026-10-14: 4 file in `app/Http/Livewire`).
  3. `getFormSchemaOld()` chiamato in modo statico in `tests/Unit/JobExecuteCoverage50Test.php:120` (verificato: in `XotBaseResource` il metodo e' di istanza).
  4. Modello dati di `Schedule.status` (scope `active` vs `Status::activeCases()`).
  5. Form, tabelle e lang da riallineare (`ImportForm`, `ViewSchedule`, `JobsTable`, codice morto, lang en/de/it).
- [12.1 Ritiro Http/Livewire](./stories/12.1.retire-job-http-livewire.story.md)
- [Codice morto XotBaseResourceTable](./stories/xotbaseresourcetable-dead-code-followup-job.story.md)
- [01 PHPStan fix](./stories/01.Job-phpstan-fix.story.md)
- [2026-10-06 PHPStan cleanup](./stories/phpstan-cleanup-job.story.md)
- [2026-10-08 Services -> Actions (ScheduleService eliminato)](./stories/services-to-actions-job.story.md)
- [2026-10-14 Ingressi docs rivisti sul codice](./stories/docs-ingressi-job.story.md)
- Elenco completo: 27 file in [stories/](./stories/) (non cancellare ne' rinumerare: policy `bashscripts/docs/modular-bmad-story-policy.md`).

## Pacchetti Composer

- [Riferimento](../../../../bashscripts/ai/wiki/rules/composer-packages-reference.md) - Nessuna dipendenza diretta; usa Xot, spipu/html2pdf (via Xot).

## Dependency intelligence

- [Dependency intelligence](./dependency-intelligence.md)

## Moduli correlati

- [Xot](../../Xot/docs/README.md) - Base framework e Page classes.
- [Activity](../../Activity/docs/readme.md) - Tracciamento log esecuzione.
- [Notify](../../Notify/docs/readme.md) - Notifiche fallimento job.

## Struttura della cartella (misurata il 2026-10-14: 522 file .md, 250 nella radice)

| Directory | File .md | Ruolo |
|---|---|---|
| `wiki/` | 102 | canonica per regole e concetti riusabili (`wiki/concepts/` 21 file, `rules/`, `skills/`, `commands/`, `memories/` con `INDEX.md` ciascuna); registro cronologico in [wiki/log.md](./wiki/log.md) |
| `stories/` | 27 | canonica per il lavoro BMAD del modulo |
| `bmad/` | 21 | canonica per il dossier BMAD dei widget Livewire; il nucleo e' [bmad/livewire-inventory.md](./bmad/livewire-inventory.md) |
| `raw/` | 40 | evidence immutabile: non modificare |
| `roadmap/` | 29 | pianificazione, non stato del codice |
| `_integration/`, `llm-wiki/`, `html2pdf/`, `analysis/`, `packages/`, `providers/`, `components/`, `github/` | 16, 7, 6, 6, 4, 2, 2, 1 | appunti e importazioni; da leggere come evidence |
| radice (250 file) | 250 | storico accumulato: vedi le famiglie sotto |

Famiglie dei 250 file della radice, classificate **per nome file** (non per contenuto), conteggi misurati il 2026-10-14:
report e correzioni PHPStan 36 (`phpstan-*`: per lo piu' cronaca di sessioni, dai nomi `*-sessione-completa`, `*-fixes-gennaio`); regole e disciplina per agenti AI 27;
prodotto, roadmap e strategia 24; analisi di duplicati e ridondanza 22; Filament e migrazioni 19; report di qualita'
e performance 18; indici e ingressi 14; modelli, factory e seeder 8; conflitti di merge 6; schedule 5;
altro 71 (architettura, testing, troubleshooting, traduzioni, task e note varie).

I nomi `PATTERNS.md`/`patterns.md`, `ACTIONS.md`/`actions.md`, `ARCHITECTURE.md`/`architecture.md` esistono in doppia
grafia (stesso nome, maiuscole diverse): su un file system che ignora le maiuscole collidono.

## Duplicati

- [00-index.md](./00-index.md) e' una copia per sola differenza di maiuscole di questo file: superseded da `00-INDEX.md`.
- [index.md](./index.md) e' un testo generico (JobService, JobScheduler, JobMonitor, JobDispatcher, FailureHandler, JobSchedule, JobScheduleResource) che non corrisponde al codice: marcato `stale`; non e' un indice.
- [INDEX.md](./INDEX.md) e' un segnaposto che rimanda qui. `INDEX_GENERATED.md`, `index-generated.md` e `index_generated.md` sono tre copie di un elenco generato il 2026-07-28 (circa 787 righe), non mantenuto: usare questo file.

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*
