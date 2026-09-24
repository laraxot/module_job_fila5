# Job Module Architecture

## Overview
The Job module handles background jobs, task scheduling, and queue management.

## Key Components
- **BaseModel:** Foundation for all Job entities
- **Task:** Core job/task entity
- **Frequency:** Schedule patterns (cron-like)
- **Result:** Execution results and logs

## Design Patterns
- **Event-driven:** Tasks trigger on schedule
- **Queue-based:** Support for async execution
- **Monitoring:** Result tracking and notifications

## Dependencies
- Laravel Queue
- Filament Admin
- Spatie Activity Log

<<<<<<< .merge_file_NKg4uQ
See also:
- Filament integration: `docs/wiki/concepts/Job-filament-integration.md`
- Schedule/Cron: `docs/wiki/how-to/Job-schedule-cron.md`
- WebSocket support: `docs/wiki/how-to/Job-websocket-soketi.md`
- Storage servers: `docs/wiki/how-to/Job-storage-server.md`
- Optimization: `docs/wiki/tips/Job-optimization-tips.md`
=======
See also (paths below are relative to this `docs/` folder — the previous
`docs/wiki/...` prefixes pointed one level too deep and at filenames that were
never created):
- Filament integration: [filament.md](./filament.md)
- Schedule/Cron: [schedule.md](./schedule.md)
- WebSocket support: [soketi.md](./soketi.md)
- Storage servers: [storage-server.md](./storage-server.md)
- Optimization: [wiki/tips/optimization-tips.md](./wiki/tips/optimization-tips.md)
>>>>>>> .merge_file_3e7z8i
