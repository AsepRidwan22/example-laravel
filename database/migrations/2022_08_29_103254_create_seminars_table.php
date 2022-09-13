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
        Schema::create('seminars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('mahasiswa_id');
            $table->string('laporan');
            $table->string('keteranganPerpus');
            $table->string('bebasTagihan');
            $table->string('accSeminar')->nullable();
            $table->foreignId('dosen_id')->nullable();
            $table->foreignId('pembimbing_id')->nullable();
            $table->timestamp('tanggal')->nullable();
            $table->string('waktu')->nullable();
            $table->string('ruangan')->nullable();
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
        Schema::dropIfExists('seminars');
    }
};
