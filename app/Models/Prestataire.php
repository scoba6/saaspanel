<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestataire extends Model
{
    /** @use HasFactory<\Database\Factories\PrestataireFactory> */
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = [
        'rsnpre',
        'telpre',
        'mailpre',
        'adrpre',
        'vilpre',
        'paypre',
        'active'
    ];
}
