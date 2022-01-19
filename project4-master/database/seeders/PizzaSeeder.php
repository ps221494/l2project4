<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'Name' => 'Hawaii',
            'Beschrijving' => 'lekker pizza met ananas, je moet er van houden',
        ]);
        
        DB::table('pizzas')->insert([
            'Name' => 'Margherita',
            'Beschrijving' => 'Pizza Margherita ingrediënten tomaten, mozzarella.',
        ]);
    }
}
