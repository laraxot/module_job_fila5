<?php

declare(strict_types=1);

namespace Modules\Job\Datas;

<<<<<<< HEAD
use Spatie\LaravelData\Data;

class CommandData extends Data
{
    /**
     * @param  array<int, array<string, mixed>>  $arguments
     * @param  array<string, array<mixed>>  $options
     */
=======
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class CommandData extends Data
{
>>>>>>> c88446c (.)
    public function __construct(
        public string $name,
        public string $description,
        public string $signature,
        public string $full_name,
        public array $arguments,
        public array $options,
    ) {}
<<<<<<< HEAD
=======

    public static function collection(EloquentCollection|Collection|array $data): DataCollection
    {
        return self::collect($data, DataCollection::class);
    }
>>>>>>> c88446c (.)
}
