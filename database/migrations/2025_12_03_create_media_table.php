<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id');
            $table->string('ref_table'); // Nama tabel referensi (contoh: 'berita', 'agenda', 'galeri')
            $table->unsignedBigInteger('ref_id'); // ID dari tabel referensi
            $table->string('file_name'); // Nama file yang disimpan
            $table->text('caption')->nullable(); // Keterangan/judul file
            $table->string('mime_type')->nullable(); // Tipe MIME (image/jpeg, image/png, dll)
            $table->unsignedSmallInteger('sort_order')->default(0); // Urutan tampilan
            $table->timestamps();
            
            // Index untuk pencarian cepat
            $table->index(['ref_table', 'ref_id']);
            $table->index('file_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
