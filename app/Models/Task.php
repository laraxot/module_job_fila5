<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\TaskFactory;
use Modules\Job\Models\Traits\FrontendSortable;
use Modules\Xot\Models\Traits\HasXotFactory;
use Webmozart\Assert\Assert;

use function Safe\json_decode;
use function Safe\json_encode;

/**
 * @property string $id
 * @property string $description
 * @property string $command
 * @property string|array<string, mixed>|null $parameters
 * @property string $expression
 * @property string $timezone
 * @property bool $is_active
 * @property bool $dont_overlap
 * @property bool $run_in_maintenance
 * @property string|null $notification_email_address
 * @property string|null $notification_phone_number
 * @property string|null $notification_slack_webhook
 * @property string $auto_cleanup_type
 * @property int $auto_cleanup_num
 * @property bool $run_on_one_server
 * @property bool $run_in_background
 * @property-read Collection<int, Frequency> $frequencies
 * @property-read Collection<int, Result> $results
 */
class Task extends BaseModel
{
    // use HasFrequencies;
    use FrontendSortable;

    /** @phpstan-use HasXotFactory<TaskFactory, Task> */
    use HasXotFactory;

    use Notifiable;

    protected $fillable = [
        'id',
        'description',
        'command',
        'parameters',
        'expression',
        'timezone',
        'is_active',
        'dont_overlap',
        'run_in_maintenance',
        'notification_email_address',
        'notification_phone_number',
        'notification_slack_webhook',
        'auto_cleanup_type',
        'auto_cleanup_num',
        'run_on_one_server',
        'run_in_background',
    ];

    /** @var list<string> */
    protected $appends = [
        'activated',
        'upcoming',
        'last_result',
        'average_runtime',
    ];

    /**
     * @return array<string, mixed>
     */
    public function compileParameters(bool $forScheduler = false): array
    {
        if ($this->parameters === null) {
            return [];
        }

        $parametersStr = is_string($this->parameters) ? $this->parameters : json_encode($this->parameters);
        Assert::string($parametersStr);
        $decoded = json_decode($parametersStr, true);
        Assert::isArray($decoded);

        /** @var array<string, mixed> $result */
        $result = [];
        foreach ($decoded as $key => $value) {
            if ($forScheduler) {
                if (is_bool($value)) {
                    $result[(string) $key] = $value ? '1' : '0';

                    continue;
                }

                $result[(string) $key] = is_scalar($value) ? (string) $value : '';
            } else {
                $result[(string) $key] = $value;
            }
        }

        return $result;
    }

    public function getActivatedAttribute(): bool
    {
        return (bool) $this->is_active;
    }

    public function getUpcomingAttribute(): string
    {
        // return CronExpression::factory($this->getCronExpression())->getNextRunDate()->format('Y-m-d H:i:s');
        return 'preso';
    }

    /**
     * @return HasMany<Frequency, $this>
     */
    public function frequencies(): HasMany
    {
        /** @var HasMany<Frequency, $this> $relation */
        $relation = $this->hasMany(Frequency::class, 'task_id', 'id')->with('parameters');

        return $relation;
    }

    /**
     * @return HasMany<Result, $this>
     */
    public function results(): HasMany
    {
        /** @var HasMany<Result, $this> $relation */
        $relation = $this->hasMany(Result::class, 'task_id', 'id');

        return $relation;
    }

    public function getLastResultAttribute(): ?Result
    {
        $res = $this->results()->orderBy('id', 'desc')->first();
        if ($res === null) {
            return null;
        }
        Assert::isInstanceOf($res, Result::class);

        return $res;
    }

    public function getAverageRuntimeAttribute(): float
    {
        $avg_duration = $this->results()->avg('duration');

        return (float) $avg_duration;
    }

    public function routeNotificationForMail(): ?string
    {
        $email = $this->notification_email_address;

        return $email ? (string) $email : null;
    }

    public function routeNotificationForNexmo(): ?string
    {
        $phone = $this->notification_phone_number;

        return $phone ? (string) $phone : null;
    }

    public function routeNotificationForSlack(): ?string
    {
        $webhook = $this->notification_slack_webhook;

        return $webhook ? (string) $webhook : null;
    }

    public function autoCleanup(): void
    {
        if ($this->auto_cleanup_num > 0) {
            if ($this->auto_cleanup_type === 'results') {
                $oldest_id = $this->results()
                    ->orderBy('ran_at', 'desc')
                    ->limit($this->auto_cleanup_num)
                    ->get()
                    ->min('id');
                do {
                    $rowsToDelete = $this->results()
                        ->where('id', '<', $oldest_id)
                        ->limit(50)
                        ->getQuery()
                        ->select('id')
                        ->pluck('id');

                    Result::query()->whereIn('id', $rowsToDelete)->delete();
                } while ($rowsToDelete->count() > 0);
            } else {
                do {
                    $rowsToDelete = $this->results()
                        ->where('ran_at', '<', Carbon::now()->subDays($this->auto_cleanup_num - 1))
                        ->limit(50)
                        ->getQuery()
                        ->select('id')
                        ->pluck('id');

                    Result::query()->whereIn('id', $rowsToDelete)->delete();
                } while ($rowsToDelete->count() > 0);
            }
        }
    }
}
