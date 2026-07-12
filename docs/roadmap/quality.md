# Checklist qualità - Job Module

- [x] PHPStan Level 10
- [ ] Copertura Test (Pest) > 85%
- [ ] Massima affidabilità del completamento dei job (> 99.9%)
- [ ] Documentazione dei flussi asincroni aggiornata in `docs/`

## 2026-07-12 PHPMD/PHPInsights sweep

- [x] `app/Models/Policies/JobBasePolicy.php`: removed unused `$xotData = XotData::make()` local variable in `before()` (dead code, `UnusedLocalVariable`).
- [x] `app/Http/Livewire/Broad.php`: removed a leftover `dd('fine')` debug call in `notifyEvent()` — it was halting execution on every real event dispatch (PHPMD `Forbidden functions`, and a genuine bug, not just style).
- Everything else flagged (StaticAccess, naming-length, architecture "must be final" nags, style formatting) left as-is per project convention.
