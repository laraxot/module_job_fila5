<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Job Batch',
        'plural' => 'Job Batches',
<<<<<<< HEAD
        'group' => ['name' => 'Jobs', 'description' => 'Gestione dei processi in background'],
=======
        'group' => [
            'name' => 'Jobs',
            'description' => 'Gestione dei processi in background',
        ],
>>>>>>> laraxot/dev
        'label' => 'Job Batch',
        'sort' => 10,
        'icon' => 'job-batch-animated',
    ],
    'fields' => [
<<<<<<< HEAD
        'id' => ['label' => 'ID', 'tooltip' => 'Identificativo unico del job batch', 'placeholder' => 'ID del Batch', 'helper_text' => '', 'description' => ''],
        'name' => ['label' => 'Nome', 'tooltip' => 'Nome del batch di job', 'placeholder' => 'Inserisci nome batch', 'helper_text' => '', 'description' => ''],
        'total_jobs' => ['label' => 'Jobs Totali', 'tooltip' => 'Numero totale di jobs nel batch', 'placeholder' => 'Numero di jobs totali', 'helper_text' => '', 'description' => ''],
        'pending_jobs' => ['label' => 'Jobs in Attesa', 'tooltip' => 'Numero di jobs ancora in attesa di elaborazione', 'placeholder' => 'Jobs in attesa', 'helper_text' => '', 'description' => ''],
        'failed_jobs' => ['label' => 'Jobs Falliti', 'tooltip' => 'Numero di jobs che hanno fallito', 'placeholder' => 'Jobs falliti', 'helper_text' => '', 'description' => ''],
        'failed_job_ids' => ['label' => 'ID Jobs Falliti', 'tooltip' => 'Identificativo dei jobs che hanno fallito', 'placeholder' => 'ID dei jobs falliti', 'helper_text' => '', 'description' => ''],
        'options' => ['label' => 'Opzioni', 'tooltip' => 'Opzioni di configurazione per il job batch', 'placeholder' => 'Seleziona opzioni', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Creato il', 'tooltip' => 'Data di creazione del job batch', 'placeholder' => 'Data creazione', 'helper_text' => '', 'description' => ''],
        'cancelled_at' => ['label' => 'Cancellato il', 'tooltip' => 'Data di cancellazione del batch', 'placeholder' => 'Data cancellazione', 'helper_text' => '', 'description' => ''],
        'finished_at' => ['label' => 'Terminato il', 'tooltip' => 'Data di terminazione del batch', 'placeholder' => 'Data di terminazione', 'helper_text' => '', 'description' => ''],
        'guard_name' => ['label' => 'Guard', 'tooltip' => 'Guard a cui è associato il job batch', 'placeholder' => 'Seleziona guard', 'helper_text' => '', 'description' => ''],
        'permissions' => ['label' => 'Permessi', 'tooltip' => 'Permessi associati al job batch', 'placeholder' => 'Seleziona permessi', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Aggiornato il', 'tooltip' => 'Data dell\'ultimo aggiornamento del batch', 'placeholder' => 'Data aggiornamento', 'helper_text' => '', 'description' => ''],
        'first_name' => ['label' => 'Nome', 'tooltip' => 'Nome dell\'utente associato', 'placeholder' => 'Inserisci nome', 'helper_text' => '', 'description' => ''],
        'last_name' => ['label' => 'Cognome', 'tooltip' => 'Cognome dell\'utente associato', 'placeholder' => 'Inserisci cognome', 'helper_text' => '', 'description' => ''],
        'toggleColumns' => ['label' => 'toggleColumns', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'reorderRecords' => ['label' => 'reorderRecords', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'progress' => ['label' => 'progress'],
=======
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Identificativo unico del job batch',
            'placeholder' => 'ID del Batch',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome del batch di job',
            'placeholder' => 'Inserisci nome batch',
            'helper_text' => '',
            'description' => '',
        ],
        'total_jobs' => [
            'label' => 'Jobs Totali',
            'tooltip' => 'Numero totale di jobs nel batch',
            'placeholder' => 'Numero di jobs totali',
            'helper_text' => '',
            'description' => '',
        ],
        'pending_jobs' => [
            'label' => 'Jobs in Attesa',
            'tooltip' => 'Numero di jobs ancora in attesa di elaborazione',
            'placeholder' => 'Jobs in attesa',
            'helper_text' => '',
            'description' => '',
        ],
        'failed_jobs' => [
            'label' => 'Jobs Falliti',
            'tooltip' => 'Numero di jobs che hanno fallito',
            'placeholder' => 'Jobs falliti',
            'helper_text' => '',
            'description' => '',
        ],
        'failed_job_ids' => [
            'label' => 'ID Jobs Falliti',
            'tooltip' => 'Identificativo dei jobs che hanno fallito',
            'placeholder' => 'ID dei jobs falliti',
            'helper_text' => '',
            'description' => '',
        ],
        'options' => [
            'label' => 'Opzioni',
            'tooltip' => 'Opzioni di configurazione per il job batch',
            'placeholder' => 'Seleziona opzioni',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Creato il',
            'tooltip' => 'Data di creazione del job batch',
            'placeholder' => 'Data creazione',
            'helper_text' => '',
            'description' => '',
        ],
        'cancelled_at' => [
            'label' => 'Cancellato il',
            'tooltip' => 'Data di cancellazione del batch',
            'placeholder' => 'Data cancellazione',
            'helper_text' => '',
            'description' => '',
        ],
        'finished_at' => [
            'label' => 'Terminato il',
            'tooltip' => 'Data di terminazione del batch',
            'placeholder' => 'Data di terminazione',
            'helper_text' => '',
            'description' => '',
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => 'Guard a cui è associato il job batch',
            'placeholder' => 'Seleziona guard',
            'helper_text' => '',
            'description' => '',
        ],
        'permissions' => [
            'label' => 'Permessi',
            'tooltip' => 'Permessi associati al job batch',
            'placeholder' => 'Seleziona permessi',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'tooltip' => 'Data dell\'ultimo aggiornamento del batch',
            'placeholder' => 'Data aggiornamento',
            'helper_text' => '',
            'description' => '',
        ],
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => 'Nome dell\'utente associato',
            'placeholder' => 'Inserisci nome',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => 'Cognome dell\'utente associato',
            'placeholder' => 'Inserisci cognome',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
>>>>>>> laraxot/dev
    ],
    'actions' => [
        'import' => [
            'label' => 'Importa',
<<<<<<< HEAD
            'modal' => ['heading' => 'Importa Job Batch', 'description' => 'Seleziona un file XLS o CSV da caricare per importare il job batch'],
            'messages' => ['success' => 'Importazione del job batch avviata con successo'],
=======
            'modal' => [
                'heading' => 'Importa Job Batch',
                'description' => 'Seleziona un file XLS o CSV da caricare per importare il job batch',
            ],
            'messages' => [
                'success' => 'Importazione del job batch avviata con successo',
            ],
>>>>>>> laraxot/dev
            'icon' => 'upload',
            'color' => 'primary',
        ],
        'export' => [
            'label' => 'Esporta',
<<<<<<< HEAD
            'modal' => ['heading' => 'Esporta Job Batch', 'description' => 'Esporta i dati del job batch in un file'],
            'messages' => ['success' => 'Job batch esportato con successo'],
=======
            'modal' => [
                'heading' => 'Esporta Job Batch',
                'description' => 'Esporta i dati del job batch in un file',
            ],
            'messages' => [
                'success' => 'Job batch esportato con successo',
            ],
>>>>>>> laraxot/dev
            'icon' => 'download',
            'color' => 'success',
        ],
        'retry' => [
            'label' => 'Riprova',
<<<<<<< HEAD
            'modal' => ['heading' => 'Riprova Jobs Falliti', 'description' => 'Vuoi riprovare a eseguire i jobs che sono falliti?'],
            'messages' => ['success' => 'Jobs riavviati con successo'],
=======
            'modal' => [
                'heading' => 'Riprova Jobs Falliti',
                'description' => 'Vuoi riprovare a eseguire i jobs che sono falliti?',
            ],
            'messages' => [
                'success' => 'Jobs riavviati con successo',
            ],
>>>>>>> laraxot/dev
            'icon' => 'redo',
            'color' => 'warning',
        ],
        'cancel' => [
            'label' => 'Cancella',
<<<<<<< HEAD
            'modal' => ['heading' => 'Cancella Batch', 'description' => 'Sei sicuro di voler cancellare questo job batch?'],
            'messages' => ['success' => 'Job batch cancellato con successo'],
=======
            'modal' => [
                'heading' => 'Cancella Batch',
                'description' => 'Sei sicuro di voler cancellare questo job batch?',
            ],
            'messages' => [
                'success' => 'Job batch cancellato con successo',
            ],
>>>>>>> laraxot/dev
            'icon' => 'trash',
            'color' => 'danger',
        ],
    ],
<<<<<<< HEAD
    'messages' => ['no_failed_jobs' => 'Nessun job fallito', 'batch_cancelled' => 'Job batch cancellato', 'batch_finished' => 'Job batch completato', 'batch_processing' => 'Job batch in elaborazione'],
    'statuses' => ['pending' => 'In Attesa', 'processing' => 'In Elaborazione', 'completed' => 'Completato', 'failed' => 'Fallito', 'partial' => 'Completato Parzialmente'],
    'types' => ['csv' => 'CSV', 'excel' => 'Excel', 'json' => 'JSON', 'xml' => 'XML'],
    'model' => ['label' => 'job batch.model'],
=======
    'messages' => [
        'no_failed_jobs' => 'Nessun job fallito',
        'batch_cancelled' => 'Job batch cancellato',
        'batch_finished' => 'Job batch completato',
        'batch_processing' => 'Job batch in elaborazione',
    ],
    'statuses' => [
        'pending' => 'In Attesa',
        'processing' => 'In Elaborazione',
        'completed' => 'Completato',
        'failed' => 'Fallito',
        'partial' => 'Completato Parzialmente',
    ],
    'types' => [
        'csv' => 'CSV',
        'excel' => 'Excel',
        'json' => 'JSON',
        'xml' => 'XML',
    ],
    'model' => [
        'label' => 'job batch.model',
    ],
>>>>>>> laraxot/dev
    'label' => 'Job Batch',
    'plural_label' => 'Job Batch (Plurale)',
];
