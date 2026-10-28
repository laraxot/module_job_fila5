<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ExportResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\DateTimePicker;
=======
>>>>>>> bb5d203c (.)
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class ExportForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * Campi = colonne reali della tabella `exports` (vedi Modules\Job\Models\Export).
     *
     * @return array<string, Component>
=======
     * @return array<int|string, Component>
>>>>>>> bb5d203c (.)
     */
    public function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            'file_name' => TextInput::make('file_name')->maxLength(255),
            'exporter' => TextInput::make('exporter')->required()->maxLength(255),
            'file_disk' => TextInput::make('file_disk')->required()->maxLength(255),
            'processed_rows' => TextInput::make('processed_rows')->numeric()->default(0),
            'total_rows' => TextInput::make('total_rows')->numeric()->required(),
            'successful_rows' => TextInput::make('successful_rows')->numeric()->default(0),
            'completed_at' => DateTimePicker::make('completed_at'),
            'created_at' => DateTimePicker::make('created_at')->disabled(),
            'updated_at' => DateTimePicker::make('updated_at')->disabled(),
=======
            Section::make([
                'name' => TextInput::make('name'),
            ]),
>>>>>>> bb5d203c (.)
        ];
    }
}
