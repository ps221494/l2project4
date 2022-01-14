<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredienten', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments("id")->unsigned(false);
            $table->string("Name")->lenght(100)->nullable(false);
            $table->decimal('prijs',9,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredienten');
    }
}
