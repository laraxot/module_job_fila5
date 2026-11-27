<?php

declare(strict_types=1);

use Modules\Job\Filament\Resources\JobResource;
use Modules\Job\Tests\TestCase;

uses(TestCase::class);

/*
<<<<<<< .merge_file_tTRolE
 * ADR docs/adr/jobs-table-read-only-in-admin.md: la tabella jobs la scrive la coda, non una persona.
=======
 * ADR docs/adr/0002-jobs-table-read-only-in-admin.md: la tabella jobs la scrive la coda, non una persona.
>>>>>>> .merge_file_llW2f2
 * Una pagina create/edit registrata nella risorsa riaprirebbe la scrittura a mano del payload.
 */
it('registers only list and board pages on JobResource, never create or edit', function (): void {
    expect(array_keys(JobResource::getPages()))->toEqualCanonicalizing(['index', 'board']);
});
