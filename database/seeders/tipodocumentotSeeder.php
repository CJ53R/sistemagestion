<?php

namespace Database\Seeders;

use App\Models\tipodocumentot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tipodocumentotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipodocumentot1 = new tipodocumentot();
        $tipodocumentot1->nombretipodocumento = "DNI";
        $tipodocumentot1->save();
        $tipodocumentot2 = new tipodocumentot();
        $tipodocumentot2->nombretipodocumento = "Carnet de Extranjería";
        $tipodocumentot2->save();
    }
}
