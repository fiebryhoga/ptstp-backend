<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilPerusahaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('profil_perusahaans', function (Blueprint $table) {
        $table->id();
        $table->text('kata_pengantar');
        $table->date('tanggal_berdiri');
        $table->string('direktur_utama');
        $table->string('nomor_izin_usaha');
        $table->string('alamat_kantor');
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
        Schema::dropIfExists('profil_perusahaans');
    }
}
