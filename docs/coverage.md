<<<<<<< HEAD
---
id: module-job-coverage
title: "Job — Stato qualità e coverage"
type: coverage-report
module: Job
status: active
updated: 2026-09-22
related:
  - ./bmad/stories/12.3.root-hygiene-conflict-markers.story.md
  - ./bmad/stories/12.4.git-hygiene-queue-pid-graphify-out-aaa.story.md
---

# Job — Stato qualità (2026-09-22)

Nessun baseline di coverage precedente trovato nel modulo (`docs/coverage.md` non
esisteva). Questo documento registra lo stato **onesto** osservato in questa sessione,
non un target dichiarato.

## PHPStan

```
cd laravel && ./vendor/bin/phpstan analyse Modules/Job --no-progress --error-format=table
```

Esito: `[OK] No errors` (config `phpstan.neon`, livello del progetto — nessun
`--level` passato, come da regola). Verificato dopo la rimozione dei due file
`.aaa` morti (nessun impatto: erano fuori dall'autoload, mai referenziati).

## Pest

```
cd laravel && ./vendor/bin/pest Modules/Job --no-coverage
```

Esito: **hang**, terminato dopo 90s da timeout esterno (`nc -z -w3 10.100.200.53 3306`
→ DB **non raggiungibile** prima ancora di lanciare la suite). Coerente con la memoria
second-brain `project-test-db-unreachable-drives-skips.md`: il DB di test
(`10.100.200.53:3306`) non risponde da questa macchina in questa sessione. Nessun
numero di coverage prodotto — non è un regressione introdotta qui, è un blocco
infrastrutturale preesistente e documentato.

**Non è stato possibile alzare il coverage in questa sessione** per il motivo sopra:
non c'è un baseline eseguibile da cui partire. Chi riprende con DB raggiungibile deve
lanciare la suite e creare qui il primo baseline reale.

## PHPMD

```
cd laravel && bash tools/phpmd.sh Modules/Job
```

Esito: **124 righe di findings** (non zero). Debito pre-esistente, non introdotto in
questa sessione (le uniche modifiche PHP di questa sessione sono state la *rimozione*
di due classi stub mai referenziate — non può aver generato questi finding, tutti su
file diversi: `Policies/*`, `Schedule.php`, `Task.php`, `Observers/ScheduleObserver.php`,
`Rules/Corn.php`, `Traits/FormatSeconds.php`, `tests/*`). Categorie principali:
`UnusedFormalParameter`/`CamelCaseParameterName` sui parametri Policy prefissati `_`
(convenzione "parametro non usato" del progetto, probabile falso positivo PHPMD da non
"correggere" senza verificare la regola), `CyclomaticComplexity` su
`Schedule::getArguments()` (13/10) e `FormatSeconds::formatSeconds()` (11/10),
`MissingImport` in alcuni test. Non toccato: fuori scope per questo task (git hygiene),
righe non mie, rischio di collisione con l'agente concorrente che tiene il lock a
livello modulo (`Job.lock`, task `fix-rebase-conflict-job-module`).

## PHPInsights

```
cd laravel && bash tools/phpinsights.sh analyse Modules/Job --no-interaction
```

Esito (4164 righe, 266 file):

| Metrica | Punteggio |
|---|---:|
| CODE | 90.6 |
| COMPLEXITY | 100 |
| ARCHITECTURE | 71.4 |
| MISC (style) | 87.7 |

Stesso discorso di PHPMD: debito pre-esistente (ordered imports, ordered class
elements, brace style su classi vuote), non toccato in questa sessione per restare
nel perimetro del task e non collidere con l'agente concorrente.
=======
# Code Coverage: Job

**Lines Coverage:** N/A (Failed to parse)
**Test Exit Code:** 2

## Output

```text
▕             }
    1119▕         }
    1120▕ 
    1121▕         try {
  ➜ 1122▕             $reflector = new ReflectionClass($concrete);
    1123▕         } catch (ReflectionException $e) {
    1124▕             throw new BindingResolutionException("Target class [$concrete] does not exist.", 0, $e);
    1125▕         }
    1126▕

      [2m+7 vendor frames [22m
  8   Modules/Job/tests/Feature/TaskFrequenciesIntegrationTest.php:204

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Job\tests\Feature\TaskFrequenciesIntegr…  BindingResolutionException   
  Target class [config] does not exist.

  at vendor/laravel/framework/src/Illuminate/Container/Container.php:1122
    1118▕             }
    1119▕         }
    1120▕ 
    1121▕         try {
  ➜ 1122▕             $reflector = new ReflectionClass($concrete);
    1123▕         } catch (ReflectionException $e) {
    1124▕             throw new BindingResolutionException("Target class [$concrete] does not exist.", 0, $e);
    1125▕         }
    1126▕

      [2m+7 vendor frames [22m
  8   Modules/Job/tests/Feature/TaskFrequenciesIntegrationTest.php:211

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Job\tests\Feature\TaskFrequenciesIntegr…  BindingResolutionException   
  Target class [config] does not exist.

  at vendor/laravel/framework/src/Illuminate/Container/Container.php:1122
    1118▕             }
    1119▕         }
    1120▕ 
    1121▕         try {
  ➜ 1122▕             $reflector = new ReflectionClass($concrete);
    1123▕         } catch (ReflectionException $e) {
    1124▕             throw new BindingResolutionException("Target class [$concrete] does not exist.", 0, $e);
    1125▕         }
    1126▕

      [2m+7 vendor frames [22m
  8   Modules/Job/tests/Feature/TaskFrequenciesIntegrationTest.php:229

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Job\tests\Unit\Models\BaseModelTest > b…  BindingResolutionException   
  Unresolvable dependency resolving [Parameter #0 [ <required> string $storedEventRepository ]] in class Spatie\EventSourcing\StoredEvents\EventSubscriber

  at vendor/laravel/framework/src/Illuminate/Container/Container.php:1429
    1425▕     protected function unresolvablePrimitive(ReflectionParameter $parameter)
    1426▕     {
    1427▕         $message = "Unresolvable dependency resolving [$parameter] in class {$parameter->getDeclaringClass()->getName()}";
    1428▕ 
  ➜ 1429▕         throw new BindingResolutionException($message);
    1430▕     }
    1431▕ 
    1432▕     /**
    1433▕      * Register a new before resolving callback for all types.

      [2m+15 vendor frames [22m
  16  Modules/Job/app/Models/BaseModel.php:72
  17  Modules/Job/tests/Unit/Models/BaseModelTest.php:11


  Tests:    26 failed, 11 warnings, 38 skipped, 20 passed (47 assertions)
  Duration: 9.72s


```
>>>>>>> laraxot/dev
