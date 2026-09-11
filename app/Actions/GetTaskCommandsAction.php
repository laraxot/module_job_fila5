<?php

declare(strict_types=1);

namespace Modules\Job\Actions;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\Console\Command\Command;
use Webmozart\Assert\Assert;

class GetTaskCommandsAction
{
    use QueueableAction;

    /**
     * @return Collection<int, Command>
     */
    public function execute(): Collection
    {
<<<<<<< HEAD
        $all_commands = collect(Artisan::all())->whereInstanceOf(Command::class);
=======
        $all_commands = collect(Artisan::all());
>>>>>>> laraxot/dev

        /*
         * $command_filter = config('totem.artisan.command_filter');
         * $whitelist = config('totem.artisan.whitelist', true);
         *
         * if (! empty($command_filter)) {
         * // $all_commands = $all_commands->filter(function (Command $command) use ($command_filter, $whitelist) {
         * $all_commands = $all_commands->filter(function ($command) use ($command_filter, $whitelist) {
         * foreach ($command_filter as $filter) {
         * if (fnmatch($filter, $command->getName())) {
         * return $whitelist;
         * }
         * }
         *
         * return ! $whitelist;
         * });
         * }
         */
        /** @var Collection<int, Command> $sorted */
<<<<<<< HEAD
        $sorted = $all_commands->sortBy(static function (Command $command): string {
=======
        $sorted = $all_commands->sortBy(static function ($command) {
            /** @var Command $command */
>>>>>>> laraxot/dev
            $name = $command->getName();
            Assert::string($name, __FILE__.':'.__LINE__.' - '.class_basename(self::class));
            if (mb_strpos($name, ':') === false) {
                return ':'.$name;
            }

            return $name;
        });

        return $sorted->values();
    }
}
