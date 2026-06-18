---
<<<<<<< HEAD
title: "Second Brain Local Discipline (stub Job)"
type: concept
module: Job
tags: [second-brain, stub, hackernoon, harness]
created: 2026-06-05
updated: 2026-06-05
qmd: "job second brain stub canonical xot harness hackernoon llm-wiki"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/272"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
related:
  - ../../../../Xot/docs/wiki/concepts/second-brain-local-discipline.md
  - ../../../../docs/wiki/concepts/ai-harness-module-discipline.md
  - ../../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md
  - ../../../../../../bashscripts/tools/prompts/llm-wiki.txt
---

# Contratto wiki locale — stub Job

| Risorsa | Link |
|---------|------|
| **Canon** | [Xot second-brain-local-discipline.md](../../../../Xot/docs/wiki/concepts/second-brain-local-discipline.md) |
| **Harness moduli** | [ai-harness-module-discipline.md](../../../../docs/wiki/concepts/ai-harness-module-discipline.md) |
| **Tips 001–022** | [hackernoon map](../../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md) |
| **Prompt router** | [llm-wiki.txt](../../../../../../bashscripts/tools/prompts/llm-wiki.txt) |

Solo decisioni specifiche di **Job** in `docs/wiki/`; contratto generico in Xot.
=======
title: "Second Brain Local Discipline"
type: "concept"
tags: [second-brain, llm-wiki, on-demand, local-docs]
created: 2026-05-19
updated: 2026-05-19
---

# Second Brain Local Discipline

> Local module/theme wiki discipline. Keep durable knowledge close to the code it explains, and route cross-cutting behavior back to the root wiki.

## Local Contract

- This wiki documents only knowledge owned by this module/theme.
- Root rules stay in `docs/wiki/rules/00-TRIGGER_MAP.md` and are linked, not copied.
- Source docs are evidence; they are not assumed immutable or technically read-only.
- Use QMD with `--limit` before opening raw docs or broad file trees.
- Add reusable local decisions to this wiki and append the nearest `log.md`.

## What To Store Here

- Local business rules, UI behavior, model/resource caveats, migrations, integrations.
- Source summaries that remove future rediscovery work.
- Troubleshooting notes backed by commands, errors, tests, or code references.
- Links to root rules when local behavior depends on shared Laraxot/XotBase/wiki policy.

## What Not To Store Here

- Duplicated root policy bodies.
- Merge debris, backup files, or `_archive/` wiki folders.
- Large pasted external articles.
- Claims such as "read-only" or "always" unless verified in the current tree.

## Quality Gate

Before closing a docs update in this module/theme:

1. Check root trigger map for relevant rules.
2. Search local wiki with `qmd search "<module-or-theme> <topic>" --limit 5`.
3. Update or create the smallest local page that captures the durable decision.
4. Link it from `index.md` when it should be discoverable by future agents.
5. Append `log.md` for reusable decisions.

## Root References

- `docs/wiki/rules/00-TRIGGER_MAP.md`
- `docs/wiki/rules/on-demand-pattern.md`
- `docs/wiki/concepts/second-brain-operating-model.md`
- `docs/wiki/concepts/second-brain-continuous-improvement.md`
- `docs/wiki/sources/second-brain-external-benchmarks.md`
>>>>>>> 8cd86cb (.)
