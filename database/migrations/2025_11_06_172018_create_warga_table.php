<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id('id_warga');
            $table->string('nik', 16)->unique();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama', 20)->nullable();
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai'])->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->text('alamat')->nullable();
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->enum('status_warga', ['Tetap','Kontrak/Kos','Pendatang'])->default('Tetap');
            $table->enum('status_hidup', ['Hidup','Meninggal'])->default('Hidup');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('warga');
    }
};