<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagenpag extends Model
{
    use HasFactory;

    protected $table ='imagenpag';

    protected $fillable = [
        'nombrep',
        'url',
    ];
}
