# ⚙️ Job

[![Domain-Queue](https://img.shields.io/badge/Domain-Queues%20%26%20Jobs-5D4037.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![FixCity Platform](https://img.shields.io/badge/Platform-FixCity-008758.svg)](#)

> **Lavoro pesante fuori dalla request.** Code, batch, retry — UX veloce anche sotto carico.

---

<<<<<<< .merge_file_7fTtFn
## Scopo e confini

Job è il pannello di controllo delle code, non una libreria di job: 82 file Filament
contro 15 Action, 9 Resource sulle 14 tabelle operative che possiede, e `require` in
`composer.json` che contiene solo `php: ^8.3`. Non conosce nessun dominio (112 file
toccano Xot, 4 toccano User, zero tutto il resto) e nessuno conosce lui: **un solo file
in tutto il monorepo importa da `Modules\Job`**
(`Modules/Media/.../ListMediaConverts.php:9`, per un widget).

I confini rotti sono due, entrambi verificabili in un comando: `app/Services/ScheduleService.php`
viola la policy no-services e duplica due Action che esistono già in doppia copia — e le
20 chiamate a `config('job::…')` puntano a un namespace che nessun provider registra e
nessun file di config definisce.

Scopo esteso, misure e mosse: [docs/scopo.md](docs/scopo.md).

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
=======
## Perché esiste
>>>>>>> .merge_file_nzdFA7

Geocoding, export, notifiche bulk non devono bloccare l’utente.

## Superpoteri

- Job e queue Laravel
- Integrazione Horizon-ready
- Monitoring Filament
- Pattern idempotenti

## Certificazioni

| Certificazione | Stato |
|----------------|-------|
| PHPStan livello 10 | Target progetto |
| `declare(strict_types=1)` | Su nuovo codice PHP |
| Filament 5 + XotBase | Admin enterprise |
| Test PHPUnit / Pest | Suite modulo |
| Documentazione wiki | Cartella `docs/` |

## Vuoi entrare nel team?

Scala **senza paura** — async fatto bene.

Stack frontoffice: **Tailwind · Alpine · Lit · DaisyUI · Flowbite · Filament v5** — vedi [STORY-133](../../../docs/stories/STORY-133-frontend-stack-religion-tailwind-alpine-lit.md).

---

## Documentazione

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

<<<<<<< .merge_file_7fTtFn
**Modulo** `job` · **Laraxot / FixCity Platform** · licenza MIT

---

## Scopo del modulo

Perche' esiste, come raggiungere meglio il suo scopo e cosa **non** gli appartiene:
[`docs/purpose.md`](./docs/purpose.md).
=======
**Modulo** `job` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
>>>>>>> .merge_file_nzdFA7
