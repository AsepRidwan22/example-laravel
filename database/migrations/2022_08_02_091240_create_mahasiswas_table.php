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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('dosen_id')->nullable();
            $table->foreignId('penguji_id')->nullable();
            $table->foreignId('instansi_id')->nullable();
            $table->string('nama');
            $table->string('photo')->nullable();
            $table->string('npm');
            $table->string('noHp');
            $table->string('kelas');
            $table->string('email');
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
        Schema::dropIfExists('mahasiswas');
    }
};
