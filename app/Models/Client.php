<?php

namespace App\Models;

use App\Enums\Titre;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory,SoftDeletes, Userstamps ;

    protected $fillable = [
        'team_id',
        'apporteur_id',
        'titre',
        'clacli',
        'rsncli',
        'maicli',
        'telcli',
        'active'
    ];
    protected $casts = [
        'titre' => Titre::class,
        'active' => 'boolean',
    ];

    public static function boot(): void
    {
        parent::boot();
        static::created(function (Model $model) {

            // Ce code s'exécute quand un CLIENT est créée pour le compte auxilliaire
            $model->auxcli = 'C'.str_pad($model->id, 7, '0', STR_PAD_LEFT);
            $model->save();
        });
    }

    /**
     * Get the apporteur that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function apporteur(): BelongsTo
    {
        return $this->belongsTo(Apporteur::class);
    }

    /**
     * Get the team that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
