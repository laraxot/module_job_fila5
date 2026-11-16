---
id: Job/module-bmad-audit-20261116
title: "Job: audit modulare completo"
status: ready-for-dev
module: Job
epic: module-governance
priority: P1
created: 2026-11-16
references:
  - architecture/
  - audits/
  - epics/
  - plans/
  - stories/
---
# Story — Job: audit modulare completo

Come manutentore del modulo Job (job queue / scheduler per PTVX), voglio un audit verificato sul codice reale, così da avere una baseline BMAD con finding numerati, rischi e next steps prioritizzati.

## Contesto e scope

Audit completo del modulo `laravel/Modules/Job`: struttura `app/` (Models, Actions, Services, Filament, Console), `database/migrations`, `lang/`, `tests/` Pest, compliance Filament 5 e convenzioni Xot. PHPStan eseguito il 2026-11-16.

## Conteggi misurati

- Modelli: 43 file in `app/Models` (inclusi Policy in `Models/Policies`, Traits in `Models/Traits`)
- Actions: 16 (`Actions/Command`, `Actions/Console`, `Actions/Schedule`)
- Services: 1 (`Services/ScheduleService.php` + `ScheduleService.php.bak` residuo)
- Listeners: 0 · Policies: 16 · Observers: presenti in `app/Observers`
- Filament: 87 file — 9 Resource top-level (FailedJob, Job, Schedule, FailedImportRow, JobsWaiting, JobManager, Export, Import, JobBatch), 4 Page, 5 Widget (QueueListen, ScheduleStatus, Clock, JobStatus, ScheduleCrud), più Forms/Tables/Columns/Fields
- Test Pest: 84 file PHP in `tests/` (19-40 Unit + 10-20 Feature, casing misto), ~638 blocchi `test()/it()`
- Migrazioni: 45 · Route file: 3 · Lingue: 7 directory (de, en, es, fr, it, nb_NO + `lang/lang/it` anomalo)
- PHPStan (`Modules/Job`, level max): **0 errori**

## Findings

### Struttura

1. `app/entities` e `app/Entities` esistono come directory **vuote** — residui di refactoring, da rimuovere.
2. `app/Services/ScheduleService.php` è l'unico Service del modulo e convive con `app/Actions/` — verificare se va migrato a Spatie Queueable Action secondo la convenzione Xot (actions-over-services). Ha un `.bak` accanto.
3. File backup morti in `app/`: `Services/ScheduleService.php.bak`, `Models/BaseModel.php.backup-20251015-092511`, `Notifications/TaskCompleted.php.backup_20251210_092150`, `Filament/Resources/JobManagerResource/Widgets/JobStatsOverview.php.backup_20251210_092006` — da eliminare.
4. `app/Filament/` contiene sia `Resources/*/Schemas|Tables` sia directory `Forms`, `Tables`, `Columns`, `Fields` legacy — possibile duplicazione di pattern Filament 4→5.
5. `Job/lang/lang/it` — directory lingua annidata anomala (`lang/lang/it` invece di `lang/it`).

### Qualità codice

6. `mixed` in 5 file `app/` — per lo più boundary legittimi (regola `Corn`, `GetCommandArgumentsActions`, sort callback). Commento "PHPStan Level 10" in `Models/Schedule.php:182` ok.
7. 1 file con TODO/FIXME in `app/` — da localizzare e triaggiare.
8. Nessun `property_exists` su Eloquent, nessun `@phpstan-ignore`, nessuna estensione diretta di classi Filament, nessun `Filament\Forms\Form` legacy.

### Compliance Filament

9. **Violazioni no-filament-labels in `ScheduleResource`**: `Schemas/ScheduleForm.php` e `ScheduleResource.php` (duplicati!) usano `->label(function (Get $get)...)`, `->placeholder('* * * * *')`, `->helperText(static::trans(...))`. In particolare `ScheduleResource.php` sembra duplicare la logica di `ScheduleResource/Schemas/ScheduleForm.php` — rischio di drift.
10. `->placeholder(null)` su `TagsInput::make('environments')` — placeholder null esplicito, innocuo ma da ripulire.

### Test

11. ~638 test in 84 file — buona volumetria. Assenza di test vuoti `expect(true)` rilevata.
12. Casing misto `tests/Feature` vs `tests/feature`, `tests/Unit` vs `tests/unit` — stesso rischio di Activity.

### i18n

13. 7 lingue; `it/` 71 file vs `en/` 37 — disparità attesa. File non allineati it/en: `job_manager.php`, `job_status.php`, `job_status_widget.php`, `jobs_waiting.php`, `jobs_waitings.php` (possibili duplicati `job_manager`/`job_managers`, `jobs_waiting`/`jobs_waitings` — verificare chiavi canoniche).
14. Label hardcoded `->label('Seleziona lingua')` non presente in Job ma pattern simile da monitorare in Lang.

### Docs

15. `docs/bmad/` ha README.md ma **manca `00-index.md`** — creato da questa audit.
16. Marker di merge `<<<<<<<` solo in documenti storici di inventory (docs/wiki, 2 story bmad) — nessun conflitto attivo nel codice.
17. File `.md` datati in `docs/` (eredità): `phpstan-sessione-completa-2025-11.md`, `copilot-redundancy-audit-2026-05-25.md`, `dry-kiss-analysis-2025-10-15.md`, ecc.

## Rischi

- Duplicazione `ScheduleResource.php` vs `ScheduleResource/Schemas/ScheduleForm.php` può causare form divergenti.
- File `.bak`/`.backup_*` in `app/` possono essere autoloadati o confondere grep/phpstan.
- Directory `lang/lang/it` probabilmente non viene caricata da Laravel — traduzioni mancanti silenziose.
- Service `ScheduleService` fuori convenzione Action.

## Next steps (priorizzati)

1. **[P1]** Eliminare i 4 file backup in `app/` e le directory vuote `app/entities`, `app/Entities`.
2. **[P1]** Risolvere la duplicazione `ScheduleResource.php` ↔ `ScheduleResource/Schemas/ScheduleForm.php`: mantenere solo la variante Filament 5 (`getFormSchema()`), rimuovere `->label()`/`->placeholder()`/`->helperText()` hardcoded.
3. **[P1]** Verificare `lang/lang/it` e spostare il contenuto in `lang/it` o rimuovere la directory orfana.
4. **[P2]** Valutare migrazione `ScheduleService` → Action Spatie Queueable; consolidare `Models/Policies` naming.
5. **[P2]** Allineare chiavi lang it/en e deduplicare `job_manager(s)`/`jobs_waiting(s)`.
6. **[P2]** Normalizzare casing `tests/Feature|feature`, `tests/Unit|unit`.
7. **[P3]** Aggiornare `docs/sprint-status.yaml` con lo stato reale del modulo.
