---
title: "Risorse esterne — Job"
type: reference
module: Job
status: active
created: 2026-11-25
updated: 2026-11-25
tags: [risorse, link, queue, schedule, soketi, storage]
qmd: "job risorse esterne link queue schedule monitor soketi pusher echo reverb storage s3 minio r2 filament plugin jobs monitor totem"
---

# Risorse esterne — Job

Fonti raccolte studiando gli argomenti del modulo (ex `root-txt-files/`, `root-md-files/`, `archived/`,
`artisan.md`, `links.md`, `schedule*.md`, `soketi.md`, `storage-server*.md`, `tips.md`, `repo.md`, `progress.md`,
`optimization.md`, `filament.md`). Una fonte vale solo quando la si collega a un punto del codice.

## Queue e job

- `php artisan queue:listen --queue=sendemail` (worker su coda dedicata)
- <https://betterprogramming.pub/laravel-fail-retry-or-delay-a-queued-job-from-itself-41e0bb14440c>
- <https://www.section.io/engineering-education/managing-queues-beanstalkd/>
- <https://www.honeybadger.io/blog/job-queues-and-workers-in-laravel-apps/>
- <https://github.com/brendt/aggregate.stitcher.io/tree/v2/app/Jobs> (esempio di job ben strutturati)
- <https://github.com/mooxphp/jobs/tree/main> (modulo jobs di riferimento)

## Schedule e monitoraggio cron

- <https://github.com/spatie/laravel-schedule-monitor>
- <https://github.com/codestudiohq/laravel-totem>
- <https://github.com/stylers-llc/laravel-task-manager>
- <https://github.com/robersonfaria/laravel-database-schedule>
- <https://github.com/hmazter/laravel-schedule-list>
- <https://filamentphp.com/plugins/husam-tariq-database-schedule>
- <https://filamentphp.com/plugins/mvenghaus-schedule-monitor>
- <https://healthchecks.io/> · <https://cronhub.io/> · <https://inspector.dev/laravel/> (monitor SaaS)
- <https://simple-web.dev/the-laravel-scheduler-without-cronjobs>
- <https://www.thisprogrammingthing.com/what-the-f-ck-is-with-all-the-artisan-commands-schedules/>
- <https://websolutionstuff.com/post/laravel-9-cron-job-task-scheduling-tutorial>

## Filament

- <https://github.com/croustibat/filament-jobs-monitor>
- <https://gitlab.com/amvisor/filament-failed-jobs/-/blob/master/src/FilamentFailedJobsServiceProvider.php>
- <https://medium.com/@laravelprotips/laravel-filament-top-12-plugins-simplified-with-demonstrations-a87aa3b63a6d>
- <https://filamentphp.com/community/danharrin-fast-table-pagination> (tabelle grandi)
- <https://dudi.dev/optimize-laravel-database-queries/>

## Progress, streaming, realtime (Artisan da UI)

- <https://fly.io/laravel-bytes/streaming-to-the-browser-with-livewire/>
- <https://fly.io/laravel-bytes/streaming-fly-machines/>
- <https://philo.dev/laravel-batches-and-real-time-progress-with-livewire/>
- <https://dev.to/novu/the-ultimate-guide-to-laravel-reverb-275o>

## Soketi / Pusher / Echo

- <https://kbouzidi.com/real-time-events-with-laravel-and-soketi>
- <https://medium.com/@antoine.lame/using-soketi-with-laravel-902ee1e6b7b>
- <https://github.com/Safemood/REAL-TIME-LARAVEL-9-SOKETI/>
- <https://medium.com/@tthdvd/laravel-reactjs-soketi-triumvirates-step-by-step-guide-to-build-a-real-time-webapp-part-2-f1ed815ec539>
- <https://aboutyou.tech/blog/setup-and-scale-a-websocket-server-with-laravel/>
- <https://3ws.nl/updates/starting-with-laravel-echo-and-pusherjs>
- <https://github.com/laravel/echo/issues/189> · <https://stackoverflow.com/questions/72827752/issues-with-pusher-js-client-in-vue>
- <https://laravel.io/forum/10-09-2016-howto-broadcasting-laravel-echo-laravel-echo-server-and-jwt>
- <https://medium.com/@marques.joaopereira/laravel-echo-laravel-echo-server-api-authentication-using-passport-1d6b847f91c6>
- Tester: <https://www.piesocket.com/websocket-tester> · video: <https://www.youtube.com/watch?v=mDnsC-sfG7I>

## Storage server (S3-compatibili e altri)

Candidati valutati: Wasabi, Rabata.io, Backblaze B2, Google Cloud Storage (`superbalist/laravel-google-cloud-storage`),
Azure Blob, DigitalOcean Spaces, Storj DCS, Telnyx, IBM COS, Oracle OCI, Impossible Cloud.

- Cloudflare R2: <https://medium.com/@antoine.lame/cloudflare-r2-storage-with-laravel-in-5-minutes-553a5403c6f8>
- Linode: <https://stackoverflow.com/questions/61407039/laravel-use-linodes-storage-object-as-an-alternative-to-aws-s3>
- Dropbox: `composer require spatie/flysystem-dropbox`
- Minio: <https://laravel-news.com/minio-s3-compliant-storage> ·
  <https://github.com/amincheloh/cookbook/blob/master/docs/how-to-use-minio-as-laravel-file-storage.md>
