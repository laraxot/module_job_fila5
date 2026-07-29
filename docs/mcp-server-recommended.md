<<<<<<< HEAD
---
module: theme
topic: mcp_server_recommended
=======
<<<<<<< HEAD
---
module: theme
topic: mcp-server-recommended
>>>>>>> provtv/dev
canonical: ../../../Themes/docs/shared-components/mcp_server_recommended.md
---

See canonical documentation: ../../../Themes/docs/shared-components/mcp_server_recommended.md
<<<<<<< HEAD
=======
=======
# MCP Server Consigliati per il Modulo Job

## Scopo del Modulo
Gestione code, job asincroni, schedulazione e workflow.

## Server MCP Consigliati
- `redis`: Per gestione code e job queue.
- `memory`: Per stato temporaneo dei job.
- `fetch`: Per chiamate a servizi esterni durante i job.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "redis": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-redis"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] },
    "fetch": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-fetch"] }
  }
}
```

## Note
- Personalizza la configurazione in base ai workflow e ai servizi esterni utilizzati.
>>>>>>> 400d6cb (.)
>>>>>>> provtv/dev
