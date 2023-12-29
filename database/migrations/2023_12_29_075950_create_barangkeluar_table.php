<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangKeluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang');
            $table->integer('stok');
            $table->string('nama_customer');
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('jenisBarang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangkeluar');
    }
};
