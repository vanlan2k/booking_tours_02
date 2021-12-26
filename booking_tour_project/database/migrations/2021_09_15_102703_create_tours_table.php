<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->integer('cate_id')->unsigned();
            $table->string('name');
            $table->string('avata');
            $table->text('description');
            $table->integer('number_date');
            $table->date('date_start');
            $table->decimal('rate')->default(0);
            $table->decimal('priceChild', 20, 2);
            $table->decimal('priceAdult', 20, 2);
            $table->text('tags')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('tours');
    }
}
