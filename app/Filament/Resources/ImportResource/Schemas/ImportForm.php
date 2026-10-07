<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ImportResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
=======
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class ImportForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<int|string, Component>
=======
     * @return array<string, Component>
>>>>>>> laraxot/dev
     */
    public function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            Section::make([
                'name' => TextInput::make('name'),
            ]),
=======
            'name' => TextInput::make('name')->required()->maxLength(255),
            'file' => FileUpload::make('file')
                ->required()
                ->acceptedFileTypes([
                    'text/csv',
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                ])
                ->maxSize(10240),
            'status' => Select::make('status')
                ->required()
                ->options([
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'completed' => 'Completed',
                    'failed' => 'Failed',
                ])
                ->default('pending'),
            'error_message' => Textarea::make('error_message')->maxLength(65535),
            'total_rows' => TextInput::make('total_rows')->numeric(),
            'processed_rows' => TextInput::make('processed_rows')->numeric(),
>>>>>>> laraxot/dev
        ];
    }
}
