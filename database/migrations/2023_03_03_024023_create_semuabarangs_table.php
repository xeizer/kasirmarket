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
        Schema::create('semuabarangs', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('namabarang');
            $table->integer('harga')->unsigned();
            $table->integer('stok')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semuabarangs');
    }
};
