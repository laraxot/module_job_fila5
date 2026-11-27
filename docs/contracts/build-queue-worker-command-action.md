---
title: "Contratto — BuildQueueWorkerCommandAction"
type: contract
<<<<<<< .merge_file_ZApvwa
action: "Modules\Job\Actions\BuildQueueWorkerCommandAction"
tags: [contract, action, queue, worker, shell]
created: 2026-11-24
updated: 2026-11-24
=======
action: "Modules\\Job\\Actions\\BuildQueueWorkerCommandAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
>>>>>>> .merge_file_INzXdA
---

# BuildQueueWorkerCommandAction

<<<<<<< .merge_file_ZApvwa
Sorgente: `app/Actions/BuildQueueWorkerCommandAction.php`. Perché esiste:
[ADR flag del worker dalle impostazioni del tenant](../adr/queue-worker-flags-from-tenant-settings.md).
Unico chiamante: `Console/Commands/WorkerCheck.php::startQueueListener()`, che passa il risultato a `Safe\exec()`.

## Input

- Nessun parametro. Legge `JobConfigData::make()` (config `job` del tenant corrente).

## Output

- `string`: la riga di shell
  ` /usr/local/bin/php <base_path>/artisan queue:work --timeout=<int> --sleep=<int> --tries=<int> > /dev/null & echo $!`.
=======
La riga finisce in `Safe\exec()` (`Console/Commands/WorkerCheck.php`, riga `exec(app(BuildQueueWorkerCommandAction::class)->execute())`): qualunque testo scelto da un utente
sarebbe un'iniezione di shell. Perché: [ADR 0003](../adr/0003-queue-worker-flags-from-tenant-settings.md). Sorgente: `app/Actions/BuildQueueWorkerCommandAction.php`.

## Input

- Nessun parametro. Legge `JobConfigData::make()` (config `job` del tenant corrente): `timeout_seconds`, `sleep_seconds`, `max_attempts`, tutti `int` (default 60, 5, 3).

## Output

- `string`: ` /usr/local/bin/php <base_path>/artisan queue:work --timeout=<int> --sleep=<int> --tries=<int> > /dev/null & echo $!`.
>>>>>>> .merge_file_INzXdA

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| JOB-WORKER-CMD-INV-1 | Senza impostazioni salvate la riga è identica byte per byte a quella storica (`--timeout=60 --sleep=5 --tries=3`). | `JOB-WORKER-CMD-INV-1` |
| JOB-WORKER-CMD-INV-2 | I tre flag sono i valori salvati in `JobConfigData` (`timeout_seconds`, `sleep_seconds`, `max_attempts`). | `JOB-WORKER-CMD-INV-2` |
<<<<<<< .merge_file_ZApvwa
| JOB-WORKER-CMD-INV-3 | Nella riga entrano solo interi (proprietà `int` della Data) e `base_path()`: nessun testo scelto da un utente. | — |

## Effetti collaterali

- Nessuno: costruisce una stringa. L'esecuzione (`exec`) e il salvataggio del PID in `queue.pid` sul disco `cache`
  sono di `WorkerCheck`.

## Errori

- Nessuna eccezione propria; un valore non intero nel file del tenant fa fallire la costruzione di `JobConfigData`.

## Non fa

- Non avvia il worker e non controlla se è già attivo (`WorkerCheck::isQueueListenerRunning()`).
- Non legge `config('queue.*')` né sceglie la connessione o la coda: `queue:work` usa i default dell'applicazione.
- Non verifica che `--timeout` sia sotto `retry_after` della connessione.
- Non va estesa con opzioni stringa libere: ogni valore nuovo nella riga passa da una proprietà tipizzata della Data.
=======
| JOB-WORKER-CMD-INV-3 | Nella riga entrano solo interi (proprietà `int` della Data) e `base_path()`: nessun testo scelto da un utente. Se cade, la riga passata a `exec()` diventa iniettabile. | — (non dimostrato) |
## Effetti collaterali

- Nessuno: costruisce una stringa. L'esecuzione (`exec`) e il salvataggio del PID in `queue.pid` sul disco `cache` sono di `WorkerCheck`.

## Errori

- Nessuna eccezione propria: un valore non intero nel file del tenant fa fallire la costruzione di `JobConfigData`, non questa Action.

## Non fa

- Non esegue il comando e non verifica se un worker è già attivo.
- Non controlla che `timeout_seconds` resti sotto `retry_after` della connessione di coda.
- Limite noto: il percorso `/usr/local/bin/php` è scritto nell'Action; `base_path()` non è escapato per la shell, quindi un percorso con spazi o metacaratteri romperebbe la riga (non verificato a runtime).
>>>>>>> .merge_file_INzXdA
