<?php

namespace Database\Seeders;

use App\Models\covid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class covidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $covid = new covid();
        $covid->nombre = "Covid-19";
        $covid->save();
    }
}
