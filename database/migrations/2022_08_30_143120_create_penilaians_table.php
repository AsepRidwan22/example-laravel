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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->float('nilai_pembimbing')->nullable();
            $table->float('nilai_penguji')->nullable();
            $table->float('nilai_instansi')->nullable();
            // $table->foreignId('pembimbing_id')->nullable();
            // $table->foreignId('penguji_id')->nullable();
            // $table->foreignId('instansi_id')->nullable();
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
        Schema::dropIfExists('penilaians');
    }
};
