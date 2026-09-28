---
title: "job filament v5"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "job filament v5"
issues: []
discussions: []
---

# Task: Job Filament v5 Alignment (Clusters)

## 📋 Obiettivo
Organizzare le potenti funzionalità di gestione code in un sistema di Clusters coerente in Filament v5.

## 🏗️ Struttura Proposta
- **QueueCluster**: 
    - **JobResource**: Visualizzazione job correnti.
    - **FailedJobResource**: Gestione errori e retry.
    - **JobBatchResource**: Tracciamento batch.
- **ScheduleCluster**:
    - **TaskResource**: Configurazione task.
    - **ScheduleResource**: Pianificazioni.
    - **ScheduleCalendar**: Visualizzazione grafica (FullCalendar).

## ✅ Checklist
- [ ] Creazione dei Cluster `QueueCluster` e `ScheduleCluster`.
- [ ] Migrazione delle pagine di monitoraggio.
- [ ] Implementazione del polling Livewire nativo v5 per le statistiche delle code.
- [ ] Ottimizzazione dei widget dashboard per il caricamento asincrono.

## 🔗 Riferimenti
- [Roadmap Job](../roadmap.md)
