<?php

declare(strict_types=1);

namespace Modules\Job\Actions\Command;

use Illuminate\Console\Application;
use Illuminate\Support\Collection;
use Modules\Job\Datas\CommandData;
use Spatie\LaravelData\DataCollection;
use Symfony\Component\Console\Command\Command;

class GetCommandsAction
{
    /**
     * Execute the action.
     *
<<<<<<< HEAD
     * @return DataCollection<int, CommandData>
=======
     * @return DataCollection<CommandData>
>>>>>>> c88446c (.)
     */
    public function execute(): DataCollection
    {
        $artisan = app(Application::class);

        /** @var array<string, Command> $commands */
        $commands = $artisan->all();

        /** @var Collection<int, CommandData> $commandDataCollection */
        $commandDataCollection = collect($commands)->map(
            static function (Command $command): CommandData {
                $name = (string) $command->getName();
                $description = (string) $command->getDescription();
                $signature = $name;

                /** @var Collection<int, array{name: string, description: string, required: bool}> $arguments */
                $arguments = collect($command->getDefinition()->getArguments())
                    ->map(
                        static fn ($argument): array => [
                            'name' => (string) $argument->getName(),
                            'description' => (string) $argument->getDescription(),
                            'required' => (bool) $argument->isRequired(),
                        ],
                    )
                    ->values();

                /** @var Collection<int, array{name: string, description: string, required: bool}> $options */
                $options = collect($command->getDefinition()->getOptions())
                    ->map(
                        static fn ($option): array => [
                            'name' => (string) $option->getName(),
                            'description' => (string) $option->getDescription(),
                            'required' => (bool) $option->isValueRequired(),
                        ],
                    )
                    ->values();

<<<<<<< HEAD
                /** @var array<int, array<string, mixed>> $argumentsArray */
                $argumentsArray = $arguments->values()->all();

=======
>>>>>>> c88446c (.)
                return new CommandData(
                    name: $name,
                    description: $description,
                    signature: $signature,
                    full_name: $name.' - '.$description,
<<<<<<< HEAD
                    arguments: $argumentsArray,
=======
                    arguments: $arguments->toArray(),
>>>>>>> c88446c (.)
                    options: [
                        'withValue' => $options->toArray(),
                    ],
                );
            },
        );

        return new DataCollection(CommandData::class, $commandDataCollection->values()->all());
    }
}
