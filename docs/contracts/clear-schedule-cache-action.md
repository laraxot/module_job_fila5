---
<<<<<<< .merge_file_w3wZsa
title: "Contratto — ClearScheduleCacheAction"
type: contract
action: "Modules\Job\Actions\ClearScheduleCacheAction"
tags: [contract, action, cache, schedule, legacy]
created: 2026-11-24
updated: 2026-11-24
---

# ClearScheduleCacheAction

Sorgente: `app/Actions/ClearScheduleCacheAction.php`. Chiamanti: `Observers/ScheduleObserver.php::clearCache()`
(su created/updated/saved/deleted di `Schedule`, solo se `config('job::cache.enabled')`) e
`Console/Commands/ScheduleClearCacheCommand.php` (sempre). Contratto di codice legacy: descrive com'è.
=======
title: "Contratto — Schedule\ClearScheduleCacheAction"
type: contract
action: "Modules\\Job\\Actions\\Schedule\\ClearScheduleCacheAction"
module: Job
status: accepted
created: 2026-11-23
updated: 2026-11-26
---

# Schedule\ClearScheduleCacheAction

Invalida la chiave di cache che `Schedule\GetActiveSchedulesAction` riempie con `rememberForever`. Chiamanti: `app/Observers/ScheduleObserver.php` (riga 65) e `app/Console/Commands/ScheduleClearCacheCommand.php` (riga 30).
È la versione viva; quella nella radice di `app/Actions` è deprecata: [root-clear-schedule-cache-action](root-clear-schedule-cache-action.md). Sorgente: `app/Actions/Schedule/ClearScheduleCacheAction.php`.
>>>>>>> .merge_file_1Ga429

## Input

- Nessun parametro. Legge `config('job::cache.store')` e `config('job::cache.key')`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_w3wZsa
| JOB-SCHED-CACHE-INV-1 | Cancella una sola chiave (`job::cache.key`) su un solo store (`job::cache.store`), mai un flush dello store. | — |
| JOB-SCHED-CACHE-INV-2 | Store e chiave sono gli stessi che `GetActiveSchedulesAction` usa per `rememberForever`. | — |

## Effetti collaterali

- `Cache::store($store)->forget($key)`.

## Errori

- `Webmozart\Assert\InvalidArgumentException` se `job::cache.store` o `job::cache.key` non sono stringhe. Nel checkout
  attuale `config/config.php` di Job ritorna `[]` e queste chiavi non esistono (vedi docblock di `JobConfigData`):
  l'observer non chiama mai l'Action (`enabled` è null), mentre `ScheduleClearCacheCommand` fallisce su questa Assert.

## Non fa

- Non ricarica la cache: la ripopola il prossimo `GetActiveSchedulesAction::execute()` con cache attiva.
- Non tocca la cache dello scheduler di Laravel (`schedule:clear-cache` è un altro comando).
- Esiste un duplicato con lo stesso corpo, `Modules\Job\Actions\Schedule\ClearScheduleCacheAction`, senza chiamanti in
  produzione (la story `../stories/job-services-to-actions.story.md` lo dichiara come versione da tenere, il codice usa questa):
  non creare una terza copia; chi consolida sceglie una delle due e aggiorna questo contratto.
=======
| JOB-SCHEDCACHE-INV-1 | Cancella solo la chiave `job::cache.key` nello store `job::cache.store` (`Cache::store($store)->forget($key)`), mai `flush`. | — (non dimostrato) |
| JOB-SCHEDCACHE-INV-2 | Se `store` o `key` non sono stringhe in config, `Assert::string` lancia prima di toccare la cache. | — (non dimostrato) |
## Effetti collaterali

- Un `forget` sullo store di cache configurato. Nessun evento, coda o scrittura su database.

## Errori

- `InvalidArgumentException` di `Webmozart\Assert` con messaggio `[riga][classe]` per config non stringa (INV-2).

## Non fa

- Non verifica che il cache store esista e non ricostruisce la cache: al prossimo `GetActiveSchedulesAction` la ricalcola.
- Non dipende da `job::cache.enabled`: svuota anche se la cache è spenta.
>>>>>>> .merge_file_1Ga429
