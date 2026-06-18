<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ScheduleResource\Pages;

use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Validation\ValidationException;
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\Xot\Filament\Traits\NavigationPageLabelTrait;
use UnexpectedValueException;
use Webmozart\Assert\Assert;

final class CreateSchedule extends XotBaseCreateRecord
{
    use NavigationPageLabelTrait;

<<<<<<< HEAD
<<<<<<< HEAD
    /** @var Collection<int, mixed> */
    public Collection $commands;

=======
>>>>>>> 860dff1 (.)
=======
>>>>>>> 8bc3175 (.)
    protected static string $resource = ScheduleResource::class;

    /**
     * @return array<Htmlable|string>
     */
    public function getFormSchema(): array
    {
        $res = $this->getResource()::getFormSchema();
        Assert::isArray($res);
<<<<<<< HEAD
=======
<<<<<<< Updated upstream
        return $res;
=======
>>>>>>> 8bc3175 (.)

        $components = [];

        foreach ($res as $component) {
            if ($component instanceof Htmlable || is_string($component)) {
                $components[] = $component;

                continue;
            }

            throw new UnexpectedValueException(
                'Schedule schema accepts only Htmlable components or strings.',
            );
        }

        return $components;
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
>>>>>>> 8bc3175 (.)
    }

    public function schema(Schema $schema): Schema
    {
        $formSchema = $this->getFormSchema();

        return $schema->components($formSchema);
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }
}
