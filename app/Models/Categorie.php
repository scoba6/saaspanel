<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory, Userstamps,SoftDeletes;

    protected $fillable = [
        'branche_id',
        'codcat',
        'libcat',
        'descat',
        'active',
    ];

    /**
     * Get the branche that owns the Categorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branche(): BelongsTo
    {
        return $this->belongsTo(Branche::class, 'branche_id', 'id');
    }
}
