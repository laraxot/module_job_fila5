# Ponytail-audit 2026-07-02: Job module findings

Source: repo-wide ponytail-audit pass, same sweep that produced the Xot and Notify findings (see `Modules/Xot/docs/ponytail-audit-2026-07-02.md`, `Modules/Notify/docs/ponytail-audit-2026-07-02.md`).

## Findings

- **Unused interface (yagni/delete):** `Modules/Job/app/Contracts/TaskInterface.php` had zero implementations anywhere in the codebase. `Modules/Job/app/Models/Task.php` does not implement it, and no other file referenced it (`grep -rn "TaskInterface" Modules/ --include="*.php"` matched only the interface's own declaration). Per the ponytail YAGNI rung, an interface with no consumer is not an architecture decision, it's dead code. Deleted with no replacement.

- **Case-duplicate config directory (delete):** `Modules/Job/Config/config.php` and `Modules/Job/config/config.php` were byte-identical (same md5, same 44-byte content) case-duplicate paths. `Modules/Job/app/Providers/JobServiceProvider.php` extends `XotBaseServiceProvider`, whose `registerConfig()` resolves the module's config directory through `GetModulePathByGeneratorAction`, which reads `config('modules.paths.generator.config.path')`. That setting is `'config'` (lowercase) in `config/modules.php`, so only `Modules/Job/config/` is ever loaded at runtime — `Modules/Job/Config/` (capital C) was dead weight. Since the filesystem here is case-sensitive, both directories existed independently and neither depended on the other; the uppercase one was removed (file plus `.gitkeep`, then the now-empty directory) and the lowercase one, the one actually loaded, was kept untouched. No content merge was needed since the files were identical.

## Verification

- `./vendor/bin/phpstan analyse Modules/Job`: hit a pre-existing, unrelated fatal error (`Cannot redeclare Modules\Xot\Filament\Resources\Pages\XotBaseManageRelatedRecords::getTitle()`) inside the Xot module, present before these changes and outside the scope of this audit.
- `php tools/phpmd.phar Modules/Job/config text cleancode,codesize,controversial,design,naming,unusedcode`: no violations reported. `Modules/Job/app/Contracts` was excluded from this run since the directory no longer exists after the deletion.
- `./vendor/bin/phpinsights analyse Modules/Job/app --no-interaction`: pre-existing style findings only (import ordering in `Enums/Status.php`, `Models/Job.php`, `Models/Task.php`, `Http/Livewire/Job/Status.php`), none referencing `TaskInterface` or either config directory. No new errors introduced by this change.
- Pest/PHPUnit skipped: DB is unreachable in this environment, consistent with prior audit passes in this repo.
- Puppeteer/Playwright skipped: no UI changes were made, only a dead interface and a duplicate config directory were removed.

## Related

- `Modules/Xot/docs/ponytail-audit-2026-07-02.md`: same audit pass, Xot findings (unused contracts, scaffold directories).
- `Modules/Notify/docs/ponytail-audit-2026-07-02.md`: same audit pass, Notify findings (Service-over-Action anti-pattern).
