<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Stato Jobs',
        'plural' => 'Stati Jobs',
<<<<<<< HEAD
        'group' => ['name' => 'Sistema', 'description' => 'Monitoraggio dello stato dei jobs'],
=======
        'group' => [
            'name' => 'Sistema',
            'description' => 'Monitoraggio dello stato dei jobs',
        ],
>>>>>>> laraxot/dev
        'label' => 'Stato Jobs',
        'sort' => 73,
        'icon' => 'job-status-animated',
    ],
    'fields' => [
<<<<<<< HEAD
        'name' => ['label' => 'Nome', 'tooltip' => 'Nome del job monitorato', 'placeholder' => 'Inserisci nome del job', 'helper_text' => '', 'description' => ''],
        'guard_name' => ['label' => 'Guard', 'tooltip' => 'Guard associato al job', 'placeholder' => 'Seleziona guard', 'helper_text' => '', 'description' => ''],
        'permissions' => ['label' => 'Permessi', 'tooltip' => 'Permessi associati al job', 'placeholder' => 'Seleziona permessi', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Aggiornato il', 'tooltip' => 'Data dell\'ultimo aggiornamento dello stato del job', 'placeholder' => 'Data di aggiornamento', 'helper_text' => '', 'description' => ''],
        'first_name' => ['label' => 'Nome', 'tooltip' => 'Nome dell\'utente che ha creato o gestisce il job', 'placeholder' => 'Nome responsabile', 'helper_text' => '', 'description' => ''],
        'last_name' => ['label' => 'Cognome', 'tooltip' => 'Cognome dell\'utente che ha creato o gestisce il job', 'placeholder' => 'Cognome responsabile', 'helper_text' => '', 'description' => ''],
=======
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del job monitorato',
            'placeholder' => 'Inserisci nome del job',
            'helper_text' => '',
            'description' => '',
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => 'Guard associato al job',
            'placeholder' => 'Seleziona guard',
            'helper_text' => '',
            'description' => '',
        ],
        'permissions' => [
            'label' => 'Permessi',
            'tooltip' => 'Permessi associati al job',
            'placeholder' => 'Seleziona permessi',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'tooltip' => 'Data dell\'ultimo aggiornamento dello stato del job',
            'placeholder' => 'Data di aggiornamento',
            'helper_text' => '',
            'description' => '',
        ],
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome dell\'utente che ha creato o gestisce il job',
            'placeholder' => 'Nome responsabile',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => 'Cognome dell\'utente che ha creato o gestisce il job',
            'placeholder' => 'Cognome responsabile',
            'helper_text' => '',
            'description' => '',
        ],
>>>>>>> laraxot/dev
    ],
    'actions' => [
        'start' => [
            'label' => 'Avvia',
<<<<<<< HEAD
            'modal' => ['heading' => 'Avvia Job Status', 'description' => 'Vuoi avviare il monitoraggio per questo job?'],
            'messages' => ['success' => 'Monitoraggio avviato con successo'],
=======
            'modal' => [
                'heading' => 'Avvia Job Status',
                'description' => 'Vuoi avviare il monitoraggio per questo job?',
            ],
            'messages' => [
                'success' => 'Monitoraggio avviato con successo',
            ],
>>>>>>> laraxot/dev
            'icon' => 'play',
            'color' => 'primary',
        ],
        'pause' => [
            'label' => 'Pausa',
<<<<<<< HEAD
            'modal' => ['heading' => 'Pausa Job Status', 'description' => 'Vuoi mettere in pausa il monitoraggio di questo job?'],
            'messages' => ['success' => 'Monitoraggio messo in pausa con successo'],
=======
            'modal' => [
                'heading' => 'Pausa Job Status',
                'description' => 'Vuoi mettere in pausa il monitoraggio di questo job?',
            ],
            'messages' => [
                'success' => 'Monitoraggio messo in pausa con successo',
            ],
>>>>>>> laraxot/dev
            'icon' => 'pause',
            'color' => 'warning',
        ],
        'resume' => [
            'label' => 'Riprendi',
<<<<<<< HEAD
            'modal' => ['heading' => 'Riprendi Job Status', 'description' => 'Vuoi riprendere il monitoraggio di questo job?'],
            'messages' => ['success' => 'Monitoraggio ripreso con successo'],
=======
            'modal' => [
                'heading' => 'Riprendi Job Status',
                'description' => 'Vuoi riprendere il monitoraggio di questo job?',
            ],
            'messages' => [
                'success' => 'Monitoraggio ripreso con successo',
            ],
>>>>>>> laraxot/dev
            'icon' => 'redo',
            'color' => 'success',
        ],
        'stop' => [
            'label' => 'Ferma',
<<<<<<< HEAD
            'modal' => ['heading' => 'Ferma Job Status', 'description' => 'Sei sicuro di voler fermare il monitoraggio di questo job?'],
            'messages' => ['success' => 'Monitoraggio fermato con successo'],
=======
            'modal' => [
                'heading' => 'Ferma Job Status',
                'description' => 'Sei sicuro di voler fermare il monitoraggio di questo job?',
            ],
            'messages' => [
                'success' => 'Monitoraggio fermato con successo',
            ],
>>>>>>> laraxot/dev
            'icon' => 'stop',
            'color' => 'danger',
        ],
        'export' => [
            'label' => 'Esporta',
<<<<<<< HEAD
            'modal' => ['heading' => 'Esporta Dati Job Status', 'description' => 'Seleziona il formato per esportare i dati del job'],
            'messages' => ['success' => 'Dati esportati con successo'],
=======
            'modal' => [
                'heading' => 'Esporta Dati Job Status',
                'description' => 'Seleziona il formato per esportare i dati del job',
            ],
            'messages' => [
                'success' => 'Dati esportati con successo',
            ],
>>>>>>> laraxot/dev
            'icon' => 'download',
            'color' => 'info',
        ],
        'label' => 'Stato Jobs',
        'sort' => 73,
        'icon' => 'job-status-animated',
<<<<<<< HEAD
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
    ],
    'messages' => ['no_jobs' => 'Nessun job monitorato al momento', 'job_started' => 'Monitoraggio del job avviato', 'job_paused' => 'Monitoraggio del job messo in pausa', 'job_resumed' => 'Monitoraggio del job ripreso', 'job_stopped' => 'Monitoraggio del job fermato', 'job_exported' => 'Dati esportati correttamente'],
=======
    ],
    'messages' => [
        'no_jobs' => 'Nessun job monitorato al momento',
        'job_started' => 'Monitoraggio del job avviato',
        'job_paused' => 'Monitoraggio del job messo in pausa',
        'job_resumed' => 'Monitoraggio del job ripreso',
        'job_stopped' => 'Monitoraggio del job fermato',
        'job_exported' => 'Dati esportati correttamente',
    ],
>>>>>>> laraxot/dev
    'title' => 'job status',
    'label' => 'Job Status',
    'plural_label' => 'Job Status (Plurale)',
];
