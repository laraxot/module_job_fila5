---
title: PHPStan Job, test regrediti dal pull del 2026-10-20
type: story
module: Job
phase: implementazione, quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - ../../../Xot/docs/stories/phpstan-test-wave-regression.story.md
  - ./services-to-actions-job.story.md
  - ../../../Media/docs/stories/phpstan-test-wave-media.story.md
---

# PHPStan Job: test regrediti dal pull del 2026-10-20

Lane `media-job` del run di coordinamento [phpstan-test-wave-regression](../../../Xot/docs/stories/phpstan-test-wave-regression.story.md). Questa story copre Job; la gemella per Media, con la spiegazione tecnica di `Model::factory()` che qui non serve, e' [phpstan-test-wave-media](../../../Media/docs/stories/phpstan-test-wave-media.story.md).

## Misura

- Prima (baseline 09:00, ri-misurata alle 09:10 con gli stessi file): **190 errori in 12 file** del bucket.
- Dopo: **0 errori** sui 12 file e `phpstan analyse Modules/Job` (solo il modulo) a 0. Config `laravel/phpstan.neon` non toccata, nessun ignore, nessuna baseline.

## Causa radice: versioni vecchie dei test tornate col pull

Anche qui non erano 190 problemi. Il commit locale `fbf2ed7d` (2026-10-20 09:03:27, "pull") ha sostituito 11 file di test e `app/Services/ScheduleService.php` con i blob della punta del remoto `laraxot/dev` (`1de71a42`, 2026-10-19): identici file per file, verificato. Il genitore `aa4e1b26` (2026-10-13) aveva le versioni corrette, con gli stessi blob del commit `a14e3d09` del 2026-10-08 (chiusura del run PHPStan precedente a 0 errori). La sorgente dell'errore e' lo scambio di versione.

Le versioni scambiate erano scaffold generici scritti su un dominio che non e' quello di Job:

- Classi PHPUnit con `Tests\TestCase`, `RefreshDatabase` e `@test` (contro "Pest resta Pest").
- Colonne che le tabelle non hanno: `Schedule::$cron_expression`, `$timezone`, `$priority`; `Task::$status`; `Result::$output`, `$execution_time`, `$started_at`, `$finished_at`; relazione `Schedule::$scheduleHistories`. Le migration dicono altro: `schedule` ha `command`, `expression`, `status` (boolean) e altre colonne di opzioni; `tasks` usa `is_active` e ha `timezone`; `results` ha `task_id`, `ran_at`, `duration`, `result`; la relazione e' `Schedule::histories()`. I model sono gia' tipizzati con `@property` sulle colonne reali: non c'era niente da tipizzare, le proprieta' mancavano perche' inventate.
- `json_encode`, `json_decode`, `file_get_contents` senza `use function Safe\...`.
- Un `TestCase` stub con `loadLaravelMigrations()` (metodo di Testbench, assente in `Illuminate\Foundation\Testing\TestCase`: fatale in `setUp()`) e `getPackageProviders()`, che e' un hook di Testbench.

### Scopo capito, per causa

