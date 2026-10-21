---
title: "Seeder Job: log di avanzamento opzionale"
status: done
created: 2026-10-21
updated: 2026-10-21
module: Job
---

# Seeder Job: log di avanzamento opzionale

## Obiettivo

`JobDatabaseSeeder` orchestra i seeder dei modelli Job. Il log di avanzamento
serve a chi lancia `php artisan db:seed` e vede a schermo lo stato del lavoro.

## Causa

`Illuminate\Database\Seeder::$command` e' nullable: il seeder puo' essere
invocato da codice (test, altri seeder, `call()`) senza un Command attivo.
Il codice chiamava `$this->command->info(...)` senza controllo, quindi PHPStan
Level 10 segnalava `Cannot call method info() on Command|null`.

## Decisione

Usare l'operatore null-safe `$this->command?->info(...)`. Il messaggio e'
informativo: se non c'e' console non deve cambiare il comportamento dei
seeder figli, quindi non serve un ramo `if` ne' un logger.

## Verifica

- PHPStan Level 10 su `Modules/Job`: esito nel report di chiusura.
- Nessuna modifica ai seeder figli, ai dati o alle migrazioni.

## Riferimenti

- Lock: `laravel/Modules/Job/database/seeders/JobDatabaseSeeder.php.lock` (task `phpstan-job-seeder-command-nullable`, rilasciato a fine lavoro)
- Segnalazione PHPStan: 2 errori su `database/seeders/JobDatabaseSeeder.php` (righe 16 e 36).
