<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ExportResource\Schemas;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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

class ExportForm extends XotBaseResourceForm
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
            'name' => TextInput::make('name')->required()->maxLength(255),
            'type' => Select::make('type')
                ->required()
                ->options([
                    'csv' => 'CSV',
                    'excel' => 'Excel',
                    'pdf' => 'PDF',
                ])
                ->default('csv'),
            'status' => Select::make('status')
                ->required()
                ->options([
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'completed' => 'Completed',
                    'failed' => 'Failed',
                ])
                ->default('pending'),
            'error_message' => Textarea::make('error_message')
                ->maxLength(65535)
                ->columnSpanFull(),
            'created_at' => DateTimePicker::make('created_at')->disabled(),
            'updated_at' => DateTimePicker::make('updated_at')->disabled(),
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
