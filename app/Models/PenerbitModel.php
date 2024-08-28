<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerbitModel extends Model
{
    use HasFactory;

    protected $table = 'penerbit_buku';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'alamat', 'no_phone', 'email', 'website', 'deskripsi_penerbit'];
}
