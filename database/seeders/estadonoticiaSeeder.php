<?php

namespace Database\Seeders;

use App\Models\estadonoticia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class estadonoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadonoticia1 = new estadonoticia();
        $estadonoticia1->nombreestado = "Activo";
        $estadonoticia1->save();
        $estadonoticia2 = new estadonoticia();
        $estadonoticia2->nombreestado = "Inactivo";
        $estadonoticia2->save();
    }
}
