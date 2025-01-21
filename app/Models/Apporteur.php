<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apporteur extends Model
{
    /** @use HasFactory<\Database\Factories\ApporteurFactory> */
    use HasFactory, Userstamps,SoftDeletes;

    protected $fillable = [
        'team_id',
        'libapp',
        'tauapp',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];


    public function owner(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
