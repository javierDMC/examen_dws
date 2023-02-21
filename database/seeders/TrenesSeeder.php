<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maquinistas = Maquinista::all();
        $maquinistas->each(function($maquinista) {
            Tren::factory()->count(3)->create([
                'maquinista_id' => $maquinista->id
            ]);
        });
    }
}
