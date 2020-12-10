<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dokter_id');
            $table->string('name');
            $table->date('tanggal_lahir');
            $table->string('no_telp');
            $table->string('jeniskelamin');
            $table->string('alamat');
            $table->boolean('label');
            $table->string('file');
            $table->string('hasilproses');
            $table->boolean('status');
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
        Schema::dropIfExists('pasien');
    }
}
