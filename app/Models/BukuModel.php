<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $fillable = ['judul_buku', 'penulis_id', 'penerbit_id', 'kategori_id', 'thn_terbit','jumlah', 'deskripsi', 'cover'];
}
