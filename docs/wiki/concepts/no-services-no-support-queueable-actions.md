---
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "no services no support queueable actions"
issues: []
discussions: []
title: No Services/No Support — QueueableAction
status: draft
---

# Regola

`app/Services/` e `app/Support/` non esistono in questo modulo. Ogni logica di dominio vive in `app/Actions/{Contesto}/FooAction.php`, con `use Spatie\QueueableAction\QueueableAction;` e unico metodo pubblico `execute()`.

## Conversione 2026-07-20

- `app/Services/ScheduleService.php` (2 responsabilità) → `ClearScheduleCacheAction` per l’unico use-case ancora
  osservabile; nessuna action è stata mantenuta per il caso `getActives()` senza caller.
- Caller: `ScheduleObserver::clearCache()`, `ScheduleClearCacheCommand::handle()` → `app(Modules\Job\Actions\ClearScheduleCacheAction::class)->execute()`.
- I test reflection-only del vecchio Service e del duplicato `GetActiveSchedulesAction` sono stati rimossi.

## Stato dei duplicati

Il censimento dei caller ha confermato che `GetActiveSchedulesAction` non aveva alcun caller
applicativo: era mantenuta solo dal proprio test reflection-only ed è stata rimossa insieme al test.
`ClearScheduleCacheAction` è invece l’action live usata da `ScheduleObserver` e
`ScheduleClearCacheCommand`, quindi è rimasta al suo posto. Non esiste una cartella
`app/Actions/Schedule/` nel working tree.

## Perché

Un Service con due responsabilità indipendenti (lettura cache vs invalidazione cache) diventa due Action mono-responsabilità: più facile testare, più facile capire chi chiama cosa, nessuno stato condiviso tra le due operazioni.
