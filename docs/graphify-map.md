# Job Module — Mappa Graphify

**Versione:** 1.0.0 | **Modulo:** Job | **Data:** 2026-08-02

---

## 📌 Cosa fa il modulo Job

Il modulo **Job** gestisce:
- Schedulazione background job, monitoraggio coda task e automazioni di sistema

---

## 🏗️ Architettura Essenziale

### Entry Points

| Tipo | Classe | Path |
|------|--------|------|
| **Model** | `JobsWaiting` | `app/Models/JobsWaiting.php` |
| **Model** | `Result` | `app/Models/Result.php` |
| **Model** | `Parameter` | `app/Models/Parameter.php` |
| **Model** | `Frequency` | `app/Models/Frequency.php` |
| **Action** | `ExecuteTaskAction` | `app/Actions/ExecuteTaskAction.php` |
| **Action** | `GetActiveSchedulesAction` | `app/Actions/GetActiveSchedulesAction.php` |
| **Action** | `GetTaskCommandsAction` | `app/Actions/GetTaskCommandsAction.php` |
| **Action** | `GetTaskFrequenciesAction` | `app/Actions/GetTaskFrequenciesAction.php` |
| **Service** | `ScheduleService` | `app/Services/ScheduleService.php` |
| **Filament** | `ScheduleArguments` | `app/Filament/ScheduleArguments.php` |
| **Filament** | `ScheduleOptions` | `app/Filament/ScheduleOptions.php` |
| **Filament** | `ActionGroup` | `app/Filament/ActionGroup.php` |

### Dependencies (Incoming)

```
Tutti i moduli → Job (esecuzione task asincroni)
```

### Dependencies (Outgoing)

```
Job → Notify (avviso fallimenti job)
Job → Activity (log esecuzioni)
```

---

## 📊 Grafo Locale (Query Rapide)

### Scoprire Entità Core

```bash
graphify query "Job module models and actions"
```

### Tracciare Flussi

```bash
graphify path --from "JobsWaiting" --to "ExecuteTaskAction"
```

### Trovare Dipendenze

```bash
graphify query "Job dependencies"
```

---

## 🎯 Task Comuni + Graphify

### Task 1: Estendere o Modificare Architettura Job

**Domanda Graphify:**
```bash
graphify query "Job module architecture and entry points"
```

**Workflow:**
1. Ispeziona classi in `app/Models` o `app/Actions`
2. Esegui query `graphify query "Job dependencies"` per verificare impatto
3. Esegui test del modulo

---

## 📋 Test Coverage Map

```bash
graphify query "Job module test coverage"
```

---

## 🚀 Comandi Rapidi

```bash
# Esplora architettura
graphify query "Job module architecture"

# Test coverage
graphify query "Job test coverage"

# Complexity
graphify query "Job high complexity"
```

---

## 📚 Riferimenti

- **Graphify Central:** `docs/graphify-integration.md`
- **Module Discipline:** `docs/wiki/rules/module-naming-discipline.md`

---

**Responsabile:** @marco76tv | **Last updated:** 2026-08-02
