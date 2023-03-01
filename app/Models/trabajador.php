<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajador extends Model
{
    use HasFactory;
    
    protected $table ='trabajador';

    protected $fillable = [
        'numDocumento',
        'nombres',
        'apaterno',
        'amaterno',
        'fregistro',
        'fnacimiento',
        'telefono',
        'direccion',
        'email',
        'tipodocumento_id',
        'genero_id',
        'users_id',
        'nivel_id',
        'nivsec',
    ];

    protected function nombres(): Attribute{
        return new Attribute(
            set: fn($value)=>strtolower($value),
            get: fn($value)=>ucwords($value)
        );
    }
    protected function apaterno(): Attribute{
        return new Attribute(
            get: fn($value)=>ucwords($value),
            set: fn($value)=>strtolower($value)
        );
    }
    protected function amaterno(): Attribute{
        return new Attribute(
            get: fn($value)=>ucwords($value),
            set: fn($value)=>strtolower($value)
        );
    }
    protected function email(): Attribute{
        return new Attribute(
            set: fn($value)=>strtolower($value)
        );
    }
    protected function direccion(): Attribute{
        return new Attribute(
            get: fn($value)=>ucwords($value),
            set: fn($value)=>strtolower($value)
        );
    }

    /*****Para llmar a la funcion pluck en el controlador y permita mostrar datos relacionados*****/

    public function tipodocumentot(){
        return $this->hasOne('App\Models\tipodocumentot','id', 'tipodocumento_id');
    }
    public function generot(){
        return $this->hasOne('App\Models\generot','id', 'genero_id');
    }

    public function users(){
        return $this->hasOne('App\Models\User','id', 'users_id');
    }
    public function nivel(){
        return $this->hasOne('App\Models\nivel','id', 'nivel_id');
    }
}