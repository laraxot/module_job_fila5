---
title: "lang split job — claude-audit large file"
type: memory
module: Job
tags: [job, i18n, claude-audit, lang-split]
created: 2026-07-09
updated: 2026-07-09
qmd: "Job lang it split job_core job_fields claude-audit 500 righe"
github:
  repository: "https://github.com/laraxot/module_job_fila5"
  issues: "https://github.com/laraxot/module_job_fila5/issues"
  discussions: "https://github.com/laraxot/module_job_fila5/discussions"
issues:
  - "https://github.com/laraxot/module_job_fila5/issues/1"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/304"
related:
  - ../concepts/claude-audit-static.md
  - ../concepts/phpstan-compliance.md
  - ../concepts/testing.md
  - ../concepts/no-services-no-support-queueable-actions.md
  - ../../INDEX.md
---

# Split `lang/it/job.php` (claude-audit)

## Problema

`lang/it/job.php` >500 righe → finding «Large File» (score quality 65).

## Soluzione

```text
lang/it/job.php          → array_merge loader (~11 righe)
lang/it/job_meta.php     → pages, widgets, navigation
lang/it/job_fields.php   → fields
lang/it/job_actions.php  → actions, messages, validation, …
```

Chiavi invariate: `job::` namespace Laravel invariato via merge.

## Percorso canonico

Il provider carica esclusivamente la directory restituita da `getLangPath()`,
ossia `Modules/Job/lang`. Le traduzioni italiane appartengono quindi a
`lang/it/*.php`; una directory annidata `lang/lang/` non viene caricata e non
deve esistere.

Un vecchio `lang/lang/it/job.php`, codificato ISO-8859 e corrotto inserendo
`|` tra ogni carattere, è stato rimosso. Non aveva chiamanti e duplicava il
file UTF-8 canonico `lang/it/job.php`; conservarlo faceva fallire PHPInsights
prima ancora dell'analisi.

## Collegamenti

- [Audit statico](../concepts/claude-audit-static.md)
- [Conformità PHPStan](../concepts/phpstan-compliance.md)
- [Strategia di test](../concepts/testing.md)
- [Actions al posto di Services e Support](../concepts/no-services-no-support-queueable-actions.md)
- [Indice documentazione Job](../../INDEX.md)

## Altri fix Job 80/0

- Rimosso codice commentato con nesting in `GetTaskCommandsAction`, `Schedule/Crud`
- Doc-ratio su lang split + blade `create.blade.php`
