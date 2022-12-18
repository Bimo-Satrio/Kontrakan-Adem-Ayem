<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrakan', function (Blueprint $table) {
            $table->id('id_kontrakan');
            // $table->string('unique_id')->unique();
            $table->string('kontrakan');
            $table->string('deskripsi');

            $table->string('lokasi');
            $table->string('harga');
            $table->string('stok');
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
        Schema::dropIfExists('kontrakan');
    }
};
