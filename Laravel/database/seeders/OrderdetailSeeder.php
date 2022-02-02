<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_detials')->insert([
           'order_id' =>'1',
           'pizza_id' => '1',
           'quantity' => '2',
           'status' => 'ontvangen',
        ]);
        DB::table('order_detials')->insert([
            'order_id' =>'2',
            'pizza_id' => '2',
            'quantity' => '1',
            'status' => 'ontvangen',
         ]);
         DB::table('order_detials')->insert([
            'order_id' =>'2',
            'pizza_id' => '1',
            'quantity' => '2',
            'status' => 'ontvangen',
         ]);
         DB::table('order_detials')->insert([
            'order_id' =>'3',
            'pizza_id' => '2',
            'quantity' => '1',
            'status' => 'ontvangen',
         ]);
    }
}
