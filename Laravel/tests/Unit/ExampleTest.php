<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Pizza;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        
        
    }

    public function setUp(): Void{
        $pizza = Pizza::find(1);
        $this->assertEquals(12.84,$pizza->amount,0.001,'Pizza amount not correctly!!');
    }

}
