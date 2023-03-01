<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagennoticia extends Model
{
    use HasFactory;
    protected $table ='imagennoticia';

    protected $fillable = [
        'url',
    ];
}
