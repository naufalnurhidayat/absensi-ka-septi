<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id_pegawai');
            $table->string('nip');
            $table->string('foto');
            $table->string('nama_pegawai');
            $table->string('jenis_kelamin');
            $table->string('usia');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('id_jabatan');
            $table->string('id_pendidikan');
            $table->string('tahun_masuk');
            $table->string('no_telepon');
            $table->string('alamat');
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
        Schema::dropIfExists('pegawai');
    }
}
