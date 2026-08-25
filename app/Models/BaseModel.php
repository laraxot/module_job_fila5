<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Models\XotBaseModel;

/**
 * Class BaseModel.
 *
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 */
abstract class BaseModel extends XotBaseModel
{
    /** @var string|null */
    protected $prefix;

    public function __construct(array $attributes = [])
    {
        if (isset($this->prefix)) {
            $this->table = $this->prefix.$this->table;
        }

        parent::__construct($attributes);
    }

<<<<<<< HEAD
   public $incrementing = true;
=======
    public $incrementing = true;
>>>>>>> laraxot/dev

    public $timestamps = true;

    protected $connection = 'job';

    /** @var list<string> */
    protected $fillable = ['id'];

    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
    protected $hidden = [];

    /** @return array<string, string> */
    protected function casts(): array
    {
<<<<<<< HEAD
       return array_merge(parent::casts(), [
=======
        return array_merge(parent::casts(), [
>>>>>>> laraxot/dev
            'published_at' => 'datetime',
        ]);
    }
}
