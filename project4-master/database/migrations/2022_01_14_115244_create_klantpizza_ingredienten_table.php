<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlantpizzaIngredientenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klantpizza_ingredienten', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments("id")->unsigned(false);
            $table->unsignedInteger('klantpizza_id')->value(11)->unsigned(false);
            $table->unsignedInteger('ingredient_id')->value(11)->unsigned(false);
            $table->timestamps();

            $table->foreign('klantpizza_id')->references('id')->on('klantpizza');
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
        Schema::dropIfExists('klantpizza_ingredienten');
    }
}
