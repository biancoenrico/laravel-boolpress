<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title',100);
            $table->string('address',150);
            $table->string('postal_code',15);
            $table->string('city',100);
            $table->string('country',100);
            $table->smallInteger('meter_square');
            $table->mediumInteger('rooms');
            $table->text('description')->nullable();
            $table->float('price',12,2);
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
        Schema::dropIfExists('houses');
    }
}
