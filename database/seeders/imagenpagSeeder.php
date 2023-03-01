<?php

namespace Database\Seeders;

use App\Models\imagenpag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class imagenpagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagen1 = new imagenpag();
        $imagen1->nombrep = "Nosotros";
        $imagen1->save();

        $imagen2 = new imagenpag();
        $imagen2->nombrep = "Comité de Gestión de Condiciones Operativas";
        $imagen2->save();

        $imagen3 = new imagenpag();
        $imagen3->nombrep = "Comité de Gestión Pedagógica";
        $imagen3->save();

        $imagen4 = new imagenpag();
        $imagen4->nombrep = "Comité de Gestión del Bienestar";
        $imagen4->save();

        $imagen5 = new imagenpag();
        $imagen5->nombrep = "Preguntas Frecuentes";
        $imagen5->save();
    }
}
