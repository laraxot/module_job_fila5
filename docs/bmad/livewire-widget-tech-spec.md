---
<<<<<<< HEAD
=======
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "livewire widget tech spec"
issues: []
discussions: []
>>>>>>> laraxot/dev
title: "Tech spec — Job ritiro"
type: tech-spec
module: Job
related:
  - ./livewire-widget-prd.md
  - ./livewire-inventory.md
---

# Tech spec Job

Stato verificato (audit [livewire-inventory.md](./livewire-inventory.md)):

1. `Broad.php` + `livewire/broad.blade.php` + entry `broad` in `_components.json`: **presenti di nuovo** — ritiro 12.1 da rieseguire e committare.
2. Alias reali (registro piatto, prefix `''`): `broad`, `job.status`, `schedule.crud`, `schedule.status`. Grep temi/base su questi nomi, non su `job.broad`.
3. Chiamanti vivi: solo `job.status` in `filament/pages/job-monitor.blade.php:7` → Cluster B, ritiro condizionato a `JobStatus` Page. `Schedule\*`: solo viste `admin/**` irraggiungibili → rimozione viste + classi.
4. Aggiornare `tests/Unit/JobExecuteCoverage50Test.php` (righe 35, 303, 400 referenziano le classi).
5. PHPStan sui file toccati. Non toccare neon.
