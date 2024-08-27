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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->foreignId('penulis_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('penerbit_id')->constrained('penerbit_buku')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kategori_id')->constrained('kategori_buku')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('thn_terbit')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
