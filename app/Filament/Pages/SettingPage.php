<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\Job\Datas\JobConfigData;
use Modules\Xot\Filament\Pages\BaseSettingPage;

/**
 * Impostazioni di Job (`config/{tenant}/job.php`), solo super-admin.
 *
 * Form vuoto: il modulo non ha ancora impostazioni. La pagina esiste per uniformita' e per
 * essere pronta quando servira' un campo.
 *
 * @see JobConfigData
 */
class SettingPage extends BaseSettingPage
{
    /**
     * @return array<string, TextInput|Toggle>
     */
    protected function getFormSchema(): array
    {
        return [
            'enabled' => Toggle::make('enabled')->default(true),
            'max_attempts' => TextInput::make('max_attempts')->numeric()->integer()->minValue(1)->required(),
            'timeout_seconds' => TextInput::make('timeout_seconds')->numeric()->integer()->minValue(1)->required(),
        ];
    }
}
