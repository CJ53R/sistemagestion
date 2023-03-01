<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    use HasFactory;
    protected $table ='noticia';

    protected $fillable = [
        'titulo',
        'fpublicacion',
        'shortdescripcion',
        'largedescripcion',
    ];
}
