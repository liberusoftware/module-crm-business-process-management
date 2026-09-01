<?php

declare(strict_types=1);

namespace Liberu\CRM\BusinessProcessManagement\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Liberu\Foundation\Organizations\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $team_id
 * @property string $key
 * @property string $name
 * @property string $status
 * @property int $version
 * @property array<string,mixed> $definition
 */
final class Process extends Model
{
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    protected $table = 'crm_bpm_processes';

    protected $guarded = [];

    protected function casts(): array
    {
        return ['definition' => 'array', 'version' => 'integer'];
    }

    public function runs(): HasMany
    {
        return $this->hasMany(ProcessRun::class, 'process_id');
    }
}
