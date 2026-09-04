---
title: "Code Coverage: Job"
module: "Job"
type: concept
tags: [coverage]
created: 2026-07-14
updated: 2026-07-14
qmd: "coverage"
related:
  - "./phpstan-fixes-archive-2.md"
---
# Code Coverage: Job

**Lines Coverage:** N/A (Failed to parse)
**Test Exit Code:** 2

## 2026-09-04 — Services → Actions (no-services-rule)

Scope: convert every file under `app/Services/` to `Spatie\QueueableAction\QueueableAction`
under `app/Actions/`, per `bashscripts/ai/wiki/rules/no-services-rule.md`. Story:
`docs/stories/job-services-to-actions.story.md` (full per-file classification table there).

**Census**: one file, `app/Services/ScheduleService.php` (2 public methods:
`getActives()`, `clearCache()`).

**Collision found live, mid-task**: a concurrent session was migrating the exact same
file at the same time. Result found in the working tree: `ScheduleService.php` deleted by
that session; **two** independent QueueableAction migrations already committed in HEAD
(`634d334`) — a flat pair (`app/Actions/GetActiveSchedulesAction.php`,
`ClearScheduleCacheAction.php`, with real call sites in
`ScheduleClearCacheCommand`/`ScheduleObserver`) and a grouped pair
(`app/Actions/Schedule/GetActiveSchedulesAction.php`, `ClearScheduleCacheAction.php`, no
real call sites, only tests). Consolidated onto the grouped pair (matches the rule: "Actions
are grouped by actor/context, not dumped flat in the Actions/ root"), updated the two real
call sites to the grouped namespace, removed the flat duplicates + their redundant tests +
two stray tracked `.php.bak` files.

**PHPStan**: baseline (post `clear-result-cache`) 0 errors → final (post
`clear-result-cache`) 0 errors.

**PHPMD**: `./tools/phpmd.sh Modules/Job text ../docs/phpmd.ruleset.xml` — no new findings;
`ScheduleObserver.php` only shows pre-existing `CamelCaseParameterName`/
`UnusedFormalParameter` on `$_schedule` (line not touched, only the `use` import changed).

**Pest**: `./vendor/bin/pest Modules/Job/tests -c Modules/Job/phpunit.xml --no-coverage`
fails at bootstrap (`Cannot open bootstrap script
".../Modules/Job/vendor/autoload.php"`) — pre-existing, caused by another session's
uncommitted `phpunit.xml` edit (documented below in the mixed-type-reduction section), not
touched here.

## 2026-09-04 — mixed type reduction (best-effort)

Scope: reduce use of `mixed` where a more specific type is genuinely knowable
(project convention, `qmd search "mixed type policy"`). Story:
`docs/stories/4.29.mixed-type-reduction.story.md`.

**Pre-existing state found before touching anything**: the module working tree
already carried ~177 files of uncommitted WIP from another session (import
reordering, `.gitattributes` cleanup, ScheduleService→Actions migration —
matches `docs/chat/module-job-sync.md`). Per collision-avoidance rules, edits
in this pass were restricted to files that were clean (no pre-existing diff)
so the resulting commit is cleanly attributable and does not entangle with the
other session's live work.

**Counts**: 65 `mixed` occurrences across 48 files. 30 files were clean; of
those, 36 occurrences were reviewed. 1 changed, 35 left as `mixed` with a
documented reason (see story for the full per-file breakdown): Laravel
`Factory::definition()` vendor contract (17 factory files), Eloquent
`@property array<array-key, mixed>` JSON-column docblocks (queue
payload/data/params/options — genuinely polymorphic), `ValidationRule`
contract (`Corn::validate(mixed $value, ...)`), Filament `Column::getState():
mixed` contract (`ScheduleArgumentsProbe`), Symfony Console argument/option
`default` fields (genuinely `string|array|bool|int|float|null`), and
`config('totem.frequencies')` payload (heterogeneous nested config shape,
`parameters` key varies from `false` to a typed field-definition array). The
remaining 29 occurrences live in the 18 already-dirty files and were left
untouched entirely (not evaluated in depth) to avoid touching another
session's WIP.

**Change applied**: `app/Http/Livewire/Job/Status.php` — `public array
$form_data` docblock narrowed from `array<string, mixed>` to `array<string,
string>` (verified: the only field ever assigned/bound is `conn`, a queue
connection name string, both in `mount()` and in
`resources/views/livewire/job/status.blade.php`'s `wire:model.lazy`
binding).

**Reverted attempt**: `app/Datas/CommandData.php`'s `$arguments` param was
briefly narrowed from `array<int, array<string, mixed>>` to the precise shape
`array{name: string, description: string, required: bool}>` matching its one
real caller (`GetCommandsAction::execute()`), but that caller itself casts
the value through `@var array<int, array<string, mixed>>` in
`app/Actions/Command/GetCommandsAction.php` — a file already in the
other session's dirty set. Fixing it properly would require editing that
file too, entangling the commit with unrelated WIP, so the change was
reverted and left as a documented skip instead.

**PHPStan**: baseline 0 errors → after 0 errors (`./vendor/bin/phpstan
analyse Modules/Job --no-progress --error-format=table`).

**PHPMD**: `./tools/phpmd.sh Modules/Job text ../docs/phpmd.ruleset.xml` ran
to completion (no crash this time). Findings are pre-existing style debt
(CamelCase param names, unused policy params, cyclomatic complexity in
`Schedule::getArguments()` and `Task`) — none introduced by this change, none
in the one file touched (`Status.php`).

**Pest**: `./vendor/bin/pest Modules/Job/tests -c Modules/Job/phpunit.xml
--no-coverage` fails to even bootstrap: `Cannot open bootstrap script
".../Modules/Job/vendor/autoload.php"`. Root cause verified via `git diff
Modules/Job/phpunit.xml`: the same pre-existing dirty WIP changed
`bootstrap="../../vendor/autoload.php"` to `bootstrap="vendor/autoload.php"`
(a module-local path that doesn't exist in this monorepo layout) — not
caused by this session, not touched by this session. Not resolved; flagged
for whoever owns that WIP.

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
