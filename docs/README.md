---
<<<<<<< HEAD
qmd: "README"
issues: []
discussions: []
title: "Job Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-06-05
---

# Modulo Job

## Overview

Il modulo **Job** gestisce i job asincroni e le code di elaborazione.

## Funzionalità

- Job queue management
- Retry logic
- Failed job handling
- Job monitoring

## Modelli Principali

```php
// Job
Job\Models\Job

// Failed Job
Job\Models\FailedJob

// Job Batch
Job\Models\JobBatch
```

## Services

```php
// Job dispatcher
Job\Services\JobDispatcher

// Queue manager
Job\Services\QueueManager
```

## Collegamenti

- [Documentazione Root](../../../docs/JOB_MODULE.md)
- [Xot Base](../Xot/docs/)
- [Notify Module](../Notify/docs/) - per notifiche job

## Backlinks

- [Queue Config](./queue/)
- [Failed Jobs](./failed/)
=======
title: Readme
module: Job
---
# Job Docs

Module-level documentation folder (`docs/`) for the Job module. Consolidated and cleaned; nested `docs/wiki/` and `build_local/` removed; `_archive` content moved to `docs-archive-2026/` at module root.

## Stories PHPStan

- [2026-10-06 PHPStan cleanup — Job](./stories/2026-10-06-phpstan-cleanup-job.story.md) · [dev](./stories/2026-10-06-phpstan-cleanup-job.dev.md)
>>>>>>> laraxot/dev
