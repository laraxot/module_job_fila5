<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Pages;

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
     * @return array<string, object>
     */
    protected function getFormSchema(): array
    {
        return parent::getFormSchema();
    }
}
