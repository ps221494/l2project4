<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzasIngredientenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas_ingredienten', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments("id")->unsigned(false);
            $table->unsignedInteger('pizza_id')->value(11)->unsigned(false);
            $table->unsignedInteger('ingredient_id')->value(11)->unsigned(false);

            $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('ingredient_id')->references('id')->on('ingredienten');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzas_ingredienten');
    }
}
