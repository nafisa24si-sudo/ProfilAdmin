<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
    $table->id();
    $table->string('judul');
    $table->string('slug')->unique(); // 🔥 WAJIB
    $table->foreignId('kategori_id')->constrained('kategori_berita')->cascadeOnDelete();
    $table->longText('isi_html');
    $table->string('penulis')->nullable();
    $table->enum('status', ['draft', 'published'])->default('draft');
    $table->timestamp('terbit_at')->nullable();
    $table->string('cover')->nullable();
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
