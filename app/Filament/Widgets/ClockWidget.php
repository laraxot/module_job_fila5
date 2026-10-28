<?php

declare(strict_types=1);
/**
 * @see https://www.freshleafmedia.co.uk/blog/streaming-laravel-command-output-to-the-browser
 */

namespace Modules\Job\Filament\Widgets;

use Illuminate\Support\Facades\Process;
use Modules\Xot\Filament\Widgets\XotBaseWidget;

class ClockWidget extends XotBaseWidget
{
    public string $time = '---';

    public bool $run = false;

    /** @var view-string */
<<<<<<< HEAD
    protected string $view = 'job::filament.widgets.clock-widget';
=======
    protected string $view;

    public function __construct()
    {
        /** @var view-string $view */
        $view = 'job::filament.widgets.clock-widget';
        $this->view = $view;

        parent::__construct();
    }
>>>>>>> bb5d203c (.)

    protected int|string|array $columnSpan = 'full';

    public function begin(): void
    {
        $this->beginProcess();
    }

    public function beginProcess(): void
    {
        $this->time = '';
        $process = Process::path(base_path())->start('php artisan queue:listen --timeout=0');
        while ($process->running()) {
            // ...
            $this->stream(
                to: 'count',
                content: $this->time,
                replace: true,
            );
            // Pause for 1 second between numbers...
            sleep(3);
            // se no troppe richieste

            $this->time .= $process->latestOutput();
        }

        $process->wait();
    }

    /**
     * Esperimento di streaming (blog freshleafmedia) mai completato: lo streaming reale e' beginProcess().
     * Nessun chiamante: la vista usa begin().
     */
    public function beginStream(): void
    {
        throw new \LogicException('ClockWidget::beginStream() non implementato');
    }
}
