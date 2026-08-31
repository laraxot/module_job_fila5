<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\TaskFactory;
use Modules\Job\Models\Traits\FrontendSortable;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Models\Traits\HasXotFactory;
use Webmozart\Assert\Assert;

use function Safe\json_decode;

/**
 * Modules\Job\Models\Task.
 *
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read Collection<int, \Modules\Job\Models\Frequency> $frequencies
 * @property-read int|null $frequencies_count
 * @property-read bool $activated
 * @property-read float $average_runtime
 * @property-read \Modules\Job\Models\Result|null $last_result
 * @property-read string $upcoming
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, \Modules\Job\Models\Result> $results
 * @property-read int|null $results_count
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Job\Database\Factories\TaskFactory factory($count = null, $state = [])
 * @method static Builder<static>|Task newModelQuery()
 * @method static Builder<static>|Task newQuery()
 * @method static Builder<static>|Task query()
 * @method static Builder<static>|Task sortableBy(array $sortableColumns, array $defaultSort = [])
 * @mixin \Eloquent
 */
class Task extends BaseModel
{
    // use HasFrequencies;
    use FrontendSortable;

    /** @phpstan-use HasXotFactory<Factory<static>> */
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    /** @var list<string> */
    protected $appends = [
        'activated',
        'upcoming',
        'last_result',
        'average_runtime',
    ];

    /**
     * Compila i parametri del task per l'esecuzione.
     *
     * @param  bool  $forScheduler  Se true, i parametri vengono formattati per lo scheduler
     * @return array<int|string, mixed>
     */
    public function compileParameters(bool $forScheduler = false): array
    {
        if ($this->parameters === null) {
            return [];
        }

        $parameters = json_decode($this->parameters, true);
        Assert::isArray($parameters);

        if ($forScheduler) {
            /** @var array<int|string, string> $result */
            $result = [];
            foreach ($parameters as $key => $value) {
                $result[$key] = is_bool($value) ? ($value ? '1' : '0') : ((string) $value);
            }

            return $result;
        }

        return $parameters;
    }

    /**
     * Activated Accessor.
     */
    public function getActivatedAttribute(): bool
    {
        return (bool) $this->is_active;
    }

    /**
     * Upcoming Accessor.
     *
     * throws \Exception
     */
    public function getUpcomingAttribute(): string
    {
        // return CronExpression::factory($this->getCronExpression())->getNextRunDate()->format('Y-m-d H:i:s');
        return 'preso';
    }

    /**
     * Frequencies Relation.
     *
     * @return HasMany<Frequency, $this>
     */
    public function frequencies(): HasMany
    {
        return $this->hasMany(Frequency::class, 'task_id', 'id')->with('parameters');
    }

    /**
     * Results Relation.
     *
     * @return HasMany<Result, $this>
     */
    public function results(): HasMany
    {
        return $this->hasMany(Result::class, 'task_id', 'id');
    }

    /**
     * Returns the most recent result entry for this task.
     */
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
        /**
         * @var float $avg_duration
         */
        $avg_duration = $this->results()->avg('duration');

        return (float) $avg_duration;
    }

    /**
     * Route notifications for the mail channel.
     */
    public function routeNotificationForMail(): ?string
    {
        return $this->notification_email_address;
    }

    /**
     * Route notifications for the Nexmo channel.
     */
    public function routeNotificationForNexmo(): ?string
    {
        return $this->notification_phone_number;
    }

    /**
     * Route notifications for the Slack channel.
     */
    public function routeNotificationForSlack(): ?string
    {
        return $this->notification_slack_webhook;
    }

    /**
     * Attempt to perform clean on task results.
     */
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
