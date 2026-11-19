---
title: "ECC — indice operativo Job"
type: index
status: in-progress
updated: 2026-11-16
module: Job
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ZcXy77
qmd: "ECC indice Job verification gates"
=======
>>>>>>> laraxot/dev
<<<<<<< .merge_file_zikjuP
qmd: "ECC indice Job verification gates"
=======
qmd: "ECC indice Job stato controlli verification gates PHPStan Pest security"
>>>>>>> .merge_file_evZ8TU
<<<<<<< HEAD
=======
>>>>>>> .merge_file_jq63Dr
>>>>>>> laraxot/dev
---

# ECC — modulo Job

Collega le verifiche ECC al workflow PTVX (BMAD → lock → fix → PHPStan/Pest → docs).

| Controllo | Stato | Evidenza |
|---|---|---|
<<<<<<< HEAD
<<<<<<< .merge_file_zikjuP
=======
<<<<<<< .merge_file_ZcXy77
=======
<<<<<<< .merge_file_zikjuP
>>>>>>> .merge_file_jq63Dr
>>>>>>> laraxot/dev
| Inventario statico | verificato | ../bmad/audits/job-audit.md |
| PHPStan | 0 su tree Modules (2026-11-16) | comando in audit |
| Pest | pending | ambiente testing |
| Security review | pending | story figlie P0/P1 |
| Docs pack | aggiornato | questo indice + audit ECC |
<<<<<<< HEAD
=======
<<<<<<< .merge_file_ZcXy77
=======
>>>>>>> laraxot/dev
=======
| Inventario statico | verificato (2026-11-16) | [audit profondo](../bmad/audits/job-audit.md) |
| PHPStan `Modules/Job` | **0 errori** | comando in audit |
| Pest | parziale: 17 pass (`JobStatusAuthorizationTest`), suite completa non eseguita | [audit § Gate](../bmad/audits/job-audit.md#gate) |
| Security review | **aperta** — 2 P0, 2 P1 | [finding](../bmad/audits/job-audit.md#finding) |
| Docs pack | aggiornato (gap-fill) | [audit](../bmad/audit.md), [epics](../bmad/epics.md), [architecture](../bmad/architecture.md) |
>>>>>>> .merge_file_evZ8TU
<<<<<<< HEAD
=======
>>>>>>> .merge_file_jq63Dr
>>>>>>> laraxot/dev

Dettaglio: [job-ecc-audit.md](./job-ecc-audit.md)
