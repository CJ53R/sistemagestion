<?php

namespace Database\Seeders;

use App\Models\estadouser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class estadouserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadouser1 = new estadouser();
        $estadouser1->nombreestadouser = "Activo";
        $estadouser1->save();
        $estadouser2 = new estadouser();
        $estadouser2->nombreestadouser = "Inactivo";
        $estadouser2->save();
    }
}
