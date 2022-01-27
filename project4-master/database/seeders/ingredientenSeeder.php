<?php

namespace Database\Seeders;
use App\Models\Ingredient;
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
            ['Name' => 'Tomatensaus', 'price' => 0.40],
            ['Name' => 'mozzarella', 'price' => 0.50],
            ['Name' => 'knoflookolie ', 'price' => 0.15],
            ['Name' => 'kaas', 'price' => 0.15],
            ['Name' => 'ananas ', 'price' => 0.25],
            ['Name' => 'ham', 'price' => 0.25],
        ];

        foreach ($ingredienten as $ingredient){
            Ingredient::create($ingredient);
        }
    }
}
