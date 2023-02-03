<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('city', 20);
            $table->string('district', 20);
            $table->string('address', 50);
            $table->string('description', 1000);
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('deposit')->default(0);
            $table->string('owner_name', 50);
            $table->string('owner_phone_number', 11);
            $table->string('owner_email', 100);
            $table->string('images', 1000);
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
        Schema::dropIfExists('rooms');
    }
}
