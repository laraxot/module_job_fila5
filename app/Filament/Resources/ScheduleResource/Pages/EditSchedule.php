<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Filament\Notifications\Notification;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Support\Components\Component;
=======
>>>>>>> c88446c (.)
=======
use Filament\Support\Components\Component;
>>>>>>> 1b72f96 (.)
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Override;
use Webmozart\Assert\Assert;

class EditSchedule extends XotBaseEditRecord
{
    // TransTrait è già incluso in XotBaseEditRecord - non ridichiarare

<<<<<<< HEAD
    /** @var Collection<int, mixed> */
=======
>>>>>>> c88446c (.)
    public Collection $commands;

    protected static string $resource = ScheduleResource::class;

    #[Override]
<<<<<<< HEAD
<<<<<<< HEAD
    protected function getFormSchema(): array
    {
        $schema = $this->getResource()::getFormSchema();
        Assert::isArray($schema);

        $components = array_values($schema);
        Assert::allIsInstanceOf($components, Component::class);

        return $components;
=======
    public function getformSchema(): array
=======
    protected function getFormSchema(): array
>>>>>>> 1b72f96 (.)
    {
        $schema = $this->getResource()::getFormSchema();
        Assert::isArray($schema);

<<<<<<< HEAD
        return $res;
>>>>>>> c88446c (.)
=======
        $components = array_values($schema);
        Assert::allIsInstanceOf($components, Component::class);

        return $components;
>>>>>>> 1b72f96 (.)
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    // protected function getRedirectUrl(): string
    // {
    //    return $this->getResource()::getUrl('index');
    // }
}
