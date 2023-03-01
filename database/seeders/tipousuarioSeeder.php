<?php

namespace Database\Seeders;

use App\Models\tipousuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tipousuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipousuario1 = new tipousuario();
        $tipousuario1->nombretipousuario = "Administrador";
        $tipousuario1->save();
        $tipousuario2 = new tipousuario();
        $tipousuario2->nombretipousuario = "Alumno";
        $tipousuario2->save();
        $tipousuario3 = new tipousuario();
        $tipousuario3->nombretipousuario = "Director";
        $tipousuario3->save();
        $tipousuario4 = new tipousuario();
        $tipousuario4->nombretipousuario = "Docente";
        $tipousuario4->save();
        $tipousuario5 = new tipousuario();
        $tipousuario5->nombretipousuario = "Auxiliar de Educación";
        $tipousuario5->save();
        $tipousuario6 = new tipousuario();
        $tipousuario6->nombretipousuario = "Oficinista";
        $tipousuario6->save();
        $tipousuario7 = new tipousuario();
        $tipousuario7->nombretipousuario = "Auxiliar de Biblioteca";
        $tipousuario7->save();
        $tipousuario8 = new tipousuario();
        $tipousuario8->nombretipousuario = "Auxiliar de Laboratorio";
        $tipousuario8->save();
        $tipousuario9 = new tipousuario();
        $tipousuario9->nombretipousuario = "Personal de Servicio";
        $tipousuario9->save();
        $tipousuario10 = new tipousuario();
        $tipousuario10->nombretipousuario = "Sub Director";
        $tipousuario10->save();
        $tipousuario11 = new tipousuario();
        $tipousuario11->nombretipousuario = "Coordinador Pedagógico";
        $tipousuario11->save();
        $tipousuario12 = new tipousuario();
        $tipousuario12->nombretipousuario = "Coordinador de TOE";
        $tipousuario12->save();
        $tipousuario13 = new tipousuario();
        $tipousuario13->nombretipousuario = "Jefe de Laboratorio de Biología";
        $tipousuario13->save();
        $tipousuario14 = new tipousuario();
        $tipousuario14->nombretipousuario = "Jefe de Laboratorio de Química";
        $tipousuario14->save();
        $tipousuario15 = new tipousuario();
        $tipousuario15->nombretipousuario = "Jefe de Laboratorio de Física";
        $tipousuario15->save();
        $tipousuario16 = new tipousuario();
        $tipousuario16->nombretipousuario = "Jefe de Taller";
        $tipousuario16->save();
    }
}
