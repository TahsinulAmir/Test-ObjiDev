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
            $table->foreignId('penulis_id')->constrained('users');
            $table->foreignId('penerbit_id')->constrained('penerbit_buku');
            $table->foreignId('kategori_id')->constrained('kategori_buku');
            $table->integer('thn_terbit')->nullable();
            $table->integer('jumlah')->nullable();
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
