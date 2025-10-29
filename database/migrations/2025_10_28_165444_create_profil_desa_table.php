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
        Schema::create('profil_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->text('sejarah_singkat')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('peta_embed_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_desa');
    }
};
