<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
         'user_id' => '1',
        ]);
        DB::table('orders')->insert([
            'user_id' => '2',
           ]);
           DB::table('orders')->insert([
            'user_id' => '6',
           ]);
    }
}
