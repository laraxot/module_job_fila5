<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\JobsWaitingResource\Schemas;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Component as SchemaComponent;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> 40b96bcd6 (.)
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> origin/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class JobsWaitingForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<int|string, SchemaComponent>
=======
     * @return array<int|string, Component>
>>>>>>> 40b96bcd6 (.)
=======
     * @return array<int|string, Component>
>>>>>>> origin/dev
     */
    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'job_id' => TextInput::make('job_id')->required()->maxLength(255),
            'name' => TextInput::make('name')->maxLength(255),
            'queue' => TextInput::make('queue')->maxLength(255),
            'started_at' => DateTimePicker::make('started_at'),
            'finished_at' => DateTimePicker::make('finished_at'),
            'failed' => Toggle::make('failed')->required(),
            'attempt' => TextInput::make('attempt')->required(),
            'exception_message' => Textarea::make('exception_message')->maxLength(65535),
        ];

=======
=======
>>>>>>> origin/dev
            Section::make([
                'name' => TextInput::make('name'),
            ]),
        ];
<<<<<<< HEAD
>>>>>>> 40b96bcd6 (.)
=======
>>>>>>> origin/dev
    }
}
