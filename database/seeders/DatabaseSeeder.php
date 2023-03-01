<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\activamatricula;
use App\Models\tipousuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(tipousuarioSeeder::class);
        $this->call(estadouserSeeder::class);
        $this->call(tipodocumentotSeeder::class);
        $this->call(generotSeeder::class);
        $this->call(roleSeeder::class);
        $this->call(trabajadorSeeder::class);
        $this->call(estadonoticiaSeeder::class);
        $this->call(nivelSeeder::class);
        $this->call(activamatriculaSeeder::class);
        $this->call(imagenpagSeeder::class);
        $this->call(covidSeeder::class);
    }
}
