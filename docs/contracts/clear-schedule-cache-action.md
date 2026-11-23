---
title: "Contratto — ClearScheduleCacheAction"
type: contract
action: "Modules\\Job\\Actions\\Schedule\\ClearScheduleCacheAction"
tags: [contract, action, cache, schedule]
created: 2026-11-23
updated: 2026-11-23
---

# ClearScheduleCacheAction

Contratto di comportamento per l'invalidazione della cache degli schedule.

## Input

- Nessun argomento.
- `job::cache.store` e `job::cache.key` dalla configurazione del modulo.

## Output

- `void`.

## Invarianti

- **JOB-CACHE-INV-1** — L'Action invalida esclusivamente la chiave configurata
  nello store configurato; non svuota l'intero store.
  Verifica strutturale: `Modules/Job/tests/Unit/Actions/Schedule/ScheduleActionsTest.php`
  (`ClearScheduleCacheAction uses QueueableAction and has execute method`).
- **JOB-CACHE-INV-2** — Se store o chiave non sono stringhe configurate,
  `Assert::string()` interrompe l'esecuzione prima dell'invalidazione.

## Effetti collaterali

- Chiama `Cache::store($store)->forget($key)` e quindi rimuove la voce di cache
  configurata.
- Non esegue query sul database e non invia eventi o notifiche.

## Errori

- `InvalidArgumentException` da Webmozart Assert quando store o chiave non sono
  stringhe.
- Le eccezioni del cache store vengono propagate al chiamante.

## Non fa

- Non modifica gli schedule persistiti.
- Non ricostruisce la cache e non legge gli schedule attivi.
- Non invalida altre chiavi o altri store.
