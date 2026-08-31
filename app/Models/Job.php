<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\JobFactory;
use Modules\Xot\Contracts\ProfileContract;
use Override;
use Webmozart\Assert\Assert;

use function Safe\json_decode;

/**
 * Modules\Job\Models\Job.
 *
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read string|null $display_name
 * @property-read string $status
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Job\Database\Factories\JobFactory factory($count = null, $state = [])
 * @method static Builder<static>|Job newModelQuery()
 * @method static Builder<static>|Job newQuery()
 * @method static Builder<static>|Job query()
 * @mixin \Eloquent
 */
class Job extends BaseModel
{
    protected $fillable = [
        'id',
        'queue',
        'payload',
        'attempts',
        'reserved_at',
        'available_at',
        'created_at',
    ];

    public function getTable(): string
    {
        Assert::string(
            $res = config('queue.connections.database.table'),
            '['.__LINE__.']['.class_basename($this).']',
        );

        return $res;
    }

    /**
     * @return Attribute<string, never>
     */
    public function status(): Attribute
    {
        return Attribute::make(get: function (): string {
            $reservedAt = $this->attributes['reserved_at'] ?? null;
            if ($reservedAt !== null && $reservedAt > 0) {
                return 'running';
            }

            return 'waiting';
        });
    }

    public function getDisplayNameAttribute(): ?string
    {
        Assert::string($json = $this->attributes['payload'], __FILE__.':'.__LINE__.' - '.class_basename(self::class));
        $payload = json_decode($json, true);
        if (! is_array($payload)) {
            return null;
        }

        Assert::nullOrString($res = $payload['displayName'] ?? null);

        return $res;
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'queue' => 'string',
            'payload' => 'array',
            'attempts' => 'integer',
            'reserved_at' => 'integer',
            'available_at' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'created_by' => 'string',
            'updated_by' => 'string',
        ];
    }
}
