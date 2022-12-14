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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('proposal');
            $table->boolean('isAccProposal')->nullable();
            $table->string('pesan')->nullable();
            $table->foreignId('mahasiswa_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('instansi_id')->nullable();
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
        Schema::dropIfExists('proposals');
    }
};
