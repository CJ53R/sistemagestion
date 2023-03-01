<?php

namespace Database\Seeders;

use App\Models\trabajador;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class trabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->codigo = "151.2502.066";
        $user->password = "151.2502.066";
        $user->name = "cristian junior rodriguez zambrano";
        $user->tipousuario_id = 1;
        $user->estadouser_id = 1;
        $user->save();
        $user->assignRole('Administrador');

        $trabajador = new trabajador();
        $trabajador->numDocumento = "72940316";
        $trabajador->nombres = "cristian junior";
        $trabajador->apaterno = "rodriguez";
        $trabajador->amaterno = "zambrano";
        $trabajador->fregistro = "2023-01-03";
        $trabajador->fnacimiento = "1996-03-05";
        $trabajador->tipodocumento_id = 1;
        $trabajador->genero_id = 2;
        $trabajador->users_id =1;
        $trabajador->save();
    }
}
