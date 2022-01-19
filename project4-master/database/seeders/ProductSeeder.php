<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'name' => 'Watch',
            'price' => 12,
            'description' => 'Good watch',
            'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.baamboozle.com%2Fgame%2F182411&psig=AOvVaw0DzArQtlc7YgD_NyXmcc_6&ust=1642707369815000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCMCssJDIvvUCFQAAAAAdAAAAABAb'
        ]);
        Product::create([
            'name' => 'Bag',
            'price' => 15,
            'description' => 'Good Bag',
            'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.baamboozle.com%2Fgame%2F182411&psig=AOvVaw0DzArQtlc7YgD_NyXmcc_6&ust=1642707369815000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCMCssJDIvvUCFQAAAAAdAAAAABAb'
        ]);
        Product::create([
            'name' => 'perfume',
            'price' => 10,
            'description' => 'Good perfume',
            'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.baamboozle.com%2Fgame%2F182411&psig=AOvVaw0DzArQtlc7YgD_NyXmcc_6&ust=1642707369815000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCMCssJDIvvUCFQAAAAAdAAAAABAb'
        ]);
    }
}
