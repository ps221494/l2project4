<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestelregelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bestelregel', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments("id")->unsigned(false);
            $table->unsignedInteger('bestelling_id')->value(11)->unsigned(false);
            $table->unsignedInteger('klantpizza_id')->value(11)->unsigned(false);
            $table->decimal('groote' ,1,1);
            $table->timestamps();
            $table->foreign('bestelling_id')->references('id')->on('bestellingens');
            $table->foreign('klantpizza_id')->references('id')->on('klantpizza');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bestelregel');
    }
}
