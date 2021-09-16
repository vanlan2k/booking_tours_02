<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursDetailsTablle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours_details_tablle', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id')->unsigned();
            $table->decimal('price', 20,2);
            $table->boolean('age');
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
        Schema::dropIfExists('tours_details_tablle');
    }
}
