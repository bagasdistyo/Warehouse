<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('stoks'); // Hapus tabel 'stoks' jika sudah ada sebelumnya

        Schema::create('stoks', function (Blueprint $table) {
            $table->increments('id_pengecekan');
            $table->unsignedInteger('kode_barang');
            $table->string('nama_barang');
            $table->integer('stok');
            $table->string('quality')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('kode_barang')->references('kode_barang')->on('pengadaans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
}
