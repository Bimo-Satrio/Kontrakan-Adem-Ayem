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
        Schema::create('penghuni', function (Blueprint $table) {
            $table->id('id_penghuni');
            $table->foreignId('id_kontrakan');
            $table->foreignId('id_lama_huni');
            $table->string('nama_penghuni', 20);
            $table->string('nomor_telefon', 15);
            $table->integer('harga_total');
            $table->boolean('status_pembayaran');
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
        Schema::dropIfExists('penghuni');
    }
};
