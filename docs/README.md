# Job

[![Module](https://img.shields.io/badge/Module-Job-8B0000.svg)]()
[![Laravel](https://img.shields.io/badge/Laravel-13-red?style=for-the-badge)](https://laravel.com/)
[![Filament](https://img.shields.io/badge/Filament-5-ffab00?style=for-the-badge)](https://filamentphp.com/)
[![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=for-the-badge)](https://php.net/)
[![PHPStan](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen?style=for-the-badge)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue?style=for-the-badge)](https://www.php-fig.org/psr/psr-12/)
[![Architecture](https://img.shields.io/badge/Architecture-Modular-purple?style=for-the-badge)](https://martinfowler.com/articles/paradigm-shifts.html)

> **Job asincroni, scheduling e monitoraggio code per l'ecosistema Laraxot.**

## Perché esiste

Gestione di job asincroni, code e task pianificati (scheduling): modelli `Task`, `Schedule`,
`Job`, `JobBatch`, `FailedJob`, `Import`/`Export`/`FailedImportRow`, con le relative risorse
Filament di monitoraggio.

## Superpoteri

- Scheduling e cron job (`app/Models/Schedule.php`, `app/Actions/Schedule/`)
- Monitoraggio code e job falliti via Filament (`app/Filament/Resources/`, `app/Filament/Widgets/`)
- Azioni accodabili con `Spatie\QueueableAction` (niente Services — vedi `wiki/concepts/no-services-no-support-queueable-actions.md`)

## Documentazione

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [readme-en.md](./readme-en.md) |
| 📚 Indice tecnico | [00-index.md](./00-index.md) |
| 🧠 Wiki (second brain) | [wiki/](./wiki/) |

---

**Modulo** `Job` · **Laraxot** · PHPStan 10 · Filament 5
