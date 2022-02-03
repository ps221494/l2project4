<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pizza;

class PizzaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = new Pizza();
        $amout = $response->price();
        $this->assertEquals(12.84,$amout,0.001,'Pizza amount is incorrect!!');
    }
}
