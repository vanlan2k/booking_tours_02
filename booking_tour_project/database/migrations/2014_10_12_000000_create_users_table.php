<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->integer('role_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone', 10)->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('avata')->nullable();
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
        Schema::dropIfExists('users');
    }
}
