---
title: "Contratto — AssertAllowedArtisanCommandAction"
type: contract
<<<<<<< .merge_file_BPknTr
action: "Modules\Job\Actions\Console\AssertAllowedArtisanCommandAction"
tags: [contract, action, artisan, security]
created: 2026-11-24
updated: 2026-11-24
=======
action: "Modules\\Job\\Actions\\Console\\AssertAllowedArtisanCommandAction"
module: Job
status: accepted
created: 2026-11-24
updated: 2026-11-26
>>>>>>> .merge_file_zaR5Ar
---

# AssertAllowedArtisanCommandAction

<<<<<<< .merge_file_BPknTr
Sorgente: `app/Actions/Console/AssertAllowedArtisanCommandAction.php`. Perché esiste:
[ADR allowlist a match esatto](../adr/artisan-commands-from-ui-exact-match-allowlist.md).
Unico chiamante in produzione: `Filament/Pages/JobStatus.php::artisan()`.

## Input

- `string $command`: la stringa ricevuta dal client Livewire, così com'è.
- `list<string> $allowed`: l'elenco dei comandi ammessi (per `JobStatus`: `getAllowedCommands()`, derivato dai pulsanti).

## Output

- `void`. Il ritorno senza eccezione significa "comando ammesso".
=======
Difesa di `Filament/Pages/JobStatus.php::artisan()`: il nome del comando arriva dal client Livewire, quindi senza questo controllo chi apre la pagina può
chiedere `migrate:fresh --force` o `db:wipe`. Perché: [ADR 0001](../adr/0001-artisan-commands-from-ui-exact-match-allowlist.md).
Unico chiamante in produzione: `app/Filament/Pages/JobStatus.php`. Sorgente: `app/Actions/Console/AssertAllowedArtisanCommandAction.php`.

## Input

- `string $command`: la stringa ricevuta dal client, così com'è.
- `list<string> $allowed`: i comandi ammessi (per `JobStatus`: `getAllowedCommands()`, derivato dai pulsanti della pagina).

## Output

- `void`. Il ritorno senza eccezione significa «comando ammesso».
>>>>>>> .merge_file_zaR5Ar

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_BPknTr
| JOB-ARTISAN-INV-1 | Ammesso solo se identico a una voce di `$allowed` (`in_array` stretto): niente prefissi, opzioni aggiunte, maiuscole o spazi diversi. | `JOB-ARTISAN-INV-1` |
| JOB-ARTISAN-INV-2 | Un comando rifiutato produce sempre `InvalidArgumentException`, mai un ritorno silenzioso. | `JOB-ARTISAN-INV-2` |

## Effetti collaterali

- Nessuno: non esegue il comando, non scrive log. L'esecuzione (`Artisan::call`) resta al chiamante, dopo il controllo.

## Errori

- `InvalidArgumentException('Artisan command [<cmd>] is not allowed.')` se il comando non è in elenco.
  `JobStatus::artisan()` la cattura e non esegue nulla (`$out` resta vuoto).

## Non fa

- Non controlla chi chiama: l'autorizzazione super-admin è in `JobStatus::artisan()` (`SuperAdminOnlyTrait`), e va
  ripetuta lì anche se questa Action passa.
- Non costruisce l'elenco: non aggiungere qui comandi "di default"; l'elenco viene dai pulsanti della pagina.
- Non accetta argomenti separati né li valida: un comando con parametri non è supportato dal pattern.
- Non è usata da `JobStatusWidget` né da `ScheduleStatusWidget`, che hanno un `in_array` proprio (debito nell'ADR).
=======
| JOB-ARTISAN-INV-1 | Un comando passa solo se è identico a una voce di `$allowed` (`in_array(..., true)`): niente prefissi, opzioni aggiunte, maiuscole o spazi diversi. Se cade, `queue:flush --force` o `route:list --json` passano perché `queue:flush` e `route:list` sono in lista. | `JOB-ARTISAN-INV-1` |
| JOB-ARTISAN-INV-2 | Un comando rifiutato lancia sempre `InvalidArgumentException`, mai un ritorno silenzioso. | `JOB-ARTISAN-INV-2` |
## Effetti collaterali

- Nessuno: non esegue il comando, non scrive log né cache. L'esecuzione (`Artisan::call`) resta al chiamante, dopo il controllo.

## Errori

- `InvalidArgumentException('Artisan command [<cmd>] is not allowed.')` se il comando non è in elenco (INV-2). `JobStatus::artisan()` la cattura e non esegue nulla.

## Non fa

- Non controlla chi chiama: l'autorizzazione super-admin sta in `JobStatus::artisan()` (`SuperAdminOnlyTrait`) e va ripetuta lì anche se questa Action passa.
- Non costruisce l'elenco: non aggiungere «comandi di default»; l'elenco viene dai pulsanti della pagina.
- Non accetta argomenti separati né li valida.
- Limite noto: non è usata da `JobStatusWidget` né da `ScheduleStatusWidget`, che hanno un controllo proprio (debito in ADR 0001).
>>>>>>> .merge_file_zaR5Ar
