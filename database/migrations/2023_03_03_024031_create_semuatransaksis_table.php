<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('semuatransaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kodetransaksi');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedInteger('jumlah');
            $table->unsignedInteger('total');
            $table->timestamps();
            $table->foreign('id_barang')
                ->references('id')
                ->on('semuabarangs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semuatransaksis');
    }
};