| File (errori prima) | Totale | Scopo del test | Causa e correzione |
|---|---|---|---|
| `ScheduleBusinessLogicTest` (31), `ResultBusinessLogicTest` (36), `TaskBusinessLogicTest` (12) | 79 | Creare e interrogare `Schedule`, `Result`, `Task` | 55 `property.notFound` su colonne inventate (27, 18, 10), piu' `Safe\`, `offsetAccess`, `argument.type`. Ripristinate le versioni corrette, scritte sulle colonne reali |
| `JobBatchBusinessLogicTest` (51), `JobBusinessLogicTest` (16) | 67 | Payload JSON di `Job`/`JobBatch` | 51 `theCodingMachineSafe.function`, `offsetAccess` e `argument.type` sui JSON decodificati. Ripristinate le versioni con `Safe\` e tipi |
| `GetTaskFrequenciesActionTest` (9), `TaskFrequenciesIntegrationTest` (8), `GetTaskFrequenciesActionIntegrationTest` (6), `BaseModelTest` (4) | 27 | Struttura e comportamento di `GetTaskFrequenciesAction`, `BaseModel` | `expect()->toBeInstanceOf` ridondanti (19), `Safe\`, un `argument.templateType`. Ripristinati |
| `Pest.php` (14), `TestCase.php` (1) | 15 | Helper globali (`createJob`, `makeJob`, `createJobBatch`, `makeJobBatch`) e base dei test | Helper senza tipi del valore, `return.type` e `method.nonObject` su factory `mixed`, `pest.expectation.impossible`, `loadLaravelMigrations()`. Ripristinati |
| `app/Services/ScheduleService.php` | 2 | Elenco schedule attivi con cache e svuotamento cache | `Collection` senza generici. Corretto sul posto (sotto) |

## Cosa e' stato fatto

File riscritti con `git show fbf2ed7d^:<path>` (blob verificati, nessun checkout/restore, gate lock + mtime a ogni file, lock rilasciati):

- `tests/TestCase.php`, `tests/Pest.php`
- `tests/Feature/{JobBatchBusinessLogicTest,JobBusinessLogicTest,ResultBusinessLogicTest,ScheduleBusinessLogicTest,TaskBusinessLogicTest,TaskFrequenciesIntegrationTest,GetTaskFrequenciesActionIntegrationTest}.php`
- `tests/Unit/GetTaskFrequenciesActionTest.php`, `tests/Unit/Models/BaseModelTest.php`

Produzione, un solo file, sul posto (regola "un Service esistente con errori si corregge sul posto"): `app/Services/ScheduleService.php`.

- Il file duplicava `GetActiveSchedulesAction` e `ClearScheduleCacheAction`, che hanno gia' la logica tipizzata (`Collection<int, Schedule>`). Invece di ritipizzare la copia, ora `getActives()` e `clearCache()` delegano alle Action: stessa API pubblica, meno codice, nessun errore. Il costruttore e `getFromCache()` privato sono spariti (l'Action ha il proprio costruttore e usa `config('job::model', Schedule::class)` con default).
- **Zero chiamanti** nel repo. Era stato cancellato l'8 ottobre (commit `a14e3d09`, vedi [services-to-actions-job](./services-to-actions-job.story.md)) ed e' ricomparso con `fbf2ed7d`. La classe e' marcata `@deprecated`. Decisione aperta: cancellarla di nuovo.

## Verifica

- `./vendor/bin/phpstan analyse <12 file del bucket> --memory-limit=2G --no-progress --error-format=raw`: 190 prima, 0 dopo.
- `./vendor/bin/phpstan analyse Modules/Job`: 0.
- `php -l` su tutti i file toccati: ok.
- Pest sui test senza DB (`XDEBUG_MODE=off ./vendor/bin/pest --no-coverage ...`): `GetTaskFrequenciesActionTest` (13) e `BaseModelTest` (5) verdi, 18 passati.
- Non eseguiti i test `Feature/*` (DB): `.env.testing` punta a credenziali reali e `quaeris_data_test` non esiste. Le versioni scaffold, con `RefreshDatabase`, avrebbero eseguito `migrate:fresh` su quella connessione; le versioni corrette usano `DatabaseTransactions` (vedi `tests/TestCase.php`).

## Aperto

1. **Rischio di ripetizione.** La punta di `laraxot/dev` (`1de71a42`) ha ancora gli scaffold: un nuovo pull o sync puo' sovrascrivere di nuovo il lavoro. Serve allineare il remoto o fermare il sync prima di ripetere.
2. `ScheduleService` da cancellare di nuovo (zero chiamanti, sostituito dalle due Action).
3. Resta valido il followup 3 della story `02.Job-merge-conflict-resolution`: `getFormSchemaOld()` chiamato in statico in `tests/Unit/JobExecuteCoverage50Test.php:120`. Non e' un errore PHPStan oggi (il modulo e' a 0) e non e' nel bucket.

## Docs toccate

- [00-INDEX.md](../00-INDEX.md): la riga "ScheduleService e' stato eliminato l'8 ottobre" non era piu' vera; corretta, e aggiunto il link a questa story.
- [services-to-actions-job.story.md](./services-to-actions-job.story.md): una riga che rimanda alla nuova ricomparsa di `ScheduleService`.
- Duplicati segnalati, non toccati: `docs/00-index.md`, `docs/index.md`, `docs/INDEX.md`, `docs/INDEX_GENERATED.md`/`index-generated.md`/`index_generated.md` (gia' elencati in `00-INDEX.md`), `docs/readme.md`, e le due story gemelle `job-services-to-actions.story.md` e `services-to-actions-job.story.md`.
