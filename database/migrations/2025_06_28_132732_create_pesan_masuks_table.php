<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('pesan_masuks', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('perusahaan')->nullable();
        $table->string('email');
        $table->string('subjek');
        $table->text('pesan');
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
        Schema::dropIfExists('pesan_masuks');
    }
}
