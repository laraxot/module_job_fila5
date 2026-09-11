<?php

declare(strict_types=1);

namespace Modules\Job\Actions\Command;

use Illuminate\Console\Application;
use Illuminate\Support\Collection;
use Modules\Job\Datas\CommandData;
use Spatie\LaravelData\DataCollection;
use Symfony\Component\Console\Command\Command;
<<<<<<< HEAD
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
=======
>>>>>>> laraxot/dev

class GetCommandsAction
{
    /**
     * Execute the action.
     *
     * @return DataCollection<int, CommandData>
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
<<<<<<< HEAD
                        static fn (InputArgument $argument): array => [
=======
                        static fn ($argument): array => [
>>>>>>> laraxot/dev
                            'name' => (string) $argument->getName(),
                            'description' => (string) $argument->getDescription(),
                            'required' => (bool) $argument->isRequired(),
                        ],
                    )
                    ->values();

                /** @var Collection<int, array{name: string, description: string, required: bool}> $options */
                $options = collect($command->getDefinition()->getOptions())
                    ->map(
<<<<<<< HEAD
                        static fn (InputOption $option): array => [
=======
                        static fn ($option): array => [
>>>>>>> laraxot/dev
                            'name' => (string) $option->getName(),
                            'description' => (string) $option->getDescription(),
                            'required' => (bool) $option->isValueRequired(),
                        ],
                    )
                    ->values();

                /** @var array<int, array<string, mixed>> $argumentsArray */
                $argumentsArray = $arguments->values()->all();

                return new CommandData(
                    name: $name,
                    description: $description,
                    signature: $signature,
                    full_name: $name.' - '.$description,
                    arguments: $argumentsArray,
                    options: [
                        'withValue' => $options->toArray(),
                    ],
                );
            },
        );

        return new DataCollection(CommandData::class, $commandDataCollection->values()->all());
    }
}
