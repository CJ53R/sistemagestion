<?php

namespace Database\Seeders;

use App\Models\nivel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class nivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel1 = new nivel();
        $nivel1->nombrenivel = "Primaria";
        $nivel1->save();

        $nivel2 = new nivel();
        $nivel2->nombrenivel = "Secundaria";
        $nivel2->save();
    }
}
