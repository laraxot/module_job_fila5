# Job Module — Structure & Discipline

## Module Root (PascalCase)

```
Modules/Job/
├── app/              # Domain logic (jobs, listeners, queues)
├── config/           # Laravel config (lowercase)
├── database/         # Migrations, seeders (lowercase)
├── resources/        # Views, lang files (lowercase)
├── routes/           # HTTP/API routes (lowercase)
├── tests/            # Unit, feature tests (lowercase)
├── docs/             # Module documentation (THIS FOLDER)
└── composer.json     # Module metadata
```

## What Does NOT Belong Here

### ❌ rector.php

**Rector is a global tool**, not a module concern. All refactoring rules are configured in `laravel/rector.php` (project root).

If Job module needs custom refactoring:
1. Add conditional logic to `laravel/rector.php`
2. Document the rule here in `docs/`
3. Never create `Job/rector.php`

### ❌ phpstan.neon, ci.yml, .env

Configuration files belong at project root, not in modules. They scatter tool setup and break type-checking.

## Internal File Naming

- **Files**: `SendQueueJobAction.php`, `JobDispatcher.php` (PascalCase)
- **Directories**: `actions/`, `listeners/`, `jobs/`, `traits/` (lowercase)
- **Namespaces**: `Modules\Job\...` (PascalCase only at root level)

## Documentation Structure

```
docs/
├── MODULE_STRUCTURE.md   # This file
├── QUICKSTART.md         # Usage examples
├── API.md                # Public interfaces
└── DECISIONS.md          # Why we chose X over Y
```

## See Also

- [Project Module Discipline](../../../docs/rules/module-root-configuration-discipline.md)
- `laravel/rector.php` — Global refactoring configuration
- `laravel/phpstan.neon` — Global type-checking configuration
