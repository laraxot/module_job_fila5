---
title: PHPStan wave lane — Job (con User/Notify)
type: story
module: Job
phase: quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - phpstan-test-wave-job.story.md
  - ../../../User/docs/stories/phpstan-wave-lane.story.md
  - ../../../Notify/docs/stories/phpstan-wave-lane.story.md
---

# PHPStan wave lane — Job

Lane disgiunta su TSV `.cursor-scratch/phpstan-wave/Job.tsv` (33 errori / 17 file).

## Scopo

- `phpunit.assertTrue`: preferire `assertTrue($x)` a `assertSame(true, $x)` quando il valore di business è booleano (opzioni batch, frequenze).
- `alreadyNarrowedType`: rimuovere assert tautologici (`assertSame('job','job')`, `assertNotEmpty` su array già non-vuoto, `assertNotNull(new Action)`); tenere assert di comportamento (chiavi options, field names schema, `method` signature, match enum → stringa attesa).
- `variable.unused $action/$provider/$model`: o usare la variabile in un assert di comportamento, o eliminare lo smoke test ridondante rispetto ai test di signature già presenti.

## Misura

| Momento | Errori |
|---|---|
| Baseline TSV | **33** in 17 file |
| Dopo | **0** |

## Famiglie corrette

| Famiglia | Perche' | Fix |
|---|---|---|
| `phpunit.assertTrue` | PHPUnit preferisce assert tipizzato | `assertTrue` su flag options |
| `alreadyNarrowedType` | Assert che non possono fallire | rimossi o sostituiti con chiavi/count/match atteso |
| `variable.unused` | Arrange senza assert | `assertFalse($model->exists)` / rimozione smoke |
| `foreach.nonIterable` | `getDefaultChildComponents()` union | `assertIsArray` prima del foreach |
| `pest.test.emptyClosure` | test vuoto | rimosso o riempito con assert reale |

## Verifica

Artefatto `.cursor-scratch/phpstan-wave/Job.verify.raw` — exit 0 sui 17 path TSV.
Nessun ignore/neon. Nessun commit.
