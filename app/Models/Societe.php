<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Societe extends Model
{
    /** @use HasFactory<\Database\Factories\SocieteFactory> */
    use HasFactory,SoftDeletes, Userstamps ;

    protected $fillable = [
        'libste',
        'nifste',
        'agrste',
        'adrste',
        'telste',
        'webste',
        'logste',
        'active',
    ];
}
