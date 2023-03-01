<?php

namespace Database\Seeders;

use App\Models\generot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class generotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generot1 = new generot();
        $generot1->nombregenero = "Femenino";
        $generot1->save();
        $generot2 = new generot();
        $generot2->nombregenero = "Masculino";
        $generot2->save();
    }
}
