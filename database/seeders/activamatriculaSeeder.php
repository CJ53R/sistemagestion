<?php

namespace Database\Seeders;

use App\Models\activamatricula;
use App\Models\div;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class activamatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado1 = new activamatricula();
        $estado1->name = "Activo";
        $estado1->save();
        $estado2 = new activamatricula();
        $estado2->name = "Inactivo";
        $estado2->save();

        $div = new div();
        $div->nombrediv = "matricula";
        $div->activamatricula_id = 1;
        $div->save();

        $div1 = new div();
        $div1->nombrediv = "Inicio de Clases 2023";
        $div1->activamatricula_id = 1;
        $div1->save();
    }
}
