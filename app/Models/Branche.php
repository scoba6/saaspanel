<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branche extends Model
{
    /** @use HasFactory<\Database\Factories\BrancheFactory> */
    use HasFactory, Userstamps,SoftDeletes;

    protected $fillable = [
        'codbra',
        'libbra',
        'active',
        'desbra'
    ];

    /**
     * Get all of the categorie for the Branche
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Categorie::class);
    }
}
