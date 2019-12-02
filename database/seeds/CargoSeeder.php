<?php

use App\Cargo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create([
            'title' => 'Capataz',
        ]);

        Cargo::create([
            'title' => 'Gerente',
        ]);

        Cargo::create([
            'title' => 'Empleado',
        ]);
    }
}
