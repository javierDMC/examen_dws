<?php

namespace Database\Seeders;

use App\Models\Pasajero;
use App\Models\Tren;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasajeroTrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trenes = Tren::all();

        Pasajero::all()->each(function ($pasajero) use ($trenes){
            $pasajero->trenes()->attach(
                $trenes->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
