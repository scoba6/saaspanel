<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avenant extends Model
{
    /** @use HasFactory<\Database\Factories\AvenantFactory> */
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = [
        'ordavn',
        'libavn',
        'grpavn',
        'txtavn',
        'active'
    ];
}
