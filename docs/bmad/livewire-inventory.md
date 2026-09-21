---
title: "Inventario Job — Livewire HTTP → widget"
type: inventory
module: Job
status: approved
related:
  - ./livewire-widget-prd.md
  - ../../Xot/docs/bmad/livewire-widget-project-context.md
  - ../stories/12.1.retire-job-http-livewire.story.md
---
# Inventario Job

**Perché.** Auto-discover Livewire monta ogni classe in `app/Http/Livewire`. Un `dd()` orfano può detonare in produzione anche senza `@livewire`. Lo scopo di questo inventario è dire cosa ritirare e cosa tenere (e perché).

**Grep 12.1.** Zero `@livewire`. I chiamanti reali usano tag `<livewire:...>`, non la direttiva `@`.

| Classe | Rischio | Verdetto 12.1 |
|--------|---------|---------------|
| `Broad` | `dd('fine')` in `notifyEvent` | **Ritirato P0.** PHP, view `livewire/broad.blade.php`, entry `_components.json` assenti. `grep dd(` in `app/Http/Livewire` = zero |
| `Job\Status` | Artisan `queue:*` da HTTP, `putenv` su `.env` | **Non ritirato.** Chiamanti: `resources/views/filament/pages/job-monitor.blade.php` (pagina Filament `JobMonitor`), `resources/views/admin/home.blade.php` |
| `Schedule\Status` | Artisan `schedule:*` | **Non ritirato.** Chiamanti: `admin/home.blade.php`, `admin/acts/schedule_status.blade.php`, `admin/acts/schedule_manager.blade.php`. Test: `JobExecuteCoverage50Test` istanzia la classe |
| `Schedule\Crud` | Totem frequencies, Task model | **Non ritirato.** Chiamante: `admin/home/acts/task.blade.php` |

Gemelli già widget (intatti, fuori scope 12.1): `ClockWidget`, `QueueListenWidget` (questo già lancia Artisan in widget — SSoT code queue live).

Non montare Status in `discoverWidgets` senza `$isDiscovered` e senza auth super-admin: eseguire `queue:clear` da un widget è un’arma. Se un giorno i tag Blade sopra spariscono, Status/Crud tornano candidati al ritiro (FR-J002).
