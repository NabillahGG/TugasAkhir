<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;

    protected $table = "buku";

    protected $primaryKey = "kd_buku";
    protected $casts = ['kd_buku' => 'string'];

    protected $fillable = ['kd_buku','judul','kategori','deskripsi','jumlah'];



}
