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
        Schema::create('stoks', function (Blueprint $table) {
            $table->increments('id_pengecekan');
            $table->unsignedInteger('kode_barang'); // dari Almira(pengadaan)
            $table->string('nama_barang');
            $table->integer('stok');
            $table->string('quality');
            $table->timestamps();


            //ini belum
            $table->foreign('kode_barang' -> referances ('kode_barang') -> on ('pengadaan'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};
