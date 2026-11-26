---
title: "Contratto — ExecuteTaskAction"
type: contract
action: "Modules\\Job\\Actions\\ExecuteTaskAction"
module: Job
status: accepted
updated: 2026-11-26
---

# ExecuteTaskAction

Classe: `Modules\\Job\\Actions\\ExecuteTaskAction` · `@contract docs/contracts/execute-task-action.md`

Stato attuale: **stub esplicito** — non esegue task finché non è implementata (Roadmap).

## Input

- `string $taskId`

## Output

- `string` (previsto); oggi non ritorna.

## Invarianti

| ID | Regola | Verifica |
|---|---|---|
| JOB-EXEC-INV-1 | Finché non implementata, `execute()` lancia `BadMethodCallException` (fail-loud, niente no-op silenzioso). | `->group('JOB-EXEC-INV-1')` |
| JOB-EXEC-INV-2 | Nessuna scrittura DB o dispatch job finché l'implementazione non esiste. | `->group('JOB-EXEC-INV-2')` |

## Effetti collaterali

- Nessuno (oggi).

## Errori

- `BadMethodCallException` sempre.

## Non fa

- Non è il worker Artisan allowlist (`BuildQueueWorkerCommandAction` / ADR Job).
