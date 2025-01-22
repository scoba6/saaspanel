<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParametresIard extends Model
{
    /** @use HasFactory<\Database\Factories\ParametresIardFactory> */
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = [
        'clepar', // Clef du paramètre
        'libpar', // Libellé du paramètre
        'ordpar', // Ordre numérique du paramètre
        'valpar', // Valeur du paramètre
        'despar', // Description du paramètre
        'active'
    ];
}
