<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ExportResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class ExportForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<string, Component>
     */
    public function getFormSchema(): array
    {
        return [
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
=======
     * @return array<int|string, Component>
     */
    public static function getFormSchema(): array
    {
        return [
            Section::make([
                'name' => TextInput::make('name'),
            ]),
>>>>>>> laraxot/dev
        ];
    }
}
