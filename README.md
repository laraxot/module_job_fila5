# ⚙️ Job — il posto dove il lavoro lento smette di essere un problema tuo

[![PHP](https://img.shields.io/badge/PHP-%5E8.3-777BB4.svg)](composer.json)
[![Laravel](https://img.shields.io/badge/Laravel-%5E13.0-FF2D20.svg)](composer.json)
[![Filament](https://img.shields.io/badge/Filament-%5E5.0-FDAB3D.svg)](composer.json)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%20max%2C%200%20errori-brightgreen.svg)](../../phpstan.neon)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

> Un export CSV da 40.000 righe, un geocoding massivo, un batch di notifiche:
> nessuna di queste cose deve tenere un utente a fissare uno spinner. Job è
> il muro tra "l'utente clicca" e "il sistema fatica" — e un muro si giudica
> da quanto resta in piedi sotto carico, non da com'è disegnato.

I badge sopra sono verificati, non incollati: `phpstan analyse Modules/Job`
a livello `max`, l'1 settembre 2026, a tree fermo. Rilanciabile:
`cd laravel && ./vendor/bin/phpstan analyse Modules/Job`.

---

## Perché

Ogni sistema con dati reali arriva al punto in cui un'operazione richiede
secondi o minuti, non millisecondi. La domanda non è "come lo rendo veloce":
è "come lo tolgo dalla request". Job dispatcha, monitora, ritenta — così il
resto del progetto può trattare un export bulk o un geocoding massivo come
un dettaglio infrastrutturale, non come un problema da risolvere ogni volta
da capo in ogni modulo che ne ha bisogno.

## Logica

Un job non è "andato bene" solo perché non ha lanciato un'eccezione: deve
essere ripetibile senza effetti doppi. Un retry su un export che ha già
scritto metà file, o su una notifica già inviata, è un bug più subdolo di un
crash — perché non si vede finché qualcuno non riceve due email uguali. La
disciplina di questo modulo è: idempotenza prima di tutto, poi retry, poi
monitoraggio.

## Filosofia

**La coverage è la prova di un contratto osservabile, non un numero da
inseguire.** `docs/coverage.md` lo dice meglio di come lo direi io: un test
che esegue un metodo per farlo comparire nel report, senza assertion vere
sul risultato, non protegge da nessuna regressione — occupa solo spazio.
Story 4.26 ha già applicato questo principio qui: 4 file di test cancellati
perché ingoiavano eccezioni, chiamavano API protette o testavano classi
immaginarie; 8 corretti perché avevano un contratto vero da verificare.

## Religione

**Un numero pubblicato deve essere riproducibile lo stesso giorno.** La
tabella sotto viene da un comando lanciato l'1 settembre 2026, non da una
stima "circa". Se non è misurabile, questo file lo dice — non arrotonda.

## Politica

`laravel/phpstan.neon` è sacro: nessun agente lo tocca per far sparire un
errore. Ogni verifica gira nuda, senza `--level` custom.

## Zen

Un job che nessuno nota è un job che ha funzionato. Il giorno in cui qualcuno
lo nota, è già tardi per essere eleganti — conta solo che riparta pulito.

---

## Stato misurato — 1 settembre 2026

Fonte numeri quality gate: run isolata di `base-ptvx-fila5-80` dopo il
ripristino di `vendor/` e `composer update -W` (autoloader 13.041 → 25.358
classi — misure precedenti su questo modulo non sono comparabili).

| Metrica | Valore | Comando |
|---|---:|---|
| PHPStan | **0 errori**, `level: max` | `./vendor/bin/phpstan analyse Modules/Job` |
| `@phpstan-ignore` residui | 0 | `grep -rc "@phpstan-ignore" app/` |
| PHPMD su `app/` | 116 rilievi | `./tools/phpmd.sh Modules/Job/app` |
| PHPInsights — Code | 88.2 % | `./tools/phpinsights.sh Modules/Job` |
| PHPInsights — Architecture | **71.4 %** — il valore più basso fra i moduli "puliti" del progetto (la media si aggira sul 92-93%) | idem |
| Casi di test | 347 | `./vendor/bin/pest Modules/Job` |

**71,4% di Architecture non è un dettaglio da ignorare**: è il segnale più
concreto di dove intervenire dopo. Un modulo che orchestra job/queue/retry
ha naturalmente più accoppiamento di uno che espone un CRUD — ma il numero
va verificato leggendo l'output di PHPInsights, non giustificato a priori.

## Debito noto, non risolto in questo giro

`docs/a.git` è un file gitlink orfano (`gitdir:
../../../../.git/modules/laravel/Modules/Job/modules/docs`) — residuo di un
worktree o submodule rotto in passato. Non tocca il codice, ma è debito da
pulire: fuori scope per un README.

## Cosa contiene

- **Dispatch e queue** — integrazione Laravel queue/Horizon per
  l'esecuzione asincrona di export, geocoding, notifiche bulk.
- **Dashboard Filament** — monitoraggio job in corso, falliti, in retry.
- **Pattern idempotenti** — i job scritti qui sono pensati per essere
  rilanciati senza effetti doppi.

## Come si verifica (non fidarti di questo file)

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Job   # 0 errori atteso
./tools/phpmd.sh Modules/Job/app           # NON la root del modulo
./tools/phpinsights.sh Modules/Job
./vendor/bin/pest Modules/Job
```

## Documentazione

| | |
|---|---|
| Contratto qualità/coverage (filosofia dei test) | [`docs/coverage.md`](docs/coverage.md) |
| Architettura | [`docs/ARCHITECTURE.md`](docs/ARCHITECTURE.md) |
| Wiki tecnica | [`docs/`](docs/) |

---

**Modulo** `job` · **Laraxot / FixCity Platform** · licenza MIT
