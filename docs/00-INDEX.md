---
title: "00 INDEX"
type: note
<<<<<<< .merge_file_vgFUZK
tags: [documentation]
created: 2026-09-26
updated: 2026-10-07
qmd: "00 INDEX"
=======
status: active
tags: [documentation]
created: 2026-09-26
updated: 2026-10-14
qmd: "job 00-INDEX indice operativo canonico famiglie radice directory canoniche evidence legacy"
>>>>>>> .merge_file_zrFzML
issues: []
discussions: []
related:
  - "./stories/02.Job-merge-conflict-resolution.story.md"
<<<<<<< .merge_file_vgFUZK
=======
  - "./stories/docs-ingressi-job.story.md"
>>>>>>> .merge_file_zrFzML
---

# Indice documentazione modulo Job

<<<<<<< .merge_file_vgFUZK
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

=======
**Status**: PHPStan su `Modules/Job` exit 0 il 2026-10-07 (dopo la risoluzione dei marker di merge); non rieseguito il 2026-10-14. Dopo il pull del 2026-10-20 i test erano a 190 errori; ripristinati, `phpstan analyse Modules/Job` esce di nuovo a 0 (vedi [phpstan-test-wave-job](./stories/phpstan-test-wave-job.story.md)). Questa wave rimuove la facciata `ScheduleService`, senza cambiare gli use-case Action.
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

>>>>>>> .merge_file_zrFzML
- **[PHPStan Level 10](./phpstan-level-10-compliance.md)** - Conformita' e fix specifici.
- **[Testing strategy](./testing.md)** - Approccio Pest per i flussi di coda.
- **[PHPMD e complessita'](./cyclomatic-complexity-report.md)** - Analisi della pulizia del codice.

## Stories e followups aperti

- **[02 Risoluzione marker di merge (2026-10)](./stories/02.Job-merge-conflict-resolution.story.md)** - Esito per area, decisioni e followups ordinati per priorita':
<<<<<<< .merge_file_vgFUZK
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
=======
  1. `config('job::model')` e `job::cache.*` non definite (ancora vero il 2026-10-14; `GetActiveSchedulesAction` e `ClearScheduleCacheAction` validano le chiavi al runtime).
  2. `Http/Livewire` e `resources/views/livewire` ancora presenti (verificato il 2026-10-14: 4 file in `app/Http/Livewire`).
  3. `getFormSchemaOld()` chiamato in modo statico in `tests/Unit/JobExecuteCoverage50Test.php:120` (verificato: in `XotBaseResource` il metodo e' di istanza).
  4. Modello dati di `Schedule.status` (scope `active` vs `Status::activeCases()`).
  5. Form, tabelle e lang da riallineare (`ImportForm`, `ViewSchedule`, `JobsTable`, codice morto, lang en/de/it).
- [2026-10-20 Chiamate di debug (dddx) in produzione](./stories/debug-calls-removal-job.story.md): `beginStream()` dei due widget, esperimento mai funzionante, ora errore esplicito invece di un dump
- [12.1 Ritiro Http/Livewire](./stories/12.1.retire-job-http-livewire.story.md)
- [Codice morto XotBaseResourceTable](./stories/xotbaseresourcetable-dead-code-followup-job.story.md)
- [01 PHPStan fix](./stories/01.Job-phpstan-fix.story.md)
- [2026-10-06 PHPStan cleanup](./stories/phpstan-cleanup-job.story.md)
- [2026-10-08 Services -> Actions (ScheduleService eliminato)](./stories/services-to-actions-job.story.md)
- [2026-10-20 PHPStan, test regrediti dal pull](./stories/phpstan-test-wave-job.story.md): 190 errori a 0 ripristinando 11 file di test scambiati dal remoto
- [2026-10-14 Ingressi docs rivisti sul codice](./stories/docs-ingressi-job.story.md)
- Elenco completo: 29 file in [stories/](./stories/) (alla misura del 2026-10-14 erano 27) (non cancellare ne' rinumerare: policy `bashscripts/docs/modular-bmad-story-policy.md`).
>>>>>>> .merge_file_zrFzML

## Pacchetti Composer

- [Riferimento](../../../../bashscripts/ai/wiki/rules/composer-packages-reference.md) - Nessuna dipendenza diretta; usa Xot, spipu/html2pdf (via Xot).
<<<<<<< .merge_file_vgFUZK

## Dependency intelligence

- [Dependency intelligence](./dependency-intelligence.md)

## Moduli correlati

- [Xot](../../Xot/docs/readme.md) - Base framework e Page classes.
- [Activity](../../Activity/docs/readme.md) - Tracciamento log esecuzione.
- [Notify](../../Notify/docs/readme.md) - Notifiche fallimento job.

## Duplicati

- [00-index.md](./00-index.md) e' una copia per sola differenza di maiuscole di questo file: superseded da `00-INDEX.md`.
=======

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
>>>>>>> .merge_file_zrFzML

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*
