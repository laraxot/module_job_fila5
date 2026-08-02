<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\TaskFactory;
use Modules\Job\Models\Traits\FrontendSortable;
use Modules\Xot\Models\Traits\HasXotFactory;
use Webmozart\Assert\Assert;

use function Safe\json_decode;

class Task extends BaseModel
{
    // use HasFrequencies;
    use FrontendSortable;/**
 * @phpstan-use HasXotFactory<\Modules\Job\Database\Factories\TaskFactory, Task>
 */
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
                $result[$key] = is_bool($value) ? ($value ? '1' : '0') : ((string) Assert::scalar($value));
            }

            return $result;
        }

        return $parameters;
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

    public function frequencies(): HasMany
    {
        return $this->hasMany(Frequency::class, 'task_id', 'id')->with('parameters');
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class, 'task_id', 'id');
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
        return $this->notification_email_address;
    }

    public function routeNotificationForNexmo(): ?string
    {
        return $this->notification_phone_number;
    }

    public function routeNotificationForSlack(): ?string
    {
        return $this->notification_slack_webhook;
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
