<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Garantie extends Model
{
    /** @use HasFactory<\Database\Factories\GarantieFactory> */
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = [
        'libgar',
        'desgar',
        'active'
    ];
    
}
