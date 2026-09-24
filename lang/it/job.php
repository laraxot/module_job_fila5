<?php

declare(strict_types=1);

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Job/docs/wiki — domain i18n only.

return array_merge(
    merge_translation_files(__DIR__.'/job_core.php'),
    ['fields' => require_translation_file(__DIR__.'/job_fields.php')],
);
