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
        //membuat tabel dengan nama tbl_laravel di database db_laravel
        Schema::create('tbl_mahasiswa', function (Blueprint $table) {
            $table->integer('nim'); //membuat kolom nim pada tabel
            $table->unique('nim'); //membuat nim agar tisak bisa sama
            $table->string('nama'); //membuat kolom nama pada tabel
            $table->string('jurusan'); //membuat kolom jurusan pada tabel
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
};
