<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portada extends Model
{
    use HasFactory;
    protected $table ='portada';

    protected $fillable = ['url'];
}
