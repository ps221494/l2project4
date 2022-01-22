<?php

namespace Database\Seeders;
use App\Models\ingredienten;
use Illuminate\Database\Seeder;

class ingredientenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ingredienten = [
            ['Name' => 'Tomatensaus', 'prijs' => 0.40],
            ['Name' => 'mozzarella', 'prijs' => 0.50],
            ['Name' => 'knoflookolie ', 'prijs' => 0.15],
            ['Name' => 'kaas', 'prijs' => 0.15],
            ['Name' => 'ananas ', 'prijs' => 0.25],
            ['Name' => 'ham', 'prijs' => 0.25],
        ];

        foreach ($ingredienten as $ingredient){
            ingredienten::create($ingredient);
        }
    }
}
