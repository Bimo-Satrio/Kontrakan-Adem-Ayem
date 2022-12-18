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
        Schema::create('foto_kontrakan', function (Blueprint $table) {
            $table->id('id_foto_kontrakan');
            // $table->string('kontrakan_unique_id')->unique();

            $table->foreignId('id_kontrakan')->nullable();
            $table->string('foto')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('foto_kontrakan');
    }
};
