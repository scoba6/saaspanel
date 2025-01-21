<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compagnie extends Model
{
    /** @use HasFactory<\Database\Factories\CompagnieFactory> */
    use HasFactory,SoftDeletes, Userstamps ;

    protected $fillable = [
        'codcie',
        'libcie',
        'adrcie',
        'logcie',
        'rcicie', //RC
        'ticcie', //Tier incendie
        'drecie', // DR
        'mandat',
    ];

}
