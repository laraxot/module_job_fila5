<?php

declare(strict_types=1);
<<<<<<< HEAD

// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Job/docs/wiki — domain i18n only.

return merge_translation_files(__DIR__.'/job_meta.php', __DIR__.'/job_actions.php',
);
=======
// Job translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// Canon: Modules/Job/docs/wiki — domain i18n only.

$meta = require __DIR__.'/job_meta.php';
$actions = require __DIR__.'/job_actions.php';

if (! is_array($meta) || ! is_array($actions)) {
    throw new \UnexpectedValueException('Job translations must return arrays.');
}

return array_replace_recursive($meta, $actions);
>>>>>>> laraxot/dev
