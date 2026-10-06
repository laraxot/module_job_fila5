# Job — Scopo (Nota Second Brain)

## Funzione del modulo
Il modulo **Job** gestisce offerte di lavoro / task (annunci, candidature, assegnazioni, stati workflow) all'interno della piattaforma Fila5. Non è un bug-fixer: è il dominio "lavoro" del sistema multi-tenant.

- Namespace: `Modules\Job\`
- Provider base: estende `XotBaseServiceProvider` (nome dichiarato `public string $name = 'Job'` richiesto, altrimenti boot fallisce).
- Logica: nelle `Actions/` (es. `GetTaskCommandsAction.php`) non in Services; dati in `Datas/*Data.php`.
- Pannello Filament: `AdminPanelProvider.php` con `parent::panel($panel)` DRY.
- Stato PHPStan: 0 errori (level max).
- Wiki locale: `docs/wiki/` con inventario statico, non dichiarazioni di qualità.
